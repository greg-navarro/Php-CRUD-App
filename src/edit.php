<?php 
include 'partials/header.php';
// get users
// Sample users
$users = json_decode(file_get_contents(__DIR__ . '/users/users.json'), true); 

$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];
$isValid = true;
$success = false;
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

// if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieve user from POST data 
    $user = array_merge($user, $_POST);
    // validate fields
    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = "Add a name bitch!";
    }
    if (!$user['username']) {
        $isValid = false;
        $errors['username'] = "Add a username bitch!";
    }
    if (!$user['email']) {
        $isValid = false;
        $errors['email'] = "Add a email bitch!";
    }
    if (!$user['phone']) {
        $isValid = false;
        $errors['phone'] = "Add a phone bitch!";
    }
    if (!$user['website']) {
        $isValid = false;
        $errors['website'] = "Add a website bitch!";
    }
    // if valid, save to disk, display success message
    if ($isValid) {
        // if valid, add to users array
        $users[$index] = $user;
        // write users array to users.json file
        file_put_contents(__DIR__ . '/users/users.json', json_encode($users, JSON_PRETTY_PRINT));
        $success = true;
        $user_not_found = false;
    } else {
        // Display error message
        echo "You are invalid";
    }
    
    // if not valid, display error messages
}


?>

<?php if ($success == true): ?>
    <p>Successfully saved user.</p>
    <a href="index.php">Home</a>
<?php elseif ($user_not_found == true): ?>
    <p>Error: user not found.</p>
    <a href="index.php">Home</a>
<?php else: ?> 
    <div class="form-container">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $user['name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $user['username'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" value="<?php echo $user['phone'] ?>" required>
            </div>
            <div class="form-group">
                <label for="website">Website:</label>
                <input type="url" id="website" name="website" value="<?php echo $user['website'] ?>">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
<?php endif ?>


<?php include 'partials/footer.php' ?>