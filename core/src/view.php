<?php

include "partials/header.php";

// Sample users
$users = json_decode(file_get_contents(__DIR__ . '/users/users.json'), true); 
$user_not_found = true;
// retrieve id from get request
$id = $_GET['id'];
// validate id and retrieve specific user + index
$index = -1;
for ($i = 0; $i < count($users); $i = $i + 1) {
    $existing_user = $users[$i];
    if ($existing_user['id'] == $id) {
        $user = $existing_user;
        $user_not_found = false;
        $index = $i;
    }
}
?>

<div class="user-profile">
    <h1>User Profile</h1>
    <p><strong>ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
    <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($user['email']); ?>"><?php echo htmlspecialchars($user['email']); ?></a></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
    <p><strong>Website:</strong> <a href="<?php echo htmlspecialchars($user['website']); ?>" target="_blank" rel="noopener noreferrer"><?php echo htmlspecialchars($user['website']); ?></a></p>
</div>
<a href="index.php">Home</a>

<?php include "partials/footer.php" ?>