<?php
// Sample users
$users = json_decode(file_get_contents(__DIR__ . '/users/users.json'), true); 

$names = [];
foreach ($users as $user) {
    $names[] = $user['name'];
}
// echo var_dump($names);
// Identify user by id, remove user from array
$id = $_POST["id"];
$target = NULL;
for ($i = 0; $i < count($users) && is_null($target); $i = $i + 1) {
    $user = $users[$i];
    if ($user['id'] == $id) {
        $target = $i;
        array_splice($users, $i, 1);
    }
}
$names = [];
foreach ($users as $user) {
    $names[] = $user['name'];
}
// echo var_dump($names);
if (!is_null($target)) {
    // Persist data
    file_put_contents(__DIR__ . '/users/users.json', json_encode($users, JSON_PRETTY_PRINT));
    // echo "Success";
    header("Location: index.php"); // FIXME: for testing purposes
    
} else {
    // We should handle an error somehow
    echo "ID not found";
}

// Redirect to index.php
// header("Location: index.php"); // FIXME: for testing purposes