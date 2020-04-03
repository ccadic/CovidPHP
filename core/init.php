<?php

require_once(__DIR__.'/Queries.php');
require_once(__DIR__.'/../dbconfig.php');

$queries = new \CovidPHP\Queries($dbConfig);

function echoSafe($str) {
    echo htmlspecialchars($str);
}
