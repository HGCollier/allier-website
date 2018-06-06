<?php
require_once 'core/init.php';

if (input::exists('POST')) {
  if (token::check (input::get ('token'))) {
    $validate = new validate ();
    $validation = $validate->check ($_POST, array (
      'firstname' => array (
        'name' => 'First name',
        'required' => true,
        'min' => 1,
        'max' => 50,
      ),

      'lastname' => array (
        'name' => 'Last name',
        'required' => true,
        'min' => 1,
        'max' => 50
      ),

      'email' => array (
        'name' => 'Email',
        'required' => true,
        'max' => 50,
        'email' => true,
        'unique' => 'users'
      ),

      'username' => array (
        'name' => 'Username',
        'required' => true,
        'min' => 2,
        'max' => 20,
        'unique' => 'users' # Is it unique to the database?
      ),

      'password' => array (
        'name' => 'Password',
        'required' => true,
        'min' => 6,
        'max' => 64
      ),

      'confirm-password' => array (
        'name' => 'Confirm password',
        'required' => true,
        'matches' => 'password'
      )
    ));

    if ($validation->passed ()) {
      # Register user
      $user = new user ();
      $salt = hash::salt (32);

      try {
        $user->create (array (
          'firstname' => input::get ('firstname'),
          'lastname' => input::get ('lastname'),
          'email' => input::get ('email'),
          'username' => input::get ('username'),
          'password' => hash::make (input::get ('password'), $salt),
          'group' => 1,
          'joined' => date ('Y-m-d H:i:s'),
          'salt' => $salt
        ));

        redirect::to ('index.php');
      } catch (Exception $e) {
        die ($e->getMessage ());
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up | Allier</title>
  </head>
  <body>
    <form action="" method="post">
      <div class="field">
        <input type="text" name="firstname" value="<?php echo escape(input::get ('firstname')); ?>" placeholder="First Name" autocomplete="off">
        <strong><?php echo $validate->_errors ['firstname']; ?></strong>
      </div>
      <div class="field">
        <input type="text" name="lastname" value="<?php echo escape(input::get ('lastname')); ?>" placeholder="Last Name" autocomplete="off">
        <strong><?php echo $validate->_errors ['lastname']; ?></strong>
      </div>
      <div class="field">
        <input type="text" name="email" value="<?php echo escape(input::get ('email')); ?>" placeholder="Email" autocomplete="off">
        <strong><?php echo $validate->_errors ['email']; ?></strong>
      </div>
      <div class="field">
        <input type="text" name="username" value="<?php echo escape(input::get ('username')); ?>" placeholder="Username" autocomplete="off">
        <strong><?php echo $validate->_errors ['username']; ?></strong>
      </div>
      <div class="field">
        <input type="password" name="password" placeholder="Password" autocomplete="off">
        <strong><?php echo $validate->_errors ['password']; ?></strong>
      </div>
      <div class="field">
        <input type="password" name="confirm-password" placeholder="Confirm Password" autocomplete="off">
        <strong><?php echo $validate->_errors ['confirm-password']; ?></strong>
      </div>
      <input type="hidden" name="token" value="<?php echo token::generate (); ?>">
      <input type="submit" value="Sign Up">
    </form>
  </body>
</html>
