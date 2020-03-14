<?php 

    if(isset($_POST['submit'])) {
        $password = $_POST['password'];
        $regex ="/\A(?=\w{6,10}\z)(?=[^a-z]*[a-z])(?=(?:[^A-Z]*[A-Z]){3})(?=\D*\d).*/";
        
        if(!preg_match($regex,$password))
            echo "You have  entered invalid password format";
    }
?>

<html>
    <head>
        <title>Password Validation</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="password" name="password">
            <input type="submit" name="submit" value="SUBMIT">
        </form>
    </body>
</html>