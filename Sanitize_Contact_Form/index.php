<?php

function sanitizeInput($data){
    $data = trim($data);
    $data - stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

$sanitized_name = $sanitized_email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $sanitized_name = sanitizedInput($_POST['name']);
   $sanitized_email = sanitizedInput($_POST['email']);
   $sanitized_contact = sanitizedInput($_POST['contact']);
   $sanitized_message = sanitizedInput($_POST['message']);
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
      margin: none;
    }
    .container {
        border: solid black 2px;
        text-align: left;
        padding: 30px;
        background-color: #ffb6c1; 
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(139, 108, 108, 0.2);
        width: 18%;
        height: 40vh;
        justify-content: center;
        display: flex;
        justify-content: center;
        align-items: center;
        
        
    }
    button{
        padding: 10px 15px;
        border-radius: 10px;
        background-color: yellow;
        border: none;
        cursor: pointer;
        font-size: 15px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        margin-bottom: 8px;
    }
    input[type=text]{
        margin-bottom: 10px;
        font-size: 20px;
    }
    input[type=email]{
        margin-bottom: 10px;
        font-size: 20px;
    }
    input[type=contact]{
        margin-bottom: 10px;
        font-size: 20px;
    }
    input[type=message]{
        margin-bottom: 10px;
        font-size: 20px;
    }
    #submit:hover {
        background-color: pink;
        transform: scale(2.2);
    }
    @media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
}

</style>
<body>
    <div class="container">
        <form method="POST" action= ""><br>
            <label for = "name"> Name: </label><br>
            <input type="text" name="name" id="name" required><br>
            <label for ="email"> Email: </label><br>
            <input type="email" name="email" id="email" required><br>
            <label for ="contact"> Contact No.:</label><br>
            <input type="contact" name="contact" id="contact" required><br>
            <label for ="message"> Message: </label><br>
            <input type="message" name="message" id="message" required><br>
            <button class="submit" type= "submit">SUBMIT</button>
        </form>
    </div>
    <?php if (!empty($sanitized_name) && !empty($sanitized_email)); ?>

        <div class="output">
            <h3> Sanitized Output: </h3>

            <p>Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Contact: <?php echo htmlspecialchars($sanitized_contact, ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Message: <?php echo htmlspecialchars($sanitized_message, ENT_QUOTES, 'UTF-8'); ?></p>
        
        </div>
    <?php endif; ?>
</body>
</html>

