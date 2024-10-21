<?php

namespace Models\Services;

use Models\Core\Database;

class Notifications {
   
    public function getUnreadNotifications() {
        $db = Database::query();
        $db->orderBy("id","Desc");
        $db->where("is_read", "0");
        $results = $db->get('form_entries');
        return $results;
    }




    public function display() {

        $notifs = $this->getUnreadNotifications();

        if(count($notifs) == 0) {
            return;
        }

        ob_start();
        ?>
            <div id="notifications-container">
                <p><i class="lni lni-popup"></i> Vous avez <a href="/admin/"><?php echo count($notifs); ?> notifications</a> en attente de traitement.</p>
            </div>
        <?php
        return ob_get_clean();
    }
}