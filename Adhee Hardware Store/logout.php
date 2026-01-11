<?php
// Start the session if it is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Store username for notification (if available)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User';

// IMPORTANT: Only clear customer session variables, don't destroy entire session
// This allows customer and admin sessions to coexist independently
// Admin can remain logged in even when customer logs out
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['role']);

// Clear remember token cookie if it exists
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/');
}

// Redirect to home page with logout message
header('Location: Index.php?logout=success');
exit();
?>

