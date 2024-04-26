<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if symptoms are selected
    if (isset($_POST["symptoms"])) {
        // Fetch user's information and intensity preference from session
        $age = $_SESSION['age'];
        $gender = $_SESSION['gender'];
        $height = $_SESSION['height'];
        $weight = $_SESSION['weight'];
        $bmi = $_SESSION['bmi'];
        $intensity = $_SESSION['intensity'];

        // Check the selected symptoms
        $symptoms = $_POST["symptoms"];
        $_SESSION['symptoms']=$symptoms;
/*
         // If the user is underweight or overweight and intensity_pref is high, assign 10 random workouts
         if ((in_array("underweight", $symptoms) || in_array("overweight", $symptoms)) && $intensity_pref === 'h') {
          // assign 10 random workouts from the exercise table
      } 
      // If the user has body pain and intensity_pref is high, assign 7 random stretches
      elseif (in_array("body_pain", $symptoms) && $intensity_pref === 'h') {
          // assign 7 random stretches
      }
      // If the user is underweight or overweight and intensity_pref is medium, assign 5 random workouts
      elseif ((in_array("underweight", $symptoms) || in_array("overweight", $symptoms)) && $intensity_pref === 'm') {
          // assign 5 random workouts from the exercise table
      } 
      // If the user has body pain and intensity_pref is medium, assign 3 random stretches
      elseif (in_array("body_pain", $symptoms) && $intensity_pref === 'm') {
          // assign 3 random stretches
      }
      // If the user is underweight or overweight and intensity_pref is low, assign 3 random workouts
      elseif ((in_array("underweight", $symptoms) || in_array("overweight", $symptoms)) && $intensity_pref === 'l') {
          // assign 3 random workouts from the exercise table
      } 
      // If the user has body pain and intensity_pref is low, assign 2 random stretches
      elseif (in_array("body_pain", $symptoms) && $intensity_pref === 'l') {
          // assign 2 random stretches
      }*/

      // Redirect the user to personalized.php
      header("Location: personalizeduser.php");
      exit;
  }
}

?>
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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  
    <!-- Add user's information -->
    <!--$result = mysql_query($query);while ($row = mysql_fetch_array($result)) {echo $row['age']echo $row[]} -->
    <div class="article">
    <p>Hi <?php echo $_SESSION['username'];?>!</p>
    <p>Here's your data:</p>
    <p>Age: <?php echo $_SESSION['age']; ?></p>
    <p>Gender: <?php echo $_SESSION['gender']; ?></p>
    <p>Height:<?php echo $_SESSION['height']; ?></p>
    <p>Weight: <?php echo $_SESSION['weight']; ?></p>
    <p>BMI: <?php echo $_SESSION['bmi']; ?></p>
    <p>Intensity preference: <?php echo $_SESSION['intensity']; ?></p>
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
 <?php

 //Create a delete button on click that button brings up a textbox that will prompt the user to enter their password, once they hit
 //submit on that form, the password that they enter will be verified with the email, (email password combination is found then delete the account)
 //Tw queries: select row where username = session(username) and password = password ($_SESSION['verify_password'])
 //if this returns a row then the user pass combo is found and you can continue to delete the account
 //DELETE FROM user WHERE username = $_SESSION['username'] AND password = $_SESSION['verify_password']
 //go to phpmyadmin adn make sure it is actually deleted
 
$servername = "localhost";
$username = "immanuella1";
$password = "admin";
$dbname = "fitness";

 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
 }

 $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param("ss", $_SESSION['username'], $_SESSION['verify_password']);

// Execute query
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if a row is returned
if ($result->num_rows > 0) {
    // Delete the user account
    $delete_sql = "DELETE FROM user WHERE username = ? AND password = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("ss", $_SESSION['username'], $_SESSION['verify_password']);
    if ($delete_stmt->execute()) {
        // Check if deletion was successful
        if ($delete_stmt->affected_rows > 0) {
            echo "Account deleted successfully.";
        } else {
            echo "Error deleting account.";
        }
    } else {
        echo "Error executing deletion query: " . $delete_stmt->error;
    }
} else {
    echo "Invalid username/password combination.";
}

?>
 
 
</form>

<title>Delete Account</title>
<style>
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 9999;
    }
</style>
</head>
<body>

<div class="article">
    <h3>Delete Account</h3>
    <p>Would you like to delete your account?</p>
    <button id="deleteBtn" type="button">Yes</button>
</div>

<div id="popup" class="popup">
    <h3>Confirm Deletion</h3>
    <p>Please enter your password to confirm deletion:</p>
    <form id="deleteForm" action="user.php" method="post">
    <input id="passwordInput" type="password" placeholder="Enter your password">
    <button id="confirmBtn" type="button">Confirm</button>
    <button id="cancelBtn" type="button">Cancel</button>
</div>

<script>
    // Get references to elements
    const deleteBtn = document.getElementById('deleteBtn');
    const popup = document.getElementById('popup');
    const passwordInput = document.getElementById('passwordInput');
    const confirmBtn = document.getElementById('confirmBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    // Function to show the popup
    function showPopup() {
        popup.style.display = 'block';
    }

    // Function to hide the popup
    function hidePopup() {
        popup.style.display = 'none';
    }

    // Event listener for delete button click
    deleteBtn.addEventListener('click', function() {
        showPopup();
    });

    // Event listener for cancel button click
    cancelBtn.addEventListener('click', function() {
        hidePopup();
    });

    // Event listener for confirm button click
    confirmBtn.addEventListener('click', function() {
        const password = passwordInput.value;
        
        console.log('Password entered:', password);
        
        hidePopup();
    });
</script>


</body>
</html>
