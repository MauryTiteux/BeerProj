<?php
$value_username = !empty($form['username']) ? $form['username'] : null;
?>

<h1>Connexion</h1>
<form method="post" action="/sessions/create.php">
  <div>
    <label for="user_pseudo"><p>Username:</p></label>
    <input type="text" id="user_pseudo" name="user_pseudo" value="<?= $value_username ?>">
  </div>
  <div>
    <label for="user_password"><p>Password:</p></label>
    <input type="password" id="user_password" name="user_password" value="">
  </div>
  <input type="submit" value="Se conecter" />
</form>
