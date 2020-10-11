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

$result = $student_id;

// Prepared statement
$stmt = $conn->prepare("INSERT INTO student (student_id, first_name, last_name, DOB, sex, phone) VALUES (?,?,?,?,?,?)");	

if ($stmt) {
    // Bind Parameters
    $stmt->bind_param('sssssi', $student_id, $first_name, $last_name, $DOB, $sex, $phone);
    $stmt->execute();
    if ($stmt->errno) {
		echo "Failed to insert the record. <br>";
		echo "MySQL Error Code    = " . $stmt->errno . "<br>";
		echo "MySQL Error Message = " . $stmt->error . "<br> <br>";
		$result = false;
    }
} else {
    echo "MySQL Error Code    = " . $conn->errno . "<br>";
	echo "MySQL Error Message = " . $conn->error . "<br> <br>";
	$result = false;
}
$conn->close();

if ($result) {
	echo "<br>$result created successfully<br>";
}
else {
	echo "<br>Failed to insert \"" . $student_id . "\"<br>";
}

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
