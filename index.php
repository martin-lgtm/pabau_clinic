<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pabau Clinic</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/876df7b299.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css" />
</head>
<body class="blue">
    <?
    include './connection.php';
    ?>
    <div class="container-fluid">
     <div class="col-lg-6">
        <img src="./img/pabau_logo.webp" class="m-4" alt="logo">
    </div>
    </div>
    <div class="container">
    <h1 class="ml-3">Book an Appointment</h1>
    <form action="process.php" method="post">
        <div class="col-md-8">
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="col-md-8">
            <label for="end_time">End Time:</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>
        <div class="col-md-8">
        <label for="service">Service:</label>
        <select class="form-control" id="service" name="service" required>
            <?php

            $conn = new mysqli("localhost", "root", "", "pabau_clinic");
            $result = $conn->query("SELECT * FROM services");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            $conn->close();
            ?>
        </select>
        </div>
        <div class="col-md-8">
        <label for="special_requirements">Special Requirements:</label>
        <textarea id="special_requirements" class="form-control" name="special_requirements"></textarea>
        </div>
        <div class="col-md-8">
        <label for="patient_name">Patient Name:</label>
        <input type="text" class="form-control" id="patient_name" name="patient_name" required>
        </div>
        <div class="col-md-8">
        <label for="patient_email">Patient Email:</label>
        <input type="email" class="form-control" id="patient_email" name="patient_email" required>
        </div>
        <div class="col-md-8">
        <input type="submit" class="btn btn-success mt-3" value="Book Appointment">
        </div>
    </form>
    </div>
</body>
</html>
