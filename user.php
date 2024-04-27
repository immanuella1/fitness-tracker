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

      header("Location: personalizeduser.php");
      exit;
  }

  if (isset($_POST["passwordInput"])) {

    $servername = "localhost";
    $username = "immanuella1";
    $password = "admin";
    $dbname = "fitness";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn){
die("Connection failed:".
mysqli_connect_error());
}

    $pass = $_POST["passwordInput"];
    $_SESSION['vpass']=$pass;
    $user = $_SESSION["username"];

    $sql = "DELETE FROM user WHERE username = '$user' AND password = '$pass'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted succesfully";
    }else{
        echo "Error deleting record:".
        mysqli_error($conn);
    }
    mysqli_close($conn);
     
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

<!--  

$servername = "localhost";
$username = "immanuella1";
$password = "admin";
$dbname = "fitness";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn){
    die("Connection failed:".
    mysqli_connect_error());
}

$sql = "DELETE FROM user WHERE username = ? AND password = ?";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted succesfully";
}else{
    echo "Error deleting record:".
    mysqli_error($conn);
}
mysqli_close($conn);

?>-->
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
    <!--<button id="deleteBtn" type="button">Yes</button>-->
    <a href="deleteuser.php"><button id="confirmBtn" type="submit">Confirm</button></a>
</div>

<div id="popup" class="popup">
    <h3>Confirm Deletion</h3>
    <p>Please enter your password to confirm deletion:</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input id="passwordInput" type="password" placeholder="Enter your password">
    <a href="home.html"><button id="confirmBtn" type="submit">Confirm</button></a>
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
