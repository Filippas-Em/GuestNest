<?php
session_start();
include 'config.php';

$response = array('status' => 'failed');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user data from the form
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch user data
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if ($row && password_verify($password, $row['password'])) {
        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['id']; // Store user ID in session

        // Set a cookie to indicate the user is logged in
        $cookie_name = "loggedin";
        $cookie_value = 1;
        $cookie_expiration = time() + (86400 * 7); // 1 week
        setcookie($cookie_name, $cookie_value, $cookie_expiration, "/");

        // Update response status to success
        $response['status'] = 'success';
    }
}

mysqli_close($conn);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
