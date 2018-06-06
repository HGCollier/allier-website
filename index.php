<?php
require_once 'core/init.php';

$user = new user ();

if ($user->loggedIn ()) {
  $loggedIn = true;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Official Site | Allier</title>
    <?php
    include_once 'includes/html/header.php';
    ?>
    <section class="landing">
      <div class="logo-container">
        <img src="images/Allier-Logo.png" alt="Allier logo" class="logo">
      </div>
      <h1>by Halden Collier & Askr Bushi</h1>

      <div id="video-container">
        <div class="frame-container">
          <img class="video-frame" src="images/video-frame.png">

        <div class="trailer">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/3qnKd5wKi58" frameborder="0" allow="autoplay; encrypted-media" allowtransparency="true" allowfullscreen></iframe>
        </div>
        </div>
      </div>

      <a href="#"><img src="images/buy-button.png" alt="Buy Button" class="button"></a>
    </section>

    <?php
    if ($loggedIn) {
    ?>

    <p>You are currently logged in as, <a href="#"><?php echo $user->data ()->username; ?></a></p>

    <ul>
      <li><a href="#">Account Management</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>

    <?php
    }

    include_once 'includes/html/footer.php';
    ?>
  </body>
</html>
