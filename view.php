<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Appointments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/876df7b299.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css" />
</head>
<body class="blue">
    <div class="container mt-5">
    <h1>View Appointments</h1>
    <table border="1">
        <tr>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Service</th>
            <th>Status</th>
            <th>Patient Name</th>
            <th>Patient Email</th>
            <th>Actions</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "pabau_clinic");
        $result = $conn->query("SELECT * FROM appointments");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['start_time'] . "</td>";
            echo "<td>" . $row['end_time'] . "</td>";
            echo "<td>" . $row['service'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['patient_name'] . "</td>";
            echo "<td>" . $row['patient_email'] . "</td>";
            echo "<td><a href='reschedule.php?id=" . $row['id'] . "'>Reschedule</a> | <a href='cancel.php?id=" . $row['id'] . "'>Cancel</a></td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
<a href="./index.php" class="btn btn-success mt-1">Home</a>

    </div>
</body>
</html>
