<?php

if (! function_exists('greeting')) {

    function greeting(): string
    {
        $hour = (int)date('H');

        return match (true) {
            $hour >= 0 && $hour < 12 => 'Good Morning',
            $hour >= 12 && $hour < 18 => 'Good Afternoon',
            default => 'Good Evening',
        };
    }
}
