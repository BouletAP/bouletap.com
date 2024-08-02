<?php

class ServicesController {
    
    public function creation_sites_internet() {
        echo Models\Core\View::display("Services/creation-site-web.php");
    }


    public function performances() {
        echo Models\Core\View::display("Services/performances.php");
    }

    public function accessibilite() {
        echo Models\Core\View::display("Services/accessibilite.php");
    }

    public function seo() {
        echo Models\Core\View::display("Services/seo.php");
    }

    public function securite() {
        echo Models\Core\View::display("Services/securite.php");
    }
}