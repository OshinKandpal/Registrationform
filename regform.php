<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<script>
function Validate(number)
{
  //if(number.value.length > 9 && number.value.length < 11)
  //alert('Valid');
  var val = number.value;
if (/^\d{10}$/.test(val)) {
    if(val>7000000000)
    {}
    else {
      alert("Please enter correct mobile number")
      number.focus();
    }
} else {
    alert("Invalid mobile number")
    number.focus();
    
}
  
}
</script>
</head>
<body>  

<?php

$nameErr = $addressErr = $emailErr = $genderErr = $cityErr = $stateErr = $countryErr = $courseErr = "";
$name = $mobileNo = $email = $gender = $address = $city = $state = $country = $course = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // validation of name checking if name only contains letters and whitespaces
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // validation of email checking if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
   if (empty($_POST["city"])) {
    $cityErr = "city is required";
  } else {
    $city = test_input($_POST["city"]);
  }
  
   if (empty($_POST["state"])) {
    $stateErr = "state is required";
  } else {
    $state = test_input($_POST["state"]);
  }
  
   if (empty($_POST["country"])) {
    $countryErr = "country is required";
  } else {
    $country = test_input($_POST["country"]);
  }
  
   if (empty($_POST["course"])) {
    $courseErr = "course is required";
  } else {
    $course = test_input($_POST["course"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function h($string){
	return htmlspecialchars($string);
}
?>

<p><span class="error">* required field.</span></p>
<form method="post" name="form1" action="n1.php">  
  Name: <input type="text" name="name" required/>
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  MobileNo: <input type="number" name="mobileNo" onchange="Validate(form1.mobileNo)">
  <br><br>
  E-mail: <input type="email" name="email" required>
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  address: <textarea name="address" rows="5" cols="40"></textarea>
  <span class="error"><?php echo $addressErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" required> <?php if (isset($gender) && $gender=="female") echo "checked";?>Female</input>
  <input type="radio" name="gender" required> <?php if (isset($gender) && $gender=="male") echo "checked";?>Male</input>
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  city: <select name="city" value="options" required>
  <option value"index.php">Choose an option</option>
  <option value="Bareilly">Bareilly</option>
  <option value="Noida">Noida</option>
  <option value="Gurugram">Gurugram</option>
  <option value="Sanewadi">Sanewadi</option>
  </SELECT>
  <span class="error">* <?php echo $cityErr;?></span>
  <br><br>
  state: <select name="state" value="options" required>
<option value"index.php">Choose an option</option>
<option value="UttarPradesh">UttarPradesh</option>
<option value="AndhraPradesh">AndhraPradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="NewDelhi">NewDelhi</option>
<option value="MadhyaPradesh">MadhyaPradesh</option>
<option value="Rajasthan">Rajasthan</option>
</SELECT>
  <span class="error">* <?php echo $stateErr;?></span>
  <br><br>
  country: <select name="country" value="options" required>
<option value"index.php" required>Choose an option</option>
<option value="India" required>India</option>
<option value="Nepal" required>Nepal</option>
<option value="USA" required>USA</option>
<option value="China" required>China</option>
<option value="London" required>London</option>
<option value="France" required>France</option>
<option value="Chile" required>Chile</option>
</SELECT>
  <span class="error">* <?php echo $countryErr;?></span>
  <br><br>
  course: <input type="checkbox" name="course" value="BTech" >BTech</input>
  <input type="checkbox" name="course" value="MTech" >MTech</input>
  <input type="checkbox" name="course" value="BSc" >BSc</input>
  <input type="checkbox" name="course" value="MSc" >MSc</input>
  <input type="checkbox" name="course" value="MBA" >MBA</input>
  <span class="error">* <?php echo $courseErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>



<?php
$servername = "localhost";
$username = "username";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
echo "Connected successfully";

/* Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

// to create table
$sql = "CREATE TABLE Form (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name CHAR(30) NOT NULL,
mobileNo int(30),
email VARCHAR(50) NOT NULL,
address VARCHAR(50) NOT NULL,
Gender CHAR(6) NOT NULL,
city CHAR(20) NOT NULL,
state CHAR(30) NOT NULL,
country CHAR(20) NOT NULL,
course CHAR(5) NOT NULL,
)";

*/
?>


</body>
</html>