<?php
  // Initialize Sessions
  session_start();

  // Destroy all alerts
  function sessionAlertDestroy() {
    $_SESSION['alert'] = [];
  }

  // Add an alert
  function sessionAlertAdd($type, $message) {
    array_push($_SESSION['alert'], ['type' => $type, 'message' => $message]);
  }
?>
