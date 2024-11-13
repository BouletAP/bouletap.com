<?php

require_once APP_PATH . '/Blog/models/forms/ManageNews.php';
require_once APP_PATH . '/Blog/models/entities/article.php';




use BouletAP\Tools\Stringz;
use Models\Core\Auth;
use Models\Entities\Article;



class BlogAdminController {
    
    public function __construct() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 
    }

    private function _get_valid_article($id) {
        $id = (int)$id;
        $article = Article::get_by('id', $id);
        if( $id <= 0 || empty($article) ) {
            header("Location: /admin/articles/add");
            die();
        }
        //$article = $articles[0];
        return $article;
    }


    public function testWebHook() {
        
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');
        if( DiscordWebHook::sendTest() ) {
            echo "<h1>Message sent</h1>"; 
        }
    }

    public function list() {

        $data = [
            'page' => 'articles',
            'items' => Article::get_all()
        ];
        echo Models\Core\View::display("Blog/views/listing.php", $data);
    }

    public function add() {
        
        $form = new Models\Forms\ManageNews();

        if( !empty($_POST) && $form->validate() ) {

            $form_values = $form->getValues();
            $form_values['slug'] = Stringz::createSlug($form_values['title']);
            $form_values['type'] = 'Articles';
            $form_values['private'] = (int)$form_values['private'];            
            
            if( empty($form_values['published'])) {
                $form_values['published'] = time();
            }
            else {
                $date = new DateTime($form_values['published']); 
                $form_values['published'] = $date->getTimestamp();
            }
 

            $article = new Article();
            $article->fill($form_values);

            if( $article->save() ) {
                header('Location: /admin/articles');
                die();
            }
        }

        $error = $form->getErrors('flat');
        $data = [
            'publication_form' => $form
        ];

        echo Models\Core\View::display("Blog/views/manage.php", $data);
    }

    public function edit($id = false) {

        $article = $this->_get_valid_article($id);
        //echo 'edit<pre>'; print_r($article); echo '</pre>'; die(); 

        $article->published = date('Y-m-d', $article->published);
    
        $form = new Models\Forms\ManageNews();
        $form->fill( (array)$article );


        
        if( !empty($_POST) && $form->validate() ) {

            $form_values = $form->getValues();
            $form_values['slug'] = Stringz::createSlug($form_values['title']);

            $date = new DateTime($form_values['published']); 
            $form_values['published'] = $date->getTimestamp();

            $article->fill($form_values);   

            if( $article->save() ) {
                header('Location: /admin/articles');
                die();
            }
        }

        $data = [
            'publication_form' => $form
        ];

        echo Models\Core\View::display("Blog/views/manage.php", $data);
    }


    public function delete($id = false) {

        $article = $this->_get_valid_article($id);
        $article->delete();
        
        header("Location: /admin/articles");
        die();
    }    
    
}