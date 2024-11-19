<?php

use Models\Core\Auth;

use Models\Entities\Article;
use BouletAP\Tools\Stringz;

require_once APP_PATH . '/models/services/Parsedown.php';

class BlogController {

    public function nouvelle($slug) {

        //$slug = "le-plan-du-site-guide-simplifie";
        $nouvelle = Article::get_by('slug', $slug);
        if( empty($nouvelle) ) {
            header("Location: /nouvelles");
            die();
        }
        
        //$nouvelle = $nouvelles[0];

        if( !Auth::user_can('admin_duty') && !empty($nouvelle->private) ) {
            header("Location: /nouvelles");
            die();
        }
        
        $Parsedown = new Parsedown();
        $nouvelle->content = $Parsedown->text($nouvelle->content); # prints: <p>Hello <em>Parsedown</em>!</p>

        $months = BouletAP\Tools\Dates::months();
        $date_publiee = $months[ date('m', $nouvelle->published) - 1] . " " . date('Y', $nouvelle->published);
        $nouvelle->published = $date_publiee;

        //echo '<pre>'; print_r($nouvelle); echo '</pre>'; die();
        $data['nouvelle'] = $nouvelle;

        $data['categories'] = Article::get_categories();
        $data['keywords'] = Article::get_keywords();
        $data['selected_category'] = $nouvelle->type;

        echo Models\Core\View::display("Blog/views/details.php", $data);
    }

    
    
    public function nouvelles($args = false) {
        
        $page = 1;
        $post_per_page = 6;

        if( is_array($args) ) {
            $slug = $args[0];
            $page = (int)$args[1][0];
        }
        else {
            $slug = $args;
        }


        $nouvelles = Article::get_all();

        // remove private posts
        if( !Auth::user_can('admin_duty') ) {
            foreach($nouvelles as $key => $nouvelle) {
                if( !empty($nouvelle->private) ) {
                    unset($nouvelles[$key]);
                }
            }            
        }
        
        // get active categories
        $data['categories'] = Article::get_categories();
        $data['keywords'] = Article::get_keywords();
        

        $selected_category = $slug ? $slug : 'publications';
        if( isset($data['categories'][$slug]) ) {
            $selected_category = $data['categories'][$slug];
            $nouvelles = Article::filter_by_category($nouvelles, $selected_category);
        }

        // paginate
        $data['show_pagination'] = false;
        $data['post_per_page'] = $post_per_page;
        $data['page'] = $page;
        if( count($nouvelles) > $post_per_page ) {
            $data['total_posts'] = count($nouvelles);
            $data['total_pages'] = ceil(count($nouvelles) / $post_per_page);
            $data['show_pagination'] = true;
            $nouvelles = array_slice($nouvelles, ($page - 1) * $post_per_page, $post_per_page);
        }
        


        // Fix nouvelle data
        foreach($nouvelles as $key => $nouvelle) {            
            $months = BouletAP\Tools\Dates::months();
            $date_publiee = ucfirst($months[ date('m', $nouvelle->published) - 1]) . " " . date('Y', $nouvelle->published);
            $nouvelle->published = $date_publiee;
        }

        //echo '<pre>'; print_r($selected_category); echo '</pre>'; die();
        $data['nouvelles'] = $nouvelles;
        $data['selected_category'] = $selected_category;

        echo Models\Core\View::display("Blog/views/nouvelles.php", $data);
        die();

    }

    public function details_nouvelle() {

        echo Models\Core\View::display("Blog/details.php");
    }


}