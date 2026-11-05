<?php

$servername = "avl.cs.unca.edu";
$username = "awilli43";
$password = "RegulatorGorgeous";
$database = "csci338fal26";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<h1>Exam 3 - Students Database</h1>";

$sql = "CREATE TABLE IF NOT EXISTS autumnw_exam3_Students (
    StudentID INT PRIMARY KEY,
    LastName VARCHAR(50),
    FirstName VARCHAR(50),
    Level VARCHAR(20)
)";

if ($conn->query($sql) === TRUE) {
    echo "<p>Table created successfully.</p>";
}


$sql = "INSERT IGNORE INTO autumnw_exam3_Students
        (StudentID, LastName, FirstName, Level)
        VALUES
        (1001, 'Doe', 'Jane', 'Sophomore'),
        (1002, 'Cat', 'Tom', 'Freshman'),
        (1003, 'Potter', 'Harry', 'Junior'),
        (1004, 'Mouse', 'Mickey', 'Freshman')";

if ($conn->query($sql) === TRUE) {
    echo "<p>Student records inserted successfully.</p>";
}

echo "<h2>Table Structure</h2>";

$result = $conn->query("DESCRIBE autumnw_exam3_Students");

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Field</th><th>Type</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['Field']) . "</td>";
    echo "<td>" . htmlspecialchars($row['Type']) . "</td>";
    echo "</tr>";
}

echo "</table>";

function displayResults($conn, $sql) {

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>Student ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Level</th>
              </tr>";

        while ($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['StudentID']) . "</td>";
            echo "<td>" . htmlspecialchars($row['LastName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['FirstName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Level']) . "</td>";
            echo "</tr>";

        }

        echo "</table>";

    } else {
        echo "<p>No records found.</p>";
    }
}

echo "<h2>All Student Records</h2>";

displayResults($conn,
    "SELECT * FROM autumnw_exam3_Students"
);

echo "<h2>Students With Last Name Doe</h2>";

displayResults($conn,
    "SELECT * FROM autumnw_exam3_Students
     WHERE LastName = 'Doe'"
);

echo "<h2>Freshman Named Mickey</h2>";

displayResults($conn,
    "SELECT * FROM autumnw_exam3_Students
     WHERE Level = 'Freshman'
     AND FirstName = 'Mickey'"
);

echo "<h2>Students Sorted By Last Name</h2>";

displayResults($conn,
    "SELECT * FROM autumnw_exam3_Students
     ORDER BY LastName ASC"
);

echo "<h2>All Records</h2>";

displayResults($conn,
    "SELECT * FROM autumnw_exam3_Students"
);

$conn->close();

?>