<?php
class User
{
  // Variables
  // ===========================================================================

  // Database table.
  const TABLE_NAME = "users";

  // Object properties
  public $id = null;
  public $username = null;
  public $email = null;
  public $role_id = 1;
  public $password = null;
  public $password_hash = null;
  public $session_token = null;
  public $errors = null;

  // Constructor
  // ===========================================================================

  // Initialize an object item with associated data.
  private static function populate($data)
  {
    $item = new self();
    foreach (get_object_vars($item) as $ik => $iv) {
      $item->$ik = isset($data->$ik) ? $data->$ik : $iv;
    }
    return $item;
  }

  // Retrieve
  // ===========================================================================

  // Return all records.
  public static function all($items = [])
  {
    $datas = Database::all(self::TABLE_NAME);
    foreach ($datas as $data) { array_push($items, self::populate($data)); }
    return $items;
  }

  // Return a record searching by its `id`.
  public static function find($id)
  {
    $data = Database::find(self::TABLE_NAME, $id);
    return $data ? self::populate($data) : null;
  }

  // Return an user by its credentials.
  public static function findWithCredentials($username, $password)
  {
    $data = Database::where(self::TABLE_NAME, 'username', $username);
    $user = $data ? self::populate($data) : null;
    if($user && $user->authWithPassword($password)) {
      return $user;
    }
  }

  // Retrieve an user by token.
  public static function findWithToken($id, $token)
  {
    $user = self::find($id);
    if($user && $user->session_token == $token) {
      return $user;
    }
  }

  // Validations & persistence.
  // ===========================================================================

  // Check if username already exist in database.
  private function validateUniqueUsername()
  {
    if (!preg_match('/^[a-z]\w{2,23}[^_]$/i', $this->username)) {
      array_push($this->errors, ['invalid_username' => 'Le format de votre pseudo est invalide']);
    }
    $data = Database::where(self::TABLE_NAME, 'username', $this->username);
    if ($data) {
      array_push($this->errors, ['unique_username' => 'Un utilisateur possède déjà ce pseudo.']);
    }
  }

  // Check if email already exist in database.
  private function validateUniqueEmail()
  {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errors, ['invalid_email' => 'Le format de votre email est invalide']);
    }
    $data = Database::where(self::TABLE_NAME, 'email', $this->email);
    if ($data) {
      array_push($this->errors, ['unique_email' => 'Un utilisateur possède déjà cet email.']);
    }
  }

  // Check password
  private function validatePassword()
  {
    if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $this->password)) {
      array_push($this->errors, ['invalid_password' => 'Le mot de passe est invalide.']);
    }
  }


  // Check if model is valid.
  public function isValid()
  {
    $this->errors = [];
    $this->validateUniqueUsername();
    $this->validateUniqueEmail();
    $this->validatePassword();
    return empty($this->errors) ? true : false;
  }

  // Create a record.
  public function create()
  {
    if ($this->isValid()) {
      $this->generateSessionToken();
      $this->setPassword($this->password);
      $datas = get_object_vars($this);
      unset($datas['password']);
      unset($datas['errors']);
      Database::insert(self::TABLE_NAME, $datas);
    }
  }

  // Update a record.
  public function save()
  {
    if ($this->isValid()) {
      $datas = get_object_vars($this);
      unset($datas['password']);
      unset($datas['errors']);
      Database::update(self::TABLE_NAME, $this->id, $datas);
    }
  }

  // Functions
  // ===========================================================================

  // Generate a random session_token.
  public function generateSessionToken() {
    $this->session_token = hash("sha256", rand());
  }

  // Encrypt password.
  public function setPassword($password)
  {
    $this->password_hash = password_hash($password, PASSWORD_DEFAULT);
  }

  // Check if password match a given value.
  public function authWithPassword($password)
  {
    return password_verify($password, $this->password_hash) ? true : false;
  }
}
