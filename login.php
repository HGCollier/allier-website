<?php
require_once 'core/init.php';

if (input::exists ('POST')) {
  if (token::check (input::get ('token'))) {
    $validate = new validate ();
    $validation = $validate->check ($_POST, array (
      'username-email' => array (
        'name' => 'Username or email',
        'required' => true
      ),

      'password' => array (
        'name' => 'Password',
        'required' => true
      )
    ));

    if ($validation->passed ()) {
      $user = new user ();
      $login = $user->login (input::get ('username-email'), input::get ('password'));

      if ($login) {
        redirect::to ('index.php');
      } else {
        echo '<strong>An error occurred</strong>';
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In | Allier</title>
    <?php
    include_once 'includes/html/header.php';
    ?>
    <div class="landing">
      <div class="logo-container">
        <img src="images/Allier-Logo.png" alt="Allier logo" class="logo">
      </div>
      <h1>by Halden Collier & Askr Bushi</h1>

      <form action="" method="POST" class="login">
        <div class="field">
          <input type="text" name="username-email" class="field" autocomplete="off" placeholder="Username">
          <p class="error"><?php echo $validate->_errors ['username-email']; ?></p>
        </div>
        <div class="field">
          <input type="password" name="password" class="field" autocomplete="off" placeholder="Password">
          <p class="error"><?php echo $validate->_errors ['password']; ?></p>
        </div>
        <input type="hidden" name="token" value="<?php echo token::generate (); ?>">
        <input type="submit" value="Log In" class="submit">
      </form>

      <?php
      include_once 'includes/html/footer.php';
      ?>
    </div>
  </body>
</html>
