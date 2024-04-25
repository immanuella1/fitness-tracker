<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if symptoms are selected
    if (isset($_POST["symptoms"])) {
        // Fetch user's information and intensity preference from session
        $age = $_SESSION['age'];
        $gender = $_SESSION['gender'];
        $height = $_SESSION['height'];
        $weight = $_SESSION['weight'];
        $bmi = $_SESSION['bmi'];
        $intensity_pref = $_SESSION['intensity_pref'];

        // Check the selected symptoms
        $symptoms = $_POST["symptoms"];

         // If the user is underweight or overweight and intensity_pref is high, assign 10 random workouts
         if ((in_array("underweight", $symptoms) || in_array("overweight", $symptoms)) && $intensity_pref === 'h') {
          // Your code to assign 10 random workouts from the exercise table
      } 
      // If the user has body pain and intensity_pref is high, assign 7 random stretches
      elseif (in_array("body_pain", $symptoms) && $intensity_pref === 'h') {
          // Your code to assign 7 random stretches
      }
      // If the user is underweight or overweight and intensity_pref is medium, assign 5 random workouts
      elseif ((in_array("underweight", $symptoms) || in_array("overweight", $symptoms)) && $intensity_pref === 'm') {
          // Your code to assign 5 random workouts from the exercise table
      } 
      // If the user has body pain and intensity_pref is medium, assign 3 random stretches
      elseif (in_array("body_pain", $symptoms) && $intensity_pref === 'm') {
          // Your code to assign 3 random stretches
      }
      // If the user is underweight or overweight and intensity_pref is low, assign 3 random workouts
      elseif ((in_array("underweight", $symptoms) || in_array("overweight", $symptoms)) && $intensity_pref === 'l') {
          // Your code to assign 3 random workouts from the exercise table
      } 
      // If the user has body pain and intensity_pref is low, assign 2 random stretches
      elseif (in_array("body_pain", $symptoms) && $intensity_pref === 'l') {
          // Your code to assign 2 random stretches
      }

      // Redirect the user to personalized.php
      header("Location: personalized.php");
      exit;
  }
}
?>

<!-- Add the rest of your HTML code here -->

<!DOCTYPE html>
<html lang="en">
<head>
<title>USER PAGE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
        .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
        .w3-container h1, .w3-container p {
            font-weight: bold;
        }
        body {
            background-color: #f4f4f4;
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            margin-top: 50px;
        }
        .article {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .article img {
            max-width: 100%;
            height: auto;
        }
        .article h3 {
            margin-top: 0;
        }
        .article p {
            margin-bottom: 0;
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
<div class="container">
    <h1 class="section-title">Account</h1>
    <form method="post" action="personalizeduser.php">
    <!-- Add user's information -->
    <div class="article">
    <p>Hi <?php echo $_SESSION['username'];?>!</p>
    <p>Here's your data:</p>
    <p> Age:<?php echo $_SESSION['age']; ?></p>
    <p>Gender: <?php echo $_SESSION['gender']; ?></p>
    <p>Height:<?php echo $_SESSION['height']; ?></p>
    <p>Weight:<?php echo $_SESSION['weight']; ?></p>
    <p>BMI: <?php echo $_SESSION['bmi']; ?></p>
    <p>Intensity preference:<?php echo $_SESSION['intensity_pref']; ?></p>
</div>

    <!-- Add survey questions -->
    <div class="article">
    <h3>Issues</h3>
    <p>What are you experiencing?</p>
    <input type="radio" name="symptoms" value="underweight"> Underweight<br>
    <input type="radio" name="symptoms" value="overweight"> Overweight<br>
    <input type="radio" name="symptoms" value="body_pain"> Body Pain<br>
    <button type="submit">Submit</button>
</div>

</form>

    
</form>



</body>
</html>
