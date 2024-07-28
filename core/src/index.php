<?php
// Sample data
$users = json_decode(file_get_contents(__DIR__ . '/users/users.json'), true);


include 'partials/header.php';


// Database connection settings
$host = '127.0.0.1';
$port = '3306';
$dbname = 'app';
$user = 'mysql';
$password = 'mysql';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    echo "Create a PDO instance $dsn \r\n";
    echo "\n";
    $pdo = new PDO($dsn, $user, $password);

    echo "Set the PDO error mode to exception";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Prepare and execute the query";
    $sql = 'SELECT * FROM users';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the results
    echo "<pre>";
    print_r($results);
    echo "</pre>";

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<div> <a href="create.php" class="button-link">Create New User</a> <div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['phone']); ?></td>
                <td><?php echo htmlspecialchars($user['website']); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo htmlspecialchars($user['id']); ?>" >Edit</a>
                    <a href="view.php?id=<?php echo htmlspecialchars($user['id']); ?>" >View</a>
                    <form method="POST" action="delete.php">
                        <input hidden name="id" value="<?php echo $user['id'] ?>" >
                        <button class="btn btn-delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<script>
    function handleEdit() {
        alert('Edit button clicked');
        // Add your edit functionality here
    }

    function handleDelete() {
        alert('Delete button clicked');
        // Add your delete functionality here
    }

    function handleView() {
        alert('View button clicked');
        // Add your view functionality here
    }
</script>
<?php
include 'partials/footer.php';
?>