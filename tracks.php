<?php
session_start();

require_once 'Fitnesstracker.php';

function updateWorkout($userId, $workoutType, $duration, $caloriesBurned) {
    global $connection; 
    // Prepare the SQL statement
    $stmt = $connection->prepare("UPDATE tracking SET workout_type = ?, exercise_complete = ?, date = ? WHERE user_id = ?");

    // Bind the parameters
    $stmt->bind_param("siss", $workoutType, $duration, $caloriesBurned, $userId);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Workout updated successfully.";
    } else {
        echo "Error updating workout: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Example usage
if (isset($_POST["updateWorkout"])) {
    $userId = $_POST["userId"];
    $workoutType = $_POST["workoutType"];
    $duration = $_POST["duration"];
    $caloriesBurned = $_POST["caloriesBurned"];

    updateWorkout($userId, $workoutType, $duration, $caloriesBurned);
}
?>
