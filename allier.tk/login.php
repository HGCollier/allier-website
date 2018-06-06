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
    <title>Log In | Allier</title>
    <?php
    include_once 'includes/html/header.php';
    ?>
    <div class="landing">
      <img src="images/Allier-Logo.png" alt="Allier logo" class="logo">

      <div id="login-container">
        <div class="sign-up">
          <img src="images/icons/account-icon.png"></img>

          <h1>Don't have an account?</h1>
          <a href="signup.php">Sign Up</a>

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
        </div>
      </div>
    </div>

    <?php
    include_once 'includes/html/footer.php';
    ?>
  </body>
</html>
