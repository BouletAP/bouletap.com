<?php

class SandboxController {


    public function coming_soon() {

        echo Models\Core\View::display("Pages/views/en-construction.php");
    }
   

    public function index() {

        $data['categories'] = [
            'publications' => 'Tous les projets', 
        ];
        echo Models\Core\View::display("Sandbox/views/index.php", $data);
    }
}