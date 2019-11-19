<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="particle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
    <meta charset="UTF-8">
    <title>Title</title>

</head>

<body>
    <?php

if(isset($_SESSION["A"])) {
    echo 'hi~'.$_SESSION["A"]."<br>";
}
    
unset($_SESSION["account"]);
unset($_SESSION["shopping"]);
session_destroy();

?>

    <div class=all_input>
        <div id="main">
            <div id="loginBlockHeader">
                <div class="container" style="max-width: 360px;">
                    <div class="row" style="margin: 0 auto;">
                        <div class="col-md-12 col-xs-12" style="text-align: center;border-bottom: 1px solid #dfdfdf;">
                            <span class="t28">
                                <h2> 已經登出 </h2>
                            </span></div>
                            <center>
                            <a href="login_page.php"><h3>重新登入</h3></a>
                            </center>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php
        $head="Location:login_page.php";
        header($head);
    ?>
    <br><br>
    <script type="text/javascript" src="particle.js"></script>
    <script type="text/javascript" src="love.js"></script>
</body>
