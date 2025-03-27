<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Full Name: </label><input type="text" name="full_name" id=""> <br/>
        <label>Username: </label><input type="text" name="username" id=""> <br/>
        <label>Phone: </label><input type="number" name="phone" id=""> <br/>
        <label>Whatsapp Number: </label><input type="number" name="whatsapp_number" id=""> <br/>
        <label>Address: </label><input type="text" name="address" id=""> <br/>
        <label>Password: </label><input type="password" name="password" id=""> <br/>
        <label>Confirm Password: </label><input type="password" name="confirm_password" id=""> <br/>
        <label>E-mail: </label><input type="email" name="email" id=""> <br/>
    </form>
    <?php
    include "../example.php";
    someFunction();
    ?>
</body>
</html>