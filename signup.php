<?php

require_once "config.php";
 

$username = $password = $confirm_password = $email = $dept ="";
$username_err = $password_err = $confirm_password_err =$email_err = $dept_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
     
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
        
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
    
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
    
        mysqli_stmt_close($stmt);
    }

      if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a mail.";
    } else{
      
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
        
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);
            
            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
     
        mysqli_stmt_close($stmt);
    }

       if(empty(trim($_POST["dept"]))){
        $dept_err = "Please enter a department.";
    } else{
       
        $sql = "SELECT id FROM users WHERE dept = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
          
            mysqli_stmt_bind_param($stmt, "s", $param_dept);
            
        
            $param_dept = trim($_POST["dept"]);
            
        
            if(mysqli_stmt_execute($stmt)){
         
                mysqli_stmt_store_result($stmt);
                
              
                    $dept = trim($_POST["dept"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }



    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
 
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    

    if(empty($username_err) && empty($password_err) && empty($email_err) && empty($confirm_password_err)){
        
    
        $sql = "INSERT INTO users (username, password, email, dept) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
         
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_password, $param_email, $param_dept);
            
         
            $param_username = $username;
            $param_email= $email;
            $param_dept= $dept;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
      
            if(mysqli_stmt_execute($stmt)){
              
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
       
        mysqli_stmt_close($stmt);
    }
  
    mysqli_close($link);
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
      
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>" style=" margin-top:25px">
                <label>Username</label>

                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" >

                <span class="help-block"><?php echo $username_err; ?></span>
            </div> 

             <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>" style=" margin-top:25px">
                <label>Email</label>

                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div> 

             <div class="form-group <?php echo (!empty($dept_err)) ? 'has-error' : ''; ?>" style=" margin-top:25px">
                <label>Department</label>
                <input  type="text" name="dept" class="form-control" value="<?php echo $dept; ?>">
                <span class="help-block"><?php echo $dept_err; ?></span>
            </div> 
          

            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" style=" margin-top:25px">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>" style=" margin-top:25px">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="SUBMIT">
                <a href="index.php" class="btn btn-primary">GO BACK</a>
                
            </div>
           
        </form>
        </div>
    </div>    
</body>
</html>