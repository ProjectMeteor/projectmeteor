<?php
// define our filesystem root
define('BASE_PATH',dirname(__FILE__).'/');

// get the primary include
require_once(BASE_PATH.'includes/meteor.class.php');

// go
Meteor::impact();
?>