<?php 
session_start();
if(!isset($_SESSION['username']))
{
    echo '<script>alert("Login To Continue ! ")</script>';

    header("Location:index.php");
}
include "header.php";


 ?>
 <style>
     
     </style>
       <div class="container1">
        <div id="game" class="justify-center flex-column">
            <div id="hud">
                <div id="hud-item">
                    <p class="hud-prefix">
                       Question
                    </p>
                    <h1 class="hub-main-text" id="questionCounter"></h1>
                </div>
                <div id="hud-item">
                        <p class="hud-prefix">
                           Score
                        </p>
                        <h1 class="hub-main-text" id="score">
                             0
                        </h1>
                    </div>
            </div>
           <h2 style="" id="question">What is the answer of this question?</h2>
           <div class="choice-container">
               <p div class="choice-prefix">A</p>
               <p div class="choice-text" data-number="1">Choice 1</p>
           </div>
           <div class="choice-container">
                <p div class="choice-prefix">B</p>
                <p div class="choice-text" data-number="2">Choice 2</p>
            </div>
            <div class="choice-container">
                <p div class="choice-prefix">C</p>
                <p div class="choice-text" data-number="3">Choice 3</p>
            </div>
            <div class="choice-container">
                <p div class="choice-prefix">D</p>
                <p div class="choice-text" data-number="4">Choice 4</p>
            </div>   
       </div>
    </div>
        
        <script src="js/game.js" async defer></script>
<?php 
include "footer.php";
?>