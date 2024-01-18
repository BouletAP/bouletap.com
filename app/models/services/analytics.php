<?php

namespace Models\Services;

use Models\Entities\Visitor;
use Models\Entities\Visit;
use Models\Core\Database;

//use BouletAP\Tools\Cookies;

class Analytics {
   
    static $instance = false;
    //public $tracker_id;
    
    public $is_fresh_visitor = false;

    public $visitor;
    public $visits;
    
    public $current_visit;
    //public $current_page;

   
    static public function i() {
        if( !self::$instance ) {
            self::$instance = new self();        
            // init visitor
            self::$instance->visitor = Visitor::init();
            self::$instance->current_visit = new Visit();
        }               
        return self::$instance;
    }


    public function getId() {
        return $this->visitor->getData('id');
    }


    // get current tracker or init one
    static function start() {
        return static::i();
    }

    static function end() {

        // save visited page info
        // save current_visit to visits
    }


    public function add_footer_script() {

        // this part is to grab info of a fresh visitor
        if( $this->is_fresh_visitor ) {
        ?>
            <script id="analytics-footer-script">
                var app_t = '<?php echo $this->getId(); ?>';
                var app_info = screen.width + ";" + screen.height + ";" + screen.colorDepth + ";" + screen.pixelDepth;
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/ajax');
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("request_type=appdata&t="+app_t+"+&i="+encodeURIComponent(app_info));
                document.querySelector('#analytics-footer-script').remove();
            </script>
        <?php
        }

        // this part is to get info on 
        // actions (clicks, form sent) 
        // time spent on the page (timer, scroll behaviours, ...)
        // ...
    }
}