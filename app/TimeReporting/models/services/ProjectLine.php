<?php

namespace Models\Services;

// LINE FORMAT
// [0] => Tâche // DATE
// [1] => Début
// [2] => Fin
// [3] => Projet
// [4] => Facturable
// [5] => Type
// [6] => Total   // SOMME
// [7] => 12:08   // SOMME

class ProjectLine {

    public $timestamp;
    public $task;
    public $timestart;
    public $timeend;
    public $project;
    public $billable_ratio;
    public $type;
 

    public function set_project($name) {
        if( empty($name) ) $name = "bouletap";
        $this->project = $name;
    }

    public function set_billable_ratio($ratio) {
        if( empty($ratio) ) $ratio = 1;
        else $ratio = ((int)str_replace("~", "", $ratio)) / 100;
        $this->billable_ratio = $ratio;
    }

    public function getTime() {

        $endtimestamp = $this->timestamp;

        // si l'heure de start > heure de end, on a changé de journée
        $starttime = explode(':', $this->timestart);
        $endtime = explode(':', $this->timeend);
        if( $starttime[0] > $endtime[0] ) {

            // ajoute 1 journée au timestamp
            $endtimestamp += (3600*24);
        }

        $start  = new \DateTime( date('Y-m-d', $this->timestamp) . " " . $this->timestart );
        $end = new \DateTime( date('Y-m-d', $endtimestamp) . " " . $this->timeend );

        $diff = $start->diff( $end );
        return $diff->format( '%H:%I' );
    }
}