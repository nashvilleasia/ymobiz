<?php

echo '<pre>';
//ini_set('session.cookie_domain', substr($_SERVER['SERVER_NAME'],strpos($_SERVER['SERVER_NAME'],"."),100));
//session_set_cookie_params(60*60,"/",".ymobiz",false,false);
session_set_cookie_params("session.cookie_domain", 0, '/', ".ymobiz");
session_name('ymobiz');
session_id('ymobiz');
session_start();
echo "Session ID : ".session_id()."\n";
$_SESSION['foo'] = 'bar';
print_r($_SESSION);

setcookie("TestCookie", "TestValue");