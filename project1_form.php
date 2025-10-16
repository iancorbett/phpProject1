<?php

function clean($v){ return trim($v ?? ''); } //TAKES IN VALUE AND TRIMS IT, if null it defaults to an empty string

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = clean($_POST['first_name'] ?? '');
    $last  = clean($_POST['last_name'] ?? '');
}