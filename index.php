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
            $add = $num1 . "&nbsp&nbsp&nbsp+&nbsp&nbsp&nbsp" . $num2;
            break;
        case 1: 
            $solution = $num1 - $num2; 
            $subtract = $num1 . "&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp" . $num2;         
            break; 
    }
?>

<!-- Validates input and compares it to solution -->
<?php 
if(!isset($_SESSION["numCorrect"])) {
    $_SESSION["numCorrect"] = 0;
}
if(!isset($_SESSION["timesPlayed"])) {
    $_SESSION["timesPlayed"] = 0;
}
    if(empty($_POST["answer"]) || !is_numeric($_POST["answer"])) { 
        $error = "You must enter a number for your answer.";
    } else if(isset($_POST["answer"]) && isset($_POST["solution"])) {
        if ($_POST["answer"] == $_POST["solution"]) {
            $correct = "Correct"; 
           // $numCorrect++; 
            $_SESSION["numCorrect"]++; 
           // $timesPlayed++; 
            $_SESSION["timesPlayed"]++; 
        } else {
            $incorrect = "Incorrect, " . $_POST["num1"] . " + " . $_POST["num2"] . " is " . $_POST["solution"]; 
            $_SESSION["timesPlayed"]++;
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
    <div class="text-right">
       <button type="submit" class="btn btn-success btn-right" name="logout">Logout</button>
    </div>
</form>

<h1>Math Game</h1>

<!-- Print math question -->
<div class="equations"><?php echo $add; echo $subtract; ?></div>

<form action="" method="post">
    <!-- Answer field -->
    <input type="text" class="form-control" id="answer" placeholder="Enter answer" size="20" name="answer">
    <input type="hidden" name="solution" value="<?php echo $solution ?>">
    <input type="hidden" name="num1" value="<?php echo $num1?>">
    <input type="hidden" name="num2" value="<?php echo $num2?>">
    <br>
    <!-- Submit button  -->
    <div class="text-center">
        <button type="submit" class="btn btn-success text-right" name="submit">Submit</button>
    </div>
</form>
<br>

<!-- Error message --> 
<div class="error"><?php echo $error;?></div>
<div class="correct"><?php echo $correct;?></div>
<div class="incorrect"><?php echo $incorrect;?></div>
<div class="score"><?php echo "Score: " . $_SESSION["numCorrect"] . "/" . $_SESSION["timesPlayed"] ?></div>

<?php include("include/footer.php"); ?>