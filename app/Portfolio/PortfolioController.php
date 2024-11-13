<?php

use Models\Entities\Article;
use Models\Entities\Projet;

use BouletAP\Tools\Stringz;

class PortfolioController {


    private function _get_project_categories($projets) {     
        $types = [];   
        
        foreach( $projets as $projet ) {
            $cats = explode(', ', $projet->type_projet);
            $types = array_unique (array_merge($types, $cats) );
        }
        
        //$categories = ['' => 'Tous les projets'];
        foreach( $types as $type ) {
            $key = Stringz::createSlug($type);
            $categories[$key] = $type;
        }

        // sort array + tweak to insert empty key as first position
        asort($categories);
        $categories = array_reverse($categories, true);
        $categories[''] = 'Tous les projets';
        $categories = array_reverse($categories, true);


        //$categories['autres'] = 'Autres';            
        return $categories;
    }


    public function projets($slug = false) {

        $projets = Projet::get_all();
 
        $data['categories'] = $this->_get_project_categories($projets);

        if( isset($data['categories'][$slug]) ) {
            $selected_category = $data['categories'][$slug];
            $projets = Projet::filter_by_type($projets, $selected_category);
        }
        
        // garder juste les projets déclarés FR
        foreach( $projets as $key => $p ) {
            if( $p->langue != "fr" ) {
                unset($projets[$key]);
            }                     
        }

        if( ! Models\Core\Auth::user_can('admin_duty') ) {
            foreach( $projets as $key => $p ) {
                if( (int)$p->private === 1 ) {
                    unset($projets[$key]);
                }                     
            }
        }
        
        if( IS_DEV ) {
            $featured = [];
            foreach( $projets as $key => $p ) {
                if( !empty($p->featured) ) {

                    if( isset($featured[$p->featured])) {
                        // @todo: alert for duplicated featured
                    }              
                    $featured[$p->featured] = $p;
                    unset($projets[$key]);
                }
            }
            ksort($featured);
            $projets = array_merge($featured, $projets);
            //echo '<pre>'; print_r($projets); echo '</pre>'; die();
        }


        $data['projets'] = $projets;

        echo Models\Core\View::display("Portfolio/projets.php", $data);
    }

    public function details_projet($slug) {

        $projet = Projet::get_by('slug', $slug);
        if( empty($projet) ) {
            header("Location: /portfolio/");
            die();
        }

        $Parsedown = new Parsedown();
        $projet->defi = $Parsedown->text($projet->defi);
        //$projet->overview = $Parsedown->text($projet->overview);
        //$projet->sales_pitch = $Parsedown->text($projet->sales_pitch);

        
        
        $data['projet'] = $projet;
        
        echo Models\Core\View::display("Portfolio/projet.php", $data);
    }

}