<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $users_data = [];
    $filename = 'users.json';

    if (file_exists($filename)) {
        $users_data = json_decode(file_get_contents($filename), true);
    }

    
    foreach ($users_data as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            echo "Login successful!";
            return;
        }
    }

    echo "Invalid username or password.";
}
?>
