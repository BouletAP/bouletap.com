<?php
require_once __DIR__ . '/../app/bootstrap.php';

use Models\Services\Analytics;


if( $_POST['request_type'] == "get_phone_number" ) {


    $output = [
        "data" => CURRENT_PHONE_NUMBER
    ];

    
    //Analytics::i()->visitor->update($data);  

    echo json_encode($output);
    exit();
}


if( $_POST['request_type'] == "appdata" ) {

    $visitor_id = (int)$_POST['t'];

    if( Analytics::i()->getId() != $visitor_id ) 
        return false;

    // width ; height ; colorDepth ; pixelDepth 
    $unsecured_infos = explode(';', $_POST['i']);
    $screen_data = array_map('intval', $unsecured_infos); 
    $screen_info = "{$screen_data[0]};{$screen_data[1]};{$screen_data[2]};{$screen_data[3]}";

    $data = ['screen_info' => $screen_info];
    Analytics::i()->visitor->update($data);   
}


if( $_POST['request_type'] == "form-audit-seo-2" ) {

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    require_once APP_PATH . '/models/forms/audit_seo.php';
    require_once APP_PATH . '/models/entities/entry.php';
    $form = new Models\Forms\AuditSEO();

    $output = array(
        "state" => "500",
        "data" => "",
        "return" => "Error unknown"
    );


    if( $form->validate() ) {


        $form->save_db();
        

        $submitted_email = $form->getField('courriel')->getValue();
        $submitted_website = $form->getField('website')->getValue();

        $output['state'] = "300";

        $headers = 'From: apb@bouletap.com' . "\r\n" .
        'Reply-To: '.$submitted_email . "\r\n" .
        'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        //$to = 'info@bouletap.com'; deleted email for now
        $to = 'bouletap@gmail.com';

        $message = "Une demande d'audit SEO est entrée";
        $message .= "<br/><br/> Website: ".$submitted_website;

        // pas de fonction MAIL sur ce serveur...
        //if( mail($to, "Demande d'audit SEO", $message, $headers) ) {        
            $output['state'] = "200";
            $output['data'] = ['success'];
        // }
        // else {
        //     $errorMessage = error_get_last();
        //     $output['state'] = "400";
        //     //echo '<pre>'; print_r($errorMessage); echo '</pre>'; die();
        //     $output['return'] = $errorMessage;
        // }
    }
    else {
        $output['state'] = "400";
        $output['data'] = $form->getErrors('flat');
    }

    echo json_encode($output);
    die();
}








// num500 = invalid or classified as robot spam
// num400 = field validation failed
// num300 = form saved but email failed
// num200 = form saved and email sent 
if( $_POST['request_type'] == "form-contact" ) {
    
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    require_once APP_PATH . '/models/forms/contact.php';
    require_once APP_PATH . '/models/entities/entry.php';
    $form = new Models\Forms\ContactForm();

    $output = array(
        "state" => "500",
        "return" => "Error unknown"
    );

    
    $subject = "";
    $message = "";

    if( $form->validate() ) {

        
        $form->save_db();


        $courriel = $form->getField('courriel')->getValue();
        $full_name = $form->getField('full_name')->getValue();
        $phone = $form->getField('phone')->getValue();
        $subject = $form->getField('subject')->getValue();
        $message = $form->getField('message')->getValue();

        $output['state'] = "300";
        $output['data'] = ['success'];

        $headers = 'From: info@bouletap.com' . "\r\n" .
        'Reply-To: '.$courriel . "\r\n" .
        'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $to = 'info@bouletap.com';
        $to = 'bouletap@gmail.com';

        $message = $message;
        $message .= "<br/><br/> De: ".$full_name;
        $message .= !empty($phone) ? "<br/>Tél.: ". $phone : "";

        if( mail($to, $subject, $message, $headers) ) {        
            $output['state'] = "200";
        }
    }
    else {
        $output['state'] = "400";
        $output['data'] = $form->getErrors('flat');
    }

    echo json_encode($output);
    die();
}





die();