<?php
session_start();
//include 'Fitnesstracker.php'; 
//$link =mysqli_connect('localhost','immanuella1', 'admin', 'fitness', '3306') 
//define( 'DB_NAME', 'fitness' );
//define( 'DB_USER', 'immanuella1' );
//define( 'DB_PASSWORD', 'admin' );
//define( 'DB_HOST', 'localhost' );

$servername = "localhost";
$username = "immanuella1";
$password = "admin";
$dbname = "fitness";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $bmi = $_POST["bmi"];
    $intensity = $_POST["intensity"];

    echo"$email";

    //INSERT statement created
    
    //$sql = "SELECT * FROM user WHERE username = ? AND email = ? AND password = ?";
    $sql = "INSERT INTO user (username, password, email, age, gender, height, weight, bmi, intensity_pref) VALUES ('username', 'password', 'email', 'age', 'gender', 'height', 'weight', 'bmi', 'intensity_pref')";
    /*$stmt = $conn -> prepare($sql);*/
    
    if ($conn->query($sql) === TRUE) {
        // If the insertion was successful
        echo "New record created successfully";
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: user.php");
    exit;
    }else {
    // If there was an error during insertion
    echo "Error: " . $sql . "<br>" . $conn->error;
    
    //$result = $conn->query($sql);
   /* $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $username, $password, $email, $age, $gender, $height, $weight, $bmi, $intensity);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "$result";*/
    
}
    /*if ($result->num_rows > 0) {
        // User exists, check password
        $user = $result->fetch_assoc();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: user.php");
        exit;
        /*if (password_verify($password, $user['password'])) {
            // Password is correct, start a session and redirect to the homepage
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("Location: user.php");
            exit;
        } else {
            $error_message = "Invalid password.";
        }*/
    /*} else {
        $error_message = "Error creating user.";
    }*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Create User Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
.w3-container h1, .w3-container p {
    font-weight: bold;
}
body {
    background-image: url("background.png");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
</head>
<body>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-white w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="home.html" class="w3-bar-item w3-button w3-padding-large w3-brown">Home</a>
    <a href="info.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-brown">Resources</a>
    <a href="recipes.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-brown">Recipes</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-brown">Login</a>
 </div>

 <!-- Navbar on small screens -->
 <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="home.html" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="info.html" class="w3-bar-item w3-button w3-padding-large">Resources</a>
    <a href="recipes.html" class="w3-bar-item w3-button w3-padding-large">Recipes</a>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
 </div>
</div>

<!-- Create User Form -->
<div class="w3-container w3-center" style="padding:128px 16px">
 <h1 class="w3-margin w3-jumbo">Create User</h1>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="w3-section">
      <label for="username">Username</label>
      <input class="w3-input w3-border" type="text" id="username" name="username" required>
      <label for="email">Email</label>
      <input class="w3-input w3-border" type="email" id="email" name="email" required>
      <label for="password">Password</label>
      <input class="w3-input w3-border" type="password" id="password" name="password" required>
      <label for="age">Age</label>
      <input class="w3-input w3-border" type="text" id="age" name="age" required>
      <label for="gender">Gender</label>
      <input class="w3-input w3-border" type="text" id="gender" name="gender" required>
      <label for="height">Height</label>
      <input class="w3-input w3-border" type="text" id="height" name="height" required>
      <label for="weight">Weight</label>
      <input class="w3-input w3-border" type="text" id="weight" name="weight" required>
      <label for="bmi">BMI</label>
      <input class="w3-input w3-border" type="text" id="bmi" name="bmi" required>
      <label for="intensity">Intensity</label>
      <input class="w3-input w3-border" type="text" id="intensity" name="intensity" required>
      <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" type="submit">Create User</button>
    </div>
 </form>
 <?php
 if (isset($error_message)) {
      echo "<p style='color:red;'>" . $error_message . "</p>";
      echo "<p style='color:red;'>" . $result . "</p>";
 }
 ?>
</div>

<script>
function myFunction() {
 var x = document.getElementById("navDemo");
 if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
 } else { 
    x.className = x.className.replace(" w3-show", "");
 }
}
</script>

</body>
</html>
