<?php

session_start();




require_once "config.php";




$name = $_SESSION['username'];

if(isset($_POST["username"])){
    $new_name = $_POST["username"];
    $stmt = $link->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->bind_param('s', $new_name); 
    $stmt->execute();
    $result = $stmt->get_result();
    $num = mysqli_num_rows($result);

    if($num>=1){
        $GLOBALS['error'] =  "There is already an account with this username";
        $link->close();

    }

    else{
        $stmt = $link->prepare("UPDATE users SET username =? WHERE username = ?");
        $stmt->bind_param('ss', $new_name, $name);
        $stmt->execute();
        $_SESSION['username'] = $new_name;
        $stmt->close();
    }
}

if(isset($_POST["email"])){
  $mail = $_POST["email"];
 
    $stmt = $link->prepare("UPDATE users SET email =? WHERE username = ?");
        $stmt->bind_param('ss', $mail, $name);
        $stmt->execute();
        $stmt->close();
  
}

if(isset($_POST["password"])){
    $password = $_POST["password"];

        $stmt = $link->prepare("UPDATE users SET password =? WHERE username = ?");
        $stmt->bind_param('ss', $password, $name);
        $password = password_hash($password, PASSWORD_DEFAULT); 
        $stmt->execute();
        $stmt->close();
        $GLOBALS['succ'] = "Your password changed successfully";
    }

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body background="">

     <div align="center">
    <div class="wrapper" style=" margin-top:25px">
        <h2>SIGN UP</h2>
      
      <h3>Edit Your Account</h3>
                <form action="update.php" method="post">
                    <div class="form-group">
                  
                        <label>Change Username</label>
                        <input type="text" name="username" class="form-control" required >
                    </div>
                    <div class="form-group">
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label>Change Email</label>
                            <input type="text" name="email" class="form-control" required >
                        </div>
                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <form action="update.php" method="post">
                            <div class="form-group">
                                <label>Change Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
        </div>
    </div>    
</body>
</html>