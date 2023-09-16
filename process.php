<?php
include './connection.php';
$conn = new mysqli("localhost", "root", "", "pabau_clinic");

$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$service = $_POST['service'];
$special_requirements = $_POST['special_requirements'];
$patient_name = $_POST['patient_name'];
$patient_email = $_POST['patient_email'];

$sql = "INSERT INTO appointments (start_time, end_time, service, status, special_requirements, patient_name, patient_email) VALUES ('$start_time', '$end_time', '$service', 'scheduled', '$special_requirements', '$patient_name', '$patient_email')";

$conn->query($sql);

$conn->close();

header("Location: index.php");
?>
