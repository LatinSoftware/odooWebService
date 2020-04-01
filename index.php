<?php
require_once('ripcord.php');

$url = "http://192.168.147.131:8069";
$db = "vive_oficial";
$username = "admin";
$password = "Artesania99..";


$common = ripcord::client("$url/xmlrpc/2/common");
print_r($common->version());

