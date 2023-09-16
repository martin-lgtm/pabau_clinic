<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cancel Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/876df7b299.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css" />
</head>
<body class="blue">
    <div class="container mt-5">
<?php
$conn = new mysqli("localhost", "root", "", "pabau_clinic");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "UPDATE appointments SET status='canceled' WHERE id='$id'";
    $conn->query($sql);
    // I'm not deleting the row in DB, just setting the status to cancel.
    $conn->close();

    header("Location: view.php");
}
else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM appointments WHERE id='$id'");
    $row = $result->fetch_assoc();

    echo "<h1>Cancel Appointment</h1>";
    echo "<form action='cancel.php' method='post'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "Are you sure you want to cancel the appointment with " . $row['patient_name'] . " on " . $row['start_time'] . "?<br><br>";
    echo "<input type='submit'  value='Cancel Appointment'>";
    echo "</form>";
}
?>
<a href="./index.php" class="btn btn-success mt-1">Home</a>
</div>
</body>
</html>