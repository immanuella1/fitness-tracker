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
    
    $newWeight = $_POST["weight"];
   
    $_SESSION['weight'] = $newWeight;

    //UPDATE statement created
    $stmt = $conn->prepare("UPDATE user SET weight = ? WHERE username = ?");
    $stmt->bind_param("ds", $newWeight, $username);

    if ($stmt->execute()) {
        echo "Weight updated successfully.";
    } else {
        echo "Error updating weight: " . $stmt->error;
        $error_message = "Update fail.";
    }

    // Close statement and connection
    $stmt->close();
    header("Location: user.php");
    exit;
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
    <h1 class="section-title">Your Personalized Page</h1>

    <?php

    // here we choose the specific queries based on the symptom the user chose on the user page.
        $symptoms = $_SESSION['symptoms'];
        $char = $_SESSION['intensity'];
        $sql = "SELECT name, exercise_type, duration, intensity, muscle_group, weights_required FROM exercise WHERE intensity = $char LIMIT 5";
        $count_sql = "SELECT COUNT(*) as total FROM exercise WHERE intensity = $char";
        if($symptoms === 'underweight'){
            $sql = "SELECT name, exercise_type, duration, intensity, muscle_group, weights_required FROM exercise WHERE exercise_type = 'Workout' AND intensity = '$char' LIMIT 5";
            $count_sql = "SELECT COUNT(*) as total FROM exercise WHERE exercise_type = 'Workout' AND intensity = '$char'";
        }else if($symptoms === 'overweight'){
            $sql = "SELECT name, exercise_type, duration, intensity, muscle_group, weights_required FROM exercise WHERE exercise_type = 'Workout' AND intensity = '$char' LIMIT 5";
            $count_sql = "SELECT COUNT(*) as total FROM exercise WHERE exercise_type = 'Workout' AND intensity = '$char'";
        }else if($symptoms === 'body_pain'){
            $sql = "SELECT name, exercise_type, duration, intensity, muscle_group, weights_required FROM exercise WHERE exercise_type = 'Stretch' LIMIT 5";
            $count_sql = "SELECT COUNT(*) as total FROM exercise WHERE exercise_type = 'Stretch' AND intensity = '$char'";
        }

        $count_result = $conn->query($count_sql);
        //AGGREGATE FUNCTION
        $data =mysqli_fetch_assoc($count_result);
        echo "Total Possible Workouts: " . $data["total"]. "<br>";

        $result = $conn->query($sql);

        //DISPLAY FIVE EXERCISES -- use LIMIT to only tak 5 records
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "Name: " . $row["name"]. " " . $row["lastname"]. "id: " . $row["id"]. "<br>";
            echo "<div class='article'> <h3> " .$row['name']. "</h3><p> Type: " .$row['exercise_type']. " Duration:" .$row['duration']. " Intensity: " .$row['intensity']. "<br> Muscle Group: " .$row['muscle_group']. " Weights Required: " .$row['weights_required']." </p></div>";
        }

        } else {
        echo "0 results";
        }
    ?>
        <p>Would you like to update your weight data?</p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="weight">New Weight:</label>
        <input type="number" id="weight" name="weight" required>
        <input type="submit" value="Update Weight">
    </form>
</div>
<?php
 if (isset($error_message)) {
      echo "<p style='color:red;'>" . $error_message . "</p>";
 }
 ?>



