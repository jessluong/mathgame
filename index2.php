<?php ob_start(); ?>
<?php include("include/header.php");?>
<?php session_start(); ?>

<!-- Create random math problem --> 
<?php 
$num1 = rand(0,20);
$num2 = rand(0,20);

switch(rand(0,1)) {
    case 0: 
        $solution = $num1 + $num2; 
        $add = $num1 . "+" . $num2;
        break;
    case 1: 
        $solution = $num1 - $num2; 
        $subtract = $num1 . "-" . $num2;         
        break; 
}
?>

<!-- Compare user input to solution -->
<?php 
    if(isset($_POST["answer"]) && isset($_POST["solution"])) {
        if ($_POST["answer"] == $_POST_["solution"]) {
            $correct = "yes"; 
        } else {
            $incorrect = "no"; 
        }
    }
?>

<!-- Link for logout button --> 
<?php
    if(isset($_GET["logout"])){
        header("Location: login.php");
        session_unset();
        session_destroy(); 
        die();
    }
?>
<!-- Create logout button -->
<br>
<form action="" method="get">
    <button type="submit" class="btn btn-success btn-md" name="logout">Logout</button>
</form>

<h1>Math Game</h1>

<!-- Print math question -->
<?php
echo $add; 
echo $subtract; 
echo $correct; 
echo $incorrect; 
echo "\n" . $solution; 
?>

<form action="" method="post">
    <!-- Answer field -->
    <input type="text" class="form-control" id="answer" placeholder="Enter answer" size="20" name="answer">
    <!-- Submit button  --> 
    <input type="hidden" name="solution" value="<?php echo $solution ?>">
    <button type="submit" class="btn btn-success btn-md" name="submit">Submit</button>
</form>

<!-- Error message --> 
<span class="error"><?php echo $error;?></span>
<span class="correct"><?php echo $correct;?></span>
<br>
<?php echo "Score: " . $numCorrect . "/" . $timesPlayed ?>


<?php include("include/footer.php"); ?>