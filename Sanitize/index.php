<?php

function sanitizeInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$sanitized_name = $sanitized_email = $sanitized_contact = $sanitized_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $sanitized_name = sanitizeInput($_POST['name']);
   $sanitized_email = sanitizeInput($_POST['email']);
   $sanitized_contact = sanitizeInput($_POST['contact']);
   $sanitized_message = sanitizeInput($_POST['message']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   body {
        padding: 20px;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f5f5f5;
    }

    .container, .output {
        border: solid black 2px;
        text-align: left;
        padding: 30px;
        background-color: #ffb6c1;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(139, 108, 108, 0.2);
        width: 350px; 
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        margin-bottom: 20px;
        overflow-x: hidden;
    }

    form {
        width: 100%;
    }

    label {
        font-size: 16px;
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"], 
    input[type="email"] {
        width: 90%;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 15px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
    input[type="message"] {
        height: 20%;
        width: 95%;
        border-radius: 6px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    button {
        padding: 10px 15px;
        border-radius: 10px;
        background-color: yellow;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        width: 95%;
    }

    button:hover {
        background-color: pink;
        transform: scale(1.05);
    }

    .output h3 {
        text-align: center;
    }

    .output p {
        font-size: 16px;
        font-weight: bold;
    }

</style>
<body>
    <div class="container">
        <form method="POST" action="">
            <br>
            <label for="name"> Name: </label><br>
            <input type="text" name="name" id="name" required><br>

            <label for="email"> Email: </label><br>
            <input type="email" name="email" id="email" required><br>

            <label for="contact"> Contact No.:</label><br>
            <input type="text" name="contact" id="contact" required><br>

            <label for="message"> Message: </label><br>
            <input type="message" name="message" id="message" required><br>

            <button id="submit" type="submit">SUBMIT</button>
        </form>
    </div>

    <?php if (!empty($sanitized_name) && !empty($sanitized_email)): ?>
        <div class="output">
            <h3>Sanitized Output:</h3>
            <p>Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Contact: <?php echo htmlspecialchars($sanitized_contact, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Message: <?php echo htmlspecialchars($sanitized_message, ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
