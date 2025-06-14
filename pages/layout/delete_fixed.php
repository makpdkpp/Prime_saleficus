<?php
session_start();
include("../../functions.php");
$conn = connectDb();

if (isset($_GET['Industry_id'])) {
    $Industry_id = intval($_GET['Industry_id']); // แปลงให้เป็นตัวเลขเพื่อความปลอดภัย

    // ใช้ prepared statement
    $stmt = $conn->prepare("DELETE FROM industry_group WHERE Industry_id = ?");
    $stmt->bind_param("i", $Industry_id);

    if ($stmt->execute()) {
        header("Location: fixed.php"); // Redirect เมื่อสำเร็จ
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
