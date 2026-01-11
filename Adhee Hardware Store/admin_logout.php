<?php
session_start();
// Store username before clearing session
$username = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : 'Admin';

// Clear only admin session variables
unset($_SESSION['admin_user_id']);
unset($_SESSION['admin_username']);
unset($_SESSION['admin_role']);
unset($_SESSION['admin_login']);
unset($_SESSION['admin_welcome_message']);
// Keep customer session if exists (they're separate)

// Redirect to admin login with logout message
header('Location: admin_login.php?logout=success&username=' . urlencode($username));
exit();
?>