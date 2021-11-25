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
<?php
include "connect.php"
?>
</head>
<body>
<?php
//checking if there is a record with given data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name2 = test_input($_POST["name2"]);
    $pass2 = test_input($_POST["password2"]);
    $sql="SELECT * FROM registration_data WHERE name='$name2' and password='$pass2'";
    $result = mysqli_query($conn,$sql);
    //Now to check, we use an if() statement
    if (mysqli_num_rows($result) > 0) {
        $direction =1;
   }else {
        $direction =0;
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
<script>
var counter = <?php echo $direction;?>;
if(counter==1){
    location.href='http://localhost/online%20shop/products.php';
}else{
    alert("Wrong data");
};
</script>
   <div id="main">
        <div class="column">
        </div>
        <div class="column_2">
            <div class="block">
            </div>
            <div class="block_2">
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="text">
                <div id="title">
                    Log in
                </div>
                <div id="name_container" >
                    <p class="form_text">name:</p>
                    <input id="name"type="text" name="name2" >
                </div>
                <div id="password_container" >
                    <p class="form_text">password:</p>
                    <input id="password"type="text" name="password2" >
                </div>
                <div id="buttons">
                    <input type="submit" value="Submit" onclick="<?php $count=1;?>"id="submit" class="btn">
                    <input type="button" value="Clear" id="clear" class="btn">
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
