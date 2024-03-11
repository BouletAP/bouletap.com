<?php

namespace Models\Entities;

use Models\Core\Router;

class Page {

    private $url;
    private $timeTracker;
    private $actionTracker;

    public function __construct() {
        $this->url = Router::$current_route;
        $this->timeTracker = time();
    }

    public function setAction($a) {
        $this->actionTracker = $a;
    }

    public function getData() {
        return [
            "url" => $this->url,
            "time" => $this->timeTracker,
            "action" => $this->actionTracker
        ];
    }
}