<?php
    namespace Space\Normal;

    function calculate_time() {
        return date_diff(date_create("Now"), date_create("1939-01-01"));
    }
?>