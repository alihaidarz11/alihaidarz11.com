<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $full_name = $_POST['fullname'];
    $sex = $_POST['sex'];
    $dob = $_POST['dob'];
    $users_data = [];
    $filename = 'users.json';

    if (file_exists($filename)) {
        $users_data = json_decode(file_get_contents($filename), true);
    }

    
    foreach ($users_data as $user) {
        if ($user['username'] === $username) {
            echo "Username already exists. Please choose a different username.";
            return;
        }
    }

    
    $new_user = [
        'username' => $username,
        'full_name' => $full_name,
        'password' => $password,
        'sex' => $sex,
        'dob' => $dob,
    ];

    $users_data[] = $new_user;
    file_put_contents($filename, json_encode($users_data));
    echo "User registration successful!";
}
?>
