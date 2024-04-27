<?php
session_start();

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
    $username = $_SESSION["username"];
    $password = $_POST["verify_password"];
    //$email = $_SESSION["email"];

    $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    //$result = mysql_query($query);

    
    if ($result->num_rows > 0) {
        // User exists, check password
        $delete_sql = "DELETE FROM user WHERE username = '$username' AND password = '$password'";
        //$delete_stmt = $conn->prepare($delete_sql);
        //$delete_stmt->bind_param("ss", $_SESSION['username'], $_SESSION['verify_password']);

        if ($conn->query($delete_sql) === TRUE) {
            // If the insertion was successful
            echo "New record created successfully";
            $_SESSION["loggedin"] = false;
                //echo $row['']
              }
            header("Location: home.html");
        exit;
        }else {
        // If there was an error during insertion
        $error_message= "Error: " . $delete_sql . "<br>" . $conn->error;
       
        }}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete User Page</title>
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

<!-- Login Form -->
<div class="w3-container w3-center" style="padding:128px 16px">
 <h1 class="w3-margin w3-jumbo">Delete User</h1>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="w3-section">
      <label for="password">Password</label>
      <input class="w3-input w3-border" type="password" id="verify_password" name="verify_password" required>
      <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top" type="submit">Delete</button>
    </div>
 </form>
 <?php
 if (isset($error_message)) {
      echo "<p style='color:red;'>" . $error_message . "</p>";
 }
 ?>
</div>