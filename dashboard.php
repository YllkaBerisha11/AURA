<?php
session_start();
include_once 'Database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

class Dashboard {
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function countMessages() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total FROM contact_us");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function countUsers() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS total FROM useri");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getMessages() {
        $stmt = $this->conn->prepare("SELECT * FROM contact_us");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM useri");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function deleteUser($userId) {
        $stmt = $this->conn->prepare("DELETE FROM useri WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        return $stmt->execute();
    }
    public function addUser($name, $surname, $email, $password) {
        $stmt = $this->conn->prepare("INSERT INTO useri (name, surname, email, password) VALUES (:name, :surname, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT));
        return $stmt->execute();
    }
}

$dashboard = new Dashboard();
$messageCount = $dashboard->countMessages();
$users = $dashboard->getUsers();
$userCount = count($users);
$messages = $dashboard->getMessages();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_user'])) {
    $userId = $_POST['user_id'];
    $dashboard->deleteUser($userId);
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dashboard->addUser($name, $surname, $email, $password);
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="dashboard.css">
<title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <h1>Admin Dashboard</h1>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="aboutUs.html">About Us</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="sales.html">Sales</a></li>
            <li><a href="contactUs.php">Contact Us</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="dashboard-container">
        <div class="dashboard-row">
            <div class="box" id="messages-box">
                <h2><a href="javascript:void(0);" onclick="toggleMessagesTable()">Total Messages</a></h2>
                <p><?php echo $messageCount; ?></p>
            </div>
            <div class="box" id="users-box">
                <h2><a href="javascript:void(0);" onclick="toggleUsersTable()">Total Registered Users</a></h2>
                <p><?php echo $userCount; ?></p>
            </div>
        </div>
        <div id="add-user-form" class="data-container">
            <h3>Create New User:</h3>
            <form method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="surname" placeholder="Surname" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="add_user">Add User</button>
            </form>
        </div>
        <div id="data-container" class="data-container">
            <h3>Messages List:</h3>
            <table id="messages-table" border="1" style="display:none;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?php echo $message['id']; ?></td>
                        <td><?php echo $message['name']; ?></td>
                        <td><?php echo $message['email']; ?></td>
                        <td><?php echo $message['message']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div id="users-container" class="data-container">
            <h3>Registered Users:</h3>
            <table id="users-table" border="1" style="display:none;">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['surname']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="delete_user">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script>
        function toggleMessagesTable() {
            var table = document.getElementById("messages-table");
            table.style.display = (table.style.display === "none") ? "block" : "none";
        }
        function toggleUsersTable() {
            var table = document.getElementById("users-table");
            if (table.style.display === "none" || table.style.display === "") {
                table.style.display = "table";
            } else {
                table.style.display = "none";
            }
        }
    </script>
</body>
</html>
