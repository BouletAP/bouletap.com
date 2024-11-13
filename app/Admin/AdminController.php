<?php

use BouletAP\Tools\Cookies;
use Models\Core\Auth;
use Models\Core\Database;

use Models\Entities\Visitor;

//use BouletAP\Framework\Views;
//use BouletAP\Framework\Ajax;



class AdminController {
    
    public function __construct() {
        if( !Auth::user_can('admin_duty') ) {
            header("Location: /connexion");
        } 
    }

    public function dashboard() {
        
        $contact_messages = [
            "audit-seo" => [],
            "contact" => [],
        ];

        $form_entries = Models\Entities\Entry::get_last(5);
        if( !empty($form_entries) ) {

            

            foreach($form_entries as $entry) {

                if( array_key_exists($entry['form'], $contact_messages) ) {
                    $contact_messages[$entry['form']][$entry['id']] = unserialize($entry['form_data']);
                }
            }
        }

        $visitors = Visitor::recent();

        $data = [
            'messages_audit' => $contact_messages['audit-seo'],
            'messages_contact' => $contact_messages['contact'],
            'visitors' => $visitors
        ];

        echo Models\Core\View::display("Admin/views/dashboard.php", $data);
    }


    public function flag_read($id = false) {

        $id = (int)$id;
        $entry = Models\Entities\Entry::get_by('id', $id);
        if( $id <= 0 || empty($entry) ) {
            header("Location: /admin");
            die();
        }

        $entry->read();

        header("Location: /admin");
        die();
    }
    
    public function full_backup() {

        ini_set('display_errors', 0);
        
        // test .sql export (SUCCESS)
        //Database::Export_Database("freshbackup.sql");

        die();
    }
}