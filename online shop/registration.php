<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie-edge">
<link rel="stylesheet" href="main.css">
<link href="https://fonts.googleapis.com/css2?family=Grandstander:ital,wght@1,100&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js.js"></script>
</head>
<body>
<?php
include "connect.php"
?>
<?php 
//creating uuid
    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);
        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    $uuid = guidv4();
    ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    //validating password
    $pass = test_input($_POST["password"]);
    $number = preg_match('@[0-9]@', $pass);
    $uppercase = preg_match('@[A-Z]@', $pass);
    $lowercase = preg_match('@[a-z]@', $pass);
    $specialChars = preg_match('@[^\w]@', $pass);
    if(strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        echo "<script>alert('Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.')</script>";
    } else {
        //validating email
        $email = test_input($_POST["email"]);
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if (preg_match($pattern, $email) === 1) {
            $sql = "INSERT INTO registration_data(user_id, name, password, email)
            VALUES('$uuid', '$name', '$pass', '$email') ;";
            $result = mysqli_query($conn, $sql);
            echo("<script>location.href='http://localhost/online%20shop/log_in.php';</script>");
        }else{
            echo "<script>alert('Wrong email')</script>";
        }
    }
}else{
};
//testing given data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
    <div id="main">
        <div class="column">
        </div>
        <div class="column_2">
            <div class="block">
            </div>
            <div class="block_2">
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="text">
                <div id="title">
                    Registration
                </div>
                <div id="name_container" >
                    <p class="form_text">name:</p>
                    <input id="name"type="text" name="name" >
                </div>
                <div id="password_container" >
                    <p class="form_text">password:</p>
                    <input id="password"type="password" name="password" >
                </div>
                <div id="e_mail_container" >
                    <p class="form_text">e-mail:</p>
                    <input id="e_mail"type="text" name ="email" >
                </div>
                <div id="buttons">
                    <input type="submit" value="Submit"  id="submit" class="btn">
                    <input type="button" value="Clear"  id="clear" class="btn">
                    <input type="button" class="btn" onclick="location.href='http://localhost/online%20shop/log_in.php';" value="Log in" >
                </div>
            </div>
        </form>
            <div class="block">
              <div id="text"></div>
            </div>
        </div>
        <div class="column">
        </div>
    </div>
</body>
</html>
