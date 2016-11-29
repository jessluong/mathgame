<?php session_start(); ?>
<?php ob_start(); ?>
<?php include("include/header.php");?>

<?php
    // Validate input 
    $error = ""; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valid = 0; 
  
    // Checks if valid email 
      if($_POST["email"] != "a@a.a") {
          $error = "Invalid login credentials.";
      } else {
        $valid++; 
        }

    // Checks if valid password
      if($_POST["password"] != "aaa") {
          $error = "Invalid login credentials.";
      } else {
        $valid++; 
        }
    }

    // Goes to next page once all input is valid 
    if ($valid == 2) {        
        header("Location: index.php");
        exit();
    }
?>

<h1>Please login to enjoy our math game.</h1><br>

<!-- Error message --> 
<div class="error"><?php echo $error;?></div>
    
<div class="container">
    
   
    <form method="post" action="" class="form-horizontal"> 
        
        <!-- Email field  --> 
        <div class="row">
            <div class="form-inline">
                <div class="col-sm-4 col-md-right">
                    <label for="email">Email: </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" placeholder="Email" size="30" name="email">
                </div>
            </div>
        </div>
        
        <!-- Password field  --> 
        <div class="row">
            <div class="form-inline">
                <div class="col-sm-4 col-md-right">
                    <label for="password">Password: </label>
                </div>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="password" placeholder="Password" size="30" name="password">
                </div>
            </div>
        </div> 
        <br>
        
        <!-- Button  --> 
        <div class="row">
            <div class="col-xs-12">
                <div class="text-center">
                    <button type="submit" class="btn btn-info btn-md">Login</button>
                </div>
            </div>
        </div>
        
    </form>
    
</div> 

<?php include("include/footer.php"); ?>