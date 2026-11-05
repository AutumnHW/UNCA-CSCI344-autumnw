<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $feedback = htmlspecialchars($_POST["feedback"]);

    echo "<h2>Thank You for Your Feedback!</h2>";

    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Your Feedback:</strong></p>";
    echo "<p>$feedback</p>";
} else {
    echo "Please submit the feedback form.";
}

?>