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
    <title>Official Site | Allier</title>
    <?php
    include_once 'includes/html/header.php';
    ?>
    <section class="landing">
      <div class="logo-container">
        <img src="images/Allier-Logo.png" alt="Allier logo" class="logo">
      </div>
      <h1>by Halden Collier & Askr Bushi</h1>

      <?php
      if (!$loggedIn) {
      ?>
      <div id="video-container">
        <img class="video-frame" src="images/video-frame.png">

        <div class="trailer">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/6oBk9qEmAnE?modestbranding=1&showinfo=0&rel=0" frameborder="0" allowtransparency="true" allowfullscreen></iframe>
        </div>
      </div>

      <a href="#" class='buy-btn'><p>BUY NOW<br><small>(Windows PC) - £4.99</small></p></a>

      <?php
      } else {
      ?>

      <div id="account-container">
        <p>You are currently logged in as, <a href="#"><?php echo $user->data ()->username; ?></a></p>

        <ul>
          <li><a href="#">Account Management</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>

    <?php
    }
    ?>

    </section>

    <?php
    include_once 'includes/html/footer.php';
    ?>
  </body>
</html>
