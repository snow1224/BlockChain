<?php
    session_start();
    include "callAPI.php";
?>
<!--自動生成課程區塊-->
<?php
    function add_new_main_course($main_course){
        for($index=0;$index<3;$index++){
            echo '<div class="box">';
            echo '<a class="image fit"><img src="images/pic0'.($index+1).'.jpg" alt="" /></a>';
            echo '<div class="inner">';
            echo '<h3 style="color:white">'.$main_course[$index]["name"].'</h3>';
            echo '<p style="color:white">'.$main_course[$index]["name"].'微課程資訊請點選查看</p>';
            echo '<button type="button" class="button style1 fit" data-toggle="modal" data-target="#'.$main_course[$index]["Main_course_id"].'">查看</button>';
            echo '<!-- Modal -->';
            echo '<div class="modal fade" id="'.$main_course[$index]["Main_course_id"].'" tabindex="-1" role="dialog" aria-labelledby="'.$main_course[$index]["Main_course_id"].'" aria-hidden="true">';
            add_new_unit_course($main_course,$index);
            
            echo '</div>';
            echo '</div>';
            echo '</div>';    
        }
    }
    function add_new_unit_course($main_course,$index){
        $unit_course_url = 'http://120.110.112.152:3000/api/queries/select_unit_course?Main_course=resource%3Aorg.example.empty.Main_course%23'.$main_course[$index]["Main_course_id"];
        $unit_course_encode = callAPI('GET', $unit_course_url, false);    
        $unit_course = json_decode($unit_course_encode, true);
        echo '<div class="modal-dialog" role="document">';
        echo '<div class="modal-content">';
        echo '<div class="modal-header">';
        echo '<h5 class="modal-title" id="'.$main_course[$index]["Main_course_id"].'">'.$main_course[$index]["name"].'</h5>';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        echo '<div class="modal-body">';
        for($i=0;$i<count($unit_course);$i++){
            $teacher_id_arr = explode('#',$unit_course[$i]["teacher"]);
            $teacher_id = $teacher_id_arr[count($teacher_id_arr)-1];
            $teacher_url = 'http://120.110.112.152:3000/api/org.example.empty.teacher/'.$teacher_id;
            $teacher_encode = callAPI('GET', $teacher_url, false);  // 尚未解析成JSON
            $teacher = json_decode($teacher_encode, true);
            $classroom_id_arr = explode('#',$unit_course[$i]["classroom"]);
            $classroom_id = $classroom_id_arr[count($classroom_id_arr)-1];
            $classroom_url = 'http://120.110.112.152:3000/api/org.example.empty.classroom/'.$classroom_id;
            $classroom_encode = callAPI('GET', $classroom_url, false);  // 尚未解析成JSON
            $classroom = json_decode($classroom_encode, true);
            
            echo '<div class="card">';
            echo '<div class="card-header">'.$unit_course[$i]["name"];
            echo '</div>';
            echo '<div class="card-body">';
            echo '<p style="text-align: left;">微課程介紹：'.$unit_course[$i]["introduction"].'</p>';
            echo '<p style="text-align: left;">開課老師：'.$teacher["name"].'</p>';
            echo '<p style="text-align: left;">開課時間： 週'.$unit_course[$i]["weeks"].' '.$unit_course[$i]["start_time"].' - '.$unit_course[$i]["end_time"].'</p>';
            echo '<p style="text-align: left;">開課地點：'.$classroom["name"].'</p>';
            echo '<p style="text-align: left;">人數缺額：'.($unit_course[$i]["max_stu"]-$unit_course[$i]["selection_course_people"]).'</p>';
            echo '</div>';
            echo '</div>';
        }
                                            
        echo '</div>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
  ?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <title>區塊鏈微學分系統</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <link href="css/layout.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-xlarge.css" />
    </noscript>

</head>

<body>
    <div class="landing">
        <header id="header">
            <h1><a href="index.php">區塊鏈微學分系統</a></h1>
            <nav id="nav">
                <ul>
                    <?php
            if(isset($_SESSION["login"]) && $_SESSION["login"]==1){
//                登入學生區
                echo '<li><a href="./mylike.php"><span class="glyphicon glyphicon-star"></span> 我的最愛</a></li>';
                echo '<li><a href="./select_course.php"><span class="glyphicon glyphicon-shopping-cart"></span> 選課</a></li>';
                echo "<li><a href=\"./stu.php\"><span class=\"glyphicon glyphicon-user\"></span> 學生專區</a></li>";
                echo '<li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
            }
            else if(isset($_SESSION["login"]) && $_SESSION["login"]==2){
//                登入老師區
                echo '<li><a href="v1.5_tr_input_score.php"><span class="glyphicon glyphicon-star"></span> 評分</a></li>';
                echo '<li><a href="./v1.6_tr_open_course.php"><span class="glyphicon glyphicon-shopping-cart"> 開課申請</a></li>';
                echo '<li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
            }else{
//                還沒登入
                echo '<li><a href="./index.php"><span class="glyphicon glyphicon-shopping-cart"></span> 首頁</a></li>';
                echo "<li><a href=\"./login_page.php\"><span class=\"glyphicon glyphicon-user\"></span> Login</a></li>";
            }
            ?>
                </ul>
            </nav>
        </header>
        <!-- Banner -->
        <section id="banner">
            <p>可以點選選課、登入，或是下方查看有哪些最新課程</p>
        </section>

        <!-- Main -->
        <div id="main">
            <div class="inner">
                <h2>最新課程</h2>
                <!-- Boxes -->
                <div class="thumbnails">
                    <?php
                        $index=1;
                        $all_main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course';
                        $all_main_course_encode = callAPI('GET', $all_main_course_url, false);    
                        $all_main_course_record = json_decode($all_main_course_encode, true);
                        add_new_main_course($all_main_course_record);
                    ?>
                </div>

            </div>
        </div>


        <section id="two" class="wrapper style2 special">
            <div class="container">
                <header class="major">
                    <p>學生資訊</p>
                </header>
                <section class="profiles">
                    <div class="row">
                        <section class="3u 6u(medium) 12u$(xsmall) profile">
                            <img src="images/410516594_cat.jpg" alt="" />
                            <h4>王雪朱</h4>
                            <p>資工四B</p>
                            <br>
                            <p>mail: juliy0214561@gmail.com</p>
                            <p>座右銘： 我家的貓真可愛！</p>
                        </section>
                        <section class="3u 6u$(medium) 12u$(xsmall) profile">
                            <img src="images/410528321_cat.jpg" alt="" />
                            <h4>陳菀渝</h4>
                            <p>資工四B</p>
                            <br>
                            <p>mail: s1052832@pu.edu.tw</p>
                            <p>座右銘： 人生三大要事，吸貓吸貓再吸貓！</p>
                        </section>

                    </div>
                </section>

            </div>
        </section>

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="8u 12u$(medium)">
                        <ul class="copyright">
                            <li>&copy; Untitled. All rights reserved.</li>
                            <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
                            <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    </div>


    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/rwdTable.js"></script>
    <script type="text/javascript" src="js/jquery.jscroll.js"></script>
    <script type="text/javascript" src="js/effect.js"></script>
    <script type="text/javascript" src="js/slide.js"></script>

</body>

</html>
