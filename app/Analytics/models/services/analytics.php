<?php

namespace Models\Services;

use Models\Entities\Visitor;
use Models\Entities\Visit;
use Models\Core\Database;
use Models\Core\Router;
use Models\Core\Auth;

//use BouletAP\Tools\Cookies;

class Analytics {
   
    static $instance = false;
    //public $tracker_id;
    
    public $is_fresh_visitor = false;

    public $current_visitor;
    public $current_visit;
    public $visits;
    
    public $is_trackable = true;


    //public $current_visit;
    //public $current_page;

   
    static public function i() {
        if( !self::$instance ) {
            self::$instance = new self();        
                       
            self::$instance->is_trackable = !Auth::user_can('admin_duty');

             
            // $slug = Router::getSlug();
            // self::$instance->is_trackable = strpos($slug, "AnalyticsController") === false;

            // if( IS_DEV ) {
            //     echo 'is_trackable<pre>'; print_r(self::$instance->is_trackable); echo '</pre>'; 
            // }
        }               
        return self::$instance;
    }


    // start tracker or update page infos
    static function start() {        
        static::track_visitor();
        static::track_visit();
    }

    static function end() {

        return false;

        // $visitor_id = Analytics::i()->current_visitor->id;        
        
        // $last_visit = Visit::findLastVisit($visitor_id);

        // if( !empty($last_visit) ) {
        //     $last_session_id = $last_visit->getData('session_id');
        //     if( $last_session_id == session_id() ) {
        //         $current_visit = $last_visit;    
        //     }        
        // }

        // if( empty($current_visit) ) {
        //     $current_visit = Visit::initByVisitor($visitor_id);
        // }

        // // update current visit with page data
        // $current_visit->updatePagesVisited();
        // $current_visit->update();
    }

    static public function track_visitor() {
        self::i()->current_visitor = Visitor::init();
        self::i()->is_fresh_visitor = self::$instance->current_visitor->is_first_visit;
    }
    static public function track_visit() {
        $visitor = static::i()->current_visitor;       
        $visit = new Visit([
            "visitor_id" => $visitor->id,
            "slug" => Router::getRealSlug(),
            "created" => time()
        ]);

        //echo 'saving<pre>'; print_r($visit); echo '</pre>';
        if( self::i()->is_trackable ) {
            //echo 'saving<pre>'; print_r($visit); echo '</pre>';
            $visit->save();
            //die();
        }
        static::i()->current_visit = $visit;
    }


    public function javascript_fresh_visitor() {
        ob_start();
        ?>
        <script id="analytics-new-visitor">
            var app_t = '<?php echo $this->getId(); ?>';
            var app_info = screen.width + ";" + screen.height + ";" + screen.colorDepth + ";" + screen.pixelDepth;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/ajax/save-appdata');
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("t="+app_t+"+&i="+encodeURIComponent(app_info));
            document.querySelector('#analytics-new-visitor').remove();
        </script>
        <?php
        return ob_get_clean();
    }

    public function getId() {
        return $this->current_visitor->id;
    }

    /*
    * 1. Page OnLoad: Create visit info + hash. Print Hash for Interval
    * 2. Interval: Update visit info with VisitData
    * 3. OnActionableKPI: Update visit info with ActionData
    **/
    public function javascript_page_visit() {

        $visitor = $this->current_visitor;
        $visit = $this->current_visit;

        ob_start();
        ?>
        <script id="analytics-page-visit">
            var appdataIntervalCount = 0;
            var appdataIntervalStopper = 3;
            var appdataInterval = setInterval( () => {
                var app_v = '<?php echo $visit->id ?>';
                var app_s = '<?php echo Router::getSlug() ?>';
                var app_info = window.pageYOffset;

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/ajax/update-appdata');
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("pid="+app_v+"+&rou="+app_s+"+&y="+encodeURIComponent(app_info));

                appdataIntervalCount = appdataIntervalCount+1;
                if( appdataIntervalCount >= appdataIntervalStopper ) {
                    clearInterval(appdataInterval);
                }
            }, 10000);
        </script>
        <?php
        return ob_get_clean();
    }

    public function add_footer_script() {       

        if( !static::i()->is_trackable ) {
            return false;
        }

        if( $this->is_fresh_visitor ) {
            echo $this->javascript_fresh_visitor();
        }
        echo $this->javascript_page_visit();
    }
}