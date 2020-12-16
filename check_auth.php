<?php

$my_condition = "";

// isset() function provide to check whether a variable is empty
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] != "user_here" || $_SERVER['PHP_AUTH_PW'] != "pass_here")
    $my_condition = "unsuccessful_auth";
else
    $my_condition = "successful_auth";

?>