<?php
include("connection.php");

    if(isset($_POST["username"], $_POST["password"])) 
        {     
          $email = $_POST["username"]; 
        $password = $_POST["password"]; 
//echo $password;
        $password=md5($password);
        $result1 ="SELECT email , password FROM user1 WHERE email= '$email' AND password='$password'";
        //echo $result1;
        $result2 = mysqli_query($conn,$result1);
        if(mysqli_num_rows($result2) > 0 )
        { 
            $_SESSION["logged_in"] = true; 
            $_SESSION["username"] = $email;
            echo $_SESSION["logged_in"];
            echo $_SESSION["username"];
            echo "success";
        }
        else
        {
            echo 'The username or password are incorrect!';
        }
}
?>