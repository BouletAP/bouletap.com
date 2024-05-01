<?php

use BouletAP\Tools\Cookies;
use Models\Core\Auth;
use Models\Core\Database;


class AuthController {
    
    
    public function login() {

        if( Auth::user_can('admin_duty') ) {
            header("Location: /dashboard");
        } 

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
                    
                    // $remember_timer = 3600*24*180;
                    // Auth::setRememberToken($usr, $remember_token, $remember_timer);   
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

        $data = [
            'formState' => $formState,
            'login_form' => $login_form
        ];
        
        echo Models\Core\View::display("Admin/views/login.php", $data);
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
            
            $remember_timer = 3600*24*180;
            Auth::setRememberToken($user, $remember_token, $remember_timer);  
            
            header("Location: /admin");
        }
        return false;
    }
}