<?php
session_start ();

$GLOBALS['config'] = array (
  'mysql' => array (
    'host' => 'fdb18.awardspace.net',
    'username' => '2553650_allier',
    'password' => 'spider909',
    'database' => '2553650_allier'
  ),

  'remember' => array (
    'cookie_name' => 'hash',
    'cookie_expiry' => '604800'
  ),

  'session' => array (
    'session_name' => 'user',
    'token_name' => 'token'
  )
);

spl_autoload_register (function ($class) {
  require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';
