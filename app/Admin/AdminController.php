<?php

use BouletAP\Tools\Cookies;
use Models\Core\Auth;
use Models\Core\Database;

//use BouletAP\Framework\Views;
//use BouletAP\Framework\Ajax;



class AdminController {
    
    public function dashboard() {

        if( !Auth::user_can('admin_duty') ) {
            header("Location: /login");
        } 

        echo "my basic dashboard";
        echo "<h1>IM LOGGED IN</h1>";
    }

    public function login() {

        $login_form = new Models\Forms\LoginForm();
        $formState = 'default';


        if( $login_form->validate() ) { 


            $usr = $login_form->getField('courriel')->getValue();
            $results = Database::query()->where ('email', $usr)->get ('users');

            if( count($results) > 0 ) {

                $data = $results[0];
                
                $salt = $data['salt'];
                $hashed_pwd = $data['password'];
                $remember_token = $data['remember_token'];

                $pass = $login_form->getField('password')->getValue();      
                $pwd = Auth::hash_password($pass, $salt);                

                if( $pwd == $hashed_pwd ) {
                    
                    Auth::setRememberToken($usr, $remember_token);    
                    header('Location: /dashboard');
                }                
            }
            else {
                header('Location: /');
            }
        }
        elseif( $login_form->error() ) { // ->erronous();
            $formState = 'pass';
        }


        // LayoutVisitor::add_data('formState', $formState);
        // LayoutVisitor::add_data('login_form', $login_form);
        // LayoutVisitor::display('public/login');

        ob_start();
        include(APP_PATH . "/Admin/views/login.php");
        $content = ob_get_clean();

        ob_start();
        include(APP_PATH . "/pages/templates/layout.php");
        $layout = ob_get_clean();

        $page = str_replace('{{PAGE_CONTENT}}', $content, $layout);
        echo $page;
    }

    public function logout() {

        // kill token
        $remember_token = time();
        Cookies::add('account_id', $remember_token, 3600*6);
        header("Location: /admin");
    }


    function register_user() {
        $data = [
            'name' => 'x',
            'email' => 'y',
            'password' => 'z',
            'salt' => 'xyz'
        ];

        $data['password'] = Auth::hash_password($data['password'], $data['salt']);
        $id = Database::query()->insert ('users', $data);        
    }

    function autologin() {
        $user = 'apb@bouletap.com';
        $results = Database::query()->where ('email', $user)->get ('users');
        if( count($results) > 0 ) {
            $data = $results[0];
            $salt = $data['salt'];
            $remember_token = $data['remember_token'];
            
            Auth::setRememberToken($user, $remember_token);  
            
            header("Location: /admin");
        }
        return false;
    }
}