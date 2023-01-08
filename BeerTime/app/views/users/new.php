<?php
$value_username = !empty($form['username']) ? $form['username'] : null;
$value_email = !empty($form['email']) ? $form['email'] : null;
?>

<h1>Inscription</h1>
<form method="post" action="/users/create.php">
  <div>
    <label for="user_username">
      <p>Username:</p>
    </label>
    <input type="text" id="user_username" name="user_username" value="<?= $value_username ?>">
  </div>
  <div>
    <label for="user_email">
      <p>Email:</p>
    </label>
    <input type="text" id="user_email" name="user_email" value="<?= $value_email ?>">
  </div>
  <div>
    <label for="user_password">
      <p>Password:</p>
    </label>
    <input type="password" id="user_password" name="user_password" value="">
  </div>
  <input type="submit" value="S'inscrire" />
</form>
