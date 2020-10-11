<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "seedubuntu";
$dbname = "assignment2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully <br> <br>"; 
  

// Insert a new Student record  
$student_id = $_POST['input1'];
$first_name = $_POST['input2'];
$last_name = $_POST['input3'];
$DOB = $_POST['input4'];
$sex = $_POST['input5'];
$phone = $_POST['input6'];

$sql = "INSERT INTO student (student_id, first_name, last_name, DOB, sex, phone) VALUES ('$student_id', '$first_name', '$last_name', '$DOB', '$sex', '$phone')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  
$conn->close();
?><br><br>
 
Input 1  <?php echo $_POST["input1"]; ?><br>
Input 2  <?php echo $_POST["input2"]; ?><br>
Input 3  <?php echo $_POST["input3"]; ?><br>
Input 4  <?php echo $_POST["input4"]; ?><br>
Input 5  <?php echo $_POST["input5"]; ?><br>
Input 6  <?php echo $_POST["input6"]; ?>

  <p>
  <a href="/index.html">Return to the form</a>
  </p>
</body>
</html>