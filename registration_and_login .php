<?php 
include("connection.php");
    if( isset( $_POST["submit"] ) ) {

                                // build a function that validates data
                                function validateFormData( $formData ) {
                                    $formData = trim ( stripslashes( htmlspecialchars( $formData ) ) );
                                    return $formData;
                                } 
        //first name validation
                                $fname=$_POST["First_name"];
                                if ( !$_POST["First_name"] ) {
                                    $fnameError = "cannot be empty  <br>";
                                    echo $fnameError;
                                } else {
                                    $fname =validateFormData( $_POST["First_name"] );
                                }
        //last name validation
                                $lname=$_POST["Last_name"];
                                if ( !$_POST["Last_name"] ) {
                                    $lnameError = "cannot be empty  <br>";
                                    echo $lnameError;
                                } else {
                                    $lname =validateFormData( $_POST["Last_name"] );
                                }
        //email validation
                                $email=$_POST["E-mail"];
                                if ( !$_POST["E-mail"] ) {
                                    $emailError = "cannot be empty  <br>";
                                    echo $emailError;
                                } else {
                                    $email =validateFormData( $_POST["E-mail"] );
                                }
        //password validation
                                $pass=$_POST["Password"];
                                if ( !$_POST["Password"] ) {
                                    $passError = "cannot be empty <br>";
                                    echo $passError;
                                } else {
                                    $pass =validateFormData( $_POST["Password"] );
                                }
        //Re entered password validation
                                $repass=$_POST["Confirm_Password"];
                                if ( !$_POST["Confirm_Password"] ) {
                                    $repassError = "cannot be empty <br>";
                                    echo $repassError;
                                } else {
                                    $repass =validateFormData( $_POST["Confirm_Password"] );
                                    if(strcmp($pass,$repass)==0)
                                    {
                                        $rep=$pass;
                                    }
                                    else
                                    {
                                        $repassError="Not valid";
                                        
                                    }
                                }
        //phone number validation
                            $phno=$_POST["Contact_Number"];
                                if ( !$_POST["Contact_Number"] ) {
                                    $phnoError = "Please enter your phone number <br>";
                                    echo $phnoError;
                                } else {
                                    $phno =validateFormData( $_POST["Contact_Number"] );
                                }
        // organisation name validation
                                 $org=$_POST["Organisation_name"];
                                if ( $_POST["Organisation_name"] ) {
                                    $org =validateFormData( $_POST["Organisation_name"] );
                                }   
        if( $fname && lname && $email && $rep && $phno ) {

            $name=$fname.$lname;
            $enpass=md5($rep);
                                    $query = "INSERT INTO `user1` VALUES ('$name','$enpass','$email','$org',$phno)";

                                    if( mysqli_query( $conn,$query ) ) {
                                            $response="YOU ARE SUCCESSFULLY REGISTERED!!";
                                    } else {
                                                echo "Error: ".$query."<br>" .mysqli_error($conn); 
                                    }
    }
    }
$query="CREATE TABLE $name ( id DATETIME NOT NULL , email VARCHAR(30) NOT NULL , title VARCHAR(30) NOT NULL , description TEXT NOT NULL , phone INT NOT NULL , PRIMARY KEY (email))";
$result=mysqli_query($conn,$query);
if($result)
{
    echo "table created";
}
else
{
    echo "table not created";
}
?>

<html>
<head>
   <div>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </div>
    <title>City Updates-homepage</title>
    <h1>
        City  Updates</h1><br>
        <form  id="p" action="cityupdates.php" style="font-size:12px" method="post">
        <label>Username:</label><input type="email" name="username" placeholder="email-id"/>
            <label>Password:</label><input type="password" name="password" placeholder="password"/>
            <input type="submit" name="submit" value="Sign in"><br>   
    </form>
    </head>
    <body>
    <form action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
    <fieldset>
        <legend>Registration</legend>
    <label>First name:</label><input type="text"  name="First_name" placeholder="Enter first name"/>
    <label> Last name:</label><input type="text" name="Last_name" placeholder="Enter last name"/><br>
    <label>Organisation name:</label><input type="text" name="Organisation_name" placeholder="optional"/><br>
    <label>E-mail:</label><input type="email"name="E-mail" placeholder="@email.com"/><br>
    <label>Password:</label><input type="password" name="Password" placeholder="Enter Password"/><br>
    <label>Confirm Password:</label><input type="password" name="Confirm_Password" placeholder="Re-Enter Password" <?php echo $repassError; ?>/><br>
    <label>Contact Number:</label><input type="text" name="Contact_Number" placeholder="Enter Cotact Number"/><br>
    <input type="submit" name="submit" value="Register">
        </fieldset>   
        </form>
        <?php echo $response ; ?>
    </body>
</html>