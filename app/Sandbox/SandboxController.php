<?php

class SandboxController {


    public function coming_soon() {

        echo Models\Core\View::display("Pages/views/en-construction.php");
    }
   

    public function index() {

        if( !IS_DEV ) {
            $this->coming_soon();
            return;
        }

        $data['categories'] = [
            'publications' => 'Tous les projets', 
        ];
        echo Models\Core\View::display("Sandbox/views/index.php", $data);
    }
}