<?php
require_once 'core/init.php';

$user = new user;
$user->logout ();

redirect::to ('index.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log Out | Allier</title>
  </head>
  <body>

  </body>
</html>
