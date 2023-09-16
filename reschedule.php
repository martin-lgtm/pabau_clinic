<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reschedule Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/876df7b299.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css" />
</head>
<body class="blue">
<?php
$conn = new mysqli("localhost", "root", "", "pabau_clinic");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $new_start_time = $_POST['new_start_time'];
    $new_end_time = $_POST['new_end_time'];

    $sql = "UPDATE appointments SET start_time='$new_start_time', end_time='$new_end_time', status='rescheduled' WHERE id='$id'";
    $conn->query($sql);

    $conn->close();

    header("Location: view.php");
}
else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM appointments WHERE id='$id'");
    $row = $result->fetch_assoc();
    echo '<div class="container mt-5"';
    echo "<h1>Reschedule Appointment</h1>";
    echo "<form action='reschedule.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "New Start Time: <input type='datetime-local' name='new_start_time' value='" . date('Y-m-d\TH:i', strtotime($row['start_time'])) . "' required><br><br>";
    echo "New End Time: <input type='datetime-local' name='new_end_time' value='" . date('Y-m-d\TH:i', strtotime($row['end_time'])) . "' required><br><br>";
    echo "<input type='submit' value='Reschedule Appointment'>";
    echo "</form>";
    echo "</div>";
}
?>

</body>
</html>