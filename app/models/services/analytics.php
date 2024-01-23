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


    // start tracker or update page infos
    static function start() {
        $analytic = static::i();        
    }

    static function end() {

        $analytic = static::i();
        $visitor_id = $analytic->getId();
        
        
        $last_visit = Visit::findLastVisit($visitor_id);

        if( !empty($last_visit) ) {
            $last_session_id = $last_visit->getData('session_id');
            if( $last_session_id == session_id() ) {
                $current_visit = $last_visit;    
            }        
        }

        if( empty($current_visit) ) {
            $current_visit = Visit::initByVisitor($visitor_id);
        }

        // update current visit with page data
        $current_visit->updatePagesVisited();
        $current_visit->update();
    }


    public function add_footer_script() {

        // this part is to grab info of a fresh visitor
        if( $this->is_fresh_visitor ) {
        ?>
            <script id="analytics-new-visitor">
                var app_t = '<?php echo $this->getId(); ?>';
                var app_info = screen.width + ";" + screen.height + ";" + screen.colorDepth + ";" + screen.pixelDepth;
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/ajax');
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("request_type=appdata&t="+app_t+"+&i="+encodeURIComponent(app_info));
                document.querySelector('#analytics-new-visitor').remove();
            </script>
        <?php
        }

        // this part is to get info on 
        // actions (clicks, form sent) 
        // time spent on the page (timer, scroll behaviours, ...)
        // ...
        ?>
            <script id="analytics-page-visit">
                // setInterval( () => {
                //     var app_t = '<?php echo $this->getId(); ?>';
                //     var app_info = window.pageYOffset;

                //     var xhr = new XMLHttpRequest();
                //     xhr.open('POST', '/ajax');
                //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                //     xhr.send("request_type=pagedata&t="+app_t+"+&i="+encodeURIComponent(app_info));
                // }, 10000);
            </script>
        <?php
    }
}