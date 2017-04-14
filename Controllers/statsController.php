<?php


    class Stats
    {
        /**
        * display stats
        */
        static public function DisplayStatsView()
        {
            global $user;
            require_once("./Views/statsView.php");
        }
    }
?>