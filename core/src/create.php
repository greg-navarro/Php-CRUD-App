<?php
include 'partials/header.php';

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // retrieve data from post request
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
    // determine next id number + assign
    $id = 0;
    foreach ($users as $existing_user) {
        // Check if 'id' exists and is an integer
        if (isset($existing_user['id']) && is_int($existing_user['id'])) {
            // Update the largest ID if the current ID is greater
            if ($existing_user['id'] > $id) {
                $id = $existing_user['id'];
            }
        }
    }
    $id = $id + 1;
    // process POST request
    if ($isValid) {
        // if valid, add to users array
        $user['id'] = $id;
        $users[] = $user;
        // write users array to users.json file
        file_put_contents(__DIR__ . '/users/users.json', json_encode($users, JSON_PRETTY_PRINT));
        $success = true;
    } else {
        // Display error message
        echo "You are invalid";
    }
}

?>
<?php if ($success == false): ?>
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
<?php else: ?> 
    <p>Successfully saved user.</p>
    <a href="index.php">Home</a>
<?php endif ?>

<?php include 'partials/footer.php' ?>