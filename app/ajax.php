<?php
require_once __DIR__ . '/../app/bootstrap.php';

use Models\Services\Analytics;


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
        "return" => "Error unknown"
    );


    if( $form->validate() ) {

        $form_data = [
            'courriel' => $form->getField('courriel')->getValue(),
            'website' => $form->getField('website')->getValue()
        ];

        Models\Entities\Entry::save($form_data);

        $output['state'] = "300";
        $output['data'] = ['success'];

        $headers = 'From: info@bouletap.com' . "\r\n" .
        'Reply-To: '.$form_data['courriel'] . "\r\n" .
        'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $to = 'info@bouletap.com';

        $message = "Une demande d'audit SEO est entrée";
        $message .= "<br/><br/> Website: ".$form_data['website'];

        if( mail($to, "Demande d'audit SEO", $message, $headers) ) {        
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

        $form_data = [
            'email' => $form->getField('courriel')->getValue(),
            'subject' => $form->getField('subject')->getValue(),
            'message' => $form->getField('message')->getValue(),
            'full_name' => $form->getField('full_name')->getValue(),
            'phone' => $form->getField('phone')->getValue()
        ];

        Models\Entities\Entry::save($form_data);

        $output['state'] = "300";
        $output['data'] = ['success'];

        $headers = 'From: info@bouletap.com' . "\r\n" .
        'Reply-To: '.$form_data['email'] . "\r\n" .
        'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $to = 'info@bouletap.com';

        $message = $form_data['message'];
        $message .= "<br/><br/> De: ".$form_data['full_name'];
        $message .= !empty($form_data['phone']) ? "<br/>Tél.: ". $form_data['phone'] : "";

        if( mail($to, $form_data['subject'], $message, $headers) ) {        
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