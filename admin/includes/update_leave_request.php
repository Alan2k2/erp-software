<?php
include 'db_connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update the leave request status
    $sql = "UPDATE leave_requests SET status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $status, $id);

    if ($stmt->execute()) {
        // Optionally, send a WhatsApp message or notification here
        echo 'Leave request updated successfully';
    } else {
        echo 'Error updating leave request: ' . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>
