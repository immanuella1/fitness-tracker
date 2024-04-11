<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fitness Progress Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="app">
        <h1>Fitness Progress Tracker</h1>
        <div class="inputs">
            <label for="weight">Weight (in kg):</label>
            <input id="weight" type="number" placeholder="Optional">
            <label for="measurements">Measurements (e.g., chest, waist, hips):</label>
            <input id="measurements" type="text" placeholder="Optional">
            <label for="workout">Workout Duration (in min):</label>
            <input id="workout" type="number" placeholder="Optional">
            <button id="submit">Submit</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight (in kg)</th>
                    <th>Measurements</th>
                    <th>Workout Duration (in min)</th>
                </tr>
            </thead>
            <tbody id="output"></tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
