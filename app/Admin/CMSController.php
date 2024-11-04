<?php

require_once APP_PATH . '/models/forms/publication.php';
require_once APP_PATH . '/models/entities/article.php';


use BouletAP\Tools\Stringz;
use Models\Core\Auth;
use Models\Entities\Article;



class CMSController {
    
    public function __construct() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 
    }

    private function _get_valid_article($id) {
        $id = (int)$id;
        $articles = Article::get_by('id', $id);
        if( $id <= 0 || empty($articles) ) {
            header("Location: /admin/articles/add");
            die();
        }
        $article = $articles[0];
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
        echo Models\Core\View::display("Admin/views/listing.php", $data);
    }

    public function add() {
        
        $form = new Models\Forms\PublicationForm();

        if( !empty($_POST) && $form->validate() ) {

            $form_values = $form->getValues();
            $form_values['slug'] = Stringz::createSlug($form_values['title']);
            $form_values['type'] = 'Articles';
            $form_values['published'] = time();
            $form_values['private'] = 0;            
 

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

        echo Models\Core\View::display("Admin/views/article-add.php", $data);
    }

    public function edit($id = false) {

        $article = $this->_get_valid_article($id);
        //echo 'edit<pre>'; print_r($article); echo '</pre>'; die(); 
    
        $form = new Models\Forms\PublicationForm();
        $form->fill( (array)$article );


        
        if( !empty($_POST) && $form->validate() ) {

            $form_values = $form->getValues();
            $form_values['slug'] = Stringz::createSlug($form_values['title']);

            $article->fill($form_values);   

            if( $article->save() ) {
                header('Location: /admin/articles');
                die();
            }
        }

        $data = [
            'publication_form' => $form
        ];

        echo Models\Core\View::display("Admin/views/article-add.php", $data);
    }


    public function delete($id = false) {

        $article = $this->_get_valid_article($id);
        $article->delete();
        
        header("Location: /admin/articles");
        die();
    }    
    
}