<?php ob_start(); ?>
<?php include("include/header.php");?>
<?php session_start(); ?>

<?php
//    function genEquation() {
//        $rand_num1 = rand(0,20); 
//        $rand_num2 = rand(0,20); 
//        // $operators = array('+', '-', '*'); 
//        $_SESSION["rand_num1"] = $rand_num1; 
//        $_SESSION["rand_num2"] = $rand_num2; 
//
//        $computer_ans = ($_SESSION["rand_num1"] + $_SESSION["rand_num2"]); 
//        $_SESSION["computer_ans"] = $computer_ans; 
//    }    
//    function compareAnswer($ans) {
//        if($ans == $_SESSION["computer_ans"]) {
//            $numCorrect++; 
//            $timesPlayed++; 
//            $_SESSION["numCorrect"] = $numCorrect; 
//            $_SESSION["timesPlayed"] = $timesPlayed; 
//        }
//    }
?>

<?php
//    $error = $correct = $score = ""; 
//    $_SESSION["answer"] = $answer; 
//
//    if ($_SERVER["REQUEST_METHOD"] == "POST") {
////        $numCorrect = 0; 
////        $timesPlayed = 0; 
//        
//        if(empty($_POST["answer"]) && !is_numeric($_POST["answer"])) { 
//            $error = "You must enter a number for your answer.";
//            genEquation(); 
//        } else if ($_SESSION["answer"] == $_SESSION["computer_ans"]) {
//            genEquation(); 
//            // compareAnswer($_SESSION["answer"]); 
//            echo "yes"; 
//        }
//
//    }
?>

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
    if(isset($_POST["answer"])) {
        if ($_POST["answer"] == $solution) {
            $correct = "yes"; 
        } else {
            $incorrect = "no"; 
        }
        // unset($_SESSION["solution"]);
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
//    echo($_SESSION["rand_num1"] . "+" . $_SESSION["rand_num2"] . "\n");
//    echo($_SESSION["computer_ans"]); 
//    echo($_POST["answer"]); 
echo $add; 
echo $subtract; 
echo $correct; 
echo $incorrect; 
echo "\n" . $solution; 
?>

<form action="index.php" method="post">
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