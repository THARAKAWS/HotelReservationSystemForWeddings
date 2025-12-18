<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/HotelReservationSystemforWeddings/configurations/config.php';

$user_id = $_SESSION['user_id'];
$errorMessage = $successMessage = "";


$query = "SELECT * FROM users WHERE userID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userEmail = $_POST['user-email'];
    $userName = $_POST['user-name'];

    $updateQuery = "UPDATE users SET userEmail = ?, userName = ? WHERE userID = ?";
    $updateStmt = $connection->prepare($updateQuery);
    $updateStmt->bind_param("ssi", $userEmail, $userName, $user_id);

    if ($updateStmt->execute()) {
        $successMessage = "Account updated successfully!";
    } else {
        $errorMessage = "Failed to update account: " . $updateStmt->error;
    }

    $updateStmt->close();
}

$stmt->close();
?>

<h2>Update Account</h2>

<?php
if (!empty($errorMessage)) {
    echo "<div class='alert alert-danger'>$errorMessage</div>";
}
if (!empty($successMessage)) {
    echo "<div class='alert alert-success'>$successMessage</div>";
}
?>

<form method="POST" action="">
    <label for="user-email">Email:</label>
    <input type="email" id="user-email" name="user-email" value="<?php echo $userData['userEmail']; ?>" required>

    <label for="user-name">Name:</label>
    <input type="text" id="user-name" name="user-name" value="<?php echo $userData['userName']; ?>" required>

    <button type="submit">Update Account</button>
</form>
