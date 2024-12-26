
 <?php
session_start();

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = ''; // Change this to your MySQL password
$dbName = 'doanupdate'; // Name of your database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['user']) ? trim($_POST['user']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Check if both fields are filled
    if (empty($email) || empty($password)) {
        echo "Both email and password are required.";
        exit();
    }

    // Connect to the database
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE `Username` = ? AND `Password` = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['user'] = $email; // Set session variable
    } else {
        // Invalid credentials
        echo "Invalid email or password.";
        header("Location: ../Loginin.php");
    }

    $stmt->close();
    $conn->close();
}
else{
    header("Location: ../Loginin.php");
}

?>