<?php

class PagesController {
    
    public function accueil() {
        echo Models\Core\View::display("Pages/views/accueil.php");
    }

    public function not_found() {
        echo Models\Core\View::display("Pages/views/404.php");
    }

    public function a_propos() {
        echo Models\Core\View::display("Pages/views/a-propos.php");
    }

    public function contact() {
        echo Models\Core\View::display("Pages/views/contact.php");
    }
    
    public function privacy_policy() {
        echo Models\Core\View::display("Pages/views/privacy-policy.php");
    }

    public function coming_soon() {
        echo Models\Core\View::display("Pages/views/en-construction.php");
    }


    public function nouveau_site() {
        echo Models\Core\View::display("Pages/views/creation-de-sites-web.php");
    }
}