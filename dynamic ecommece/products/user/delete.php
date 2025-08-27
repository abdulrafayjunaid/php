<?php
include "connect.php";

if (isset($_GET['ID'])) {
    $id = intval($_GET['ID']);

    // If confirmation is already given
    if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
        $sql = "DELETE FROM users WHERE id = $id";
        if (mysqli_query($con, $sql)) {
            echo "<script>
                    alert('User deleted successfully!');
                    window.location.href = 'user-home.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error deleting user!');
                    window.location.href = 'user-home.php';
                  </script>";
        }
    } else {
        // Ask for confirmation
        echo "
        <script>
            if (confirm('Are you sure you want to delete this user permanently?')) {
                window.location.href = 'delete.php?ID=$id&confirm=yes';
            } else {
                window.location.href = 'user-home.php';
            }
        </script>
        ";
    }
} else {
    header("Location: user-home.php");
    exit;
}
?>
