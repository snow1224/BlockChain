<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <title>SF</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="w3-theme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
    <script src="./css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <?php include "post_api.php";?>
    <style>
        /* 輪播的大小 */
  .carousel-inner img {
      width: 500px;
      height: 500px;
  }
  /* 輪播的大小 */
  /* 微課程區塊的框框 */
  .unit-course-block{
      border:1px black solid;
      border-radius:10px;
      height:20%;
      background-color:#25A;
      width: 90%;
/*      opacity: 0.9;*/
  }
  .unit-course-block:hover{
      background-color:#68F;
      cursor: pointer;
   }

  /* 微課程區塊的框框 */
  /* 彈出視窗的美化 */
  .popover-title {
     color: #000;
     font-weight: bold;
     background-color: greenyellow;
     width: 350px;
  }
  .popover-content {
      overflow-y:auto;
      color: #555;
      word-break: break-all;
      height: 300px;
      width: 350px;
      background-color:lightyellow;
      
  }
  /* 彈出視窗的美化 */
   h5{
       word-break: break-all;
       text-align: left;
       font-family:Microsoft JhengHei;
       color: white;
   }  
   h4#main_name{
            color:aquamarine;
            font-family:Microsoft JhengHei;
        }
    h4{
         font-family:Microsoft JhengHei;
    }
    button:active{
          cursor: wait;  
    }
        
</style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').click(function (event){
                $('[data-toggle="popover"]').popover('hide');
                $(this).popover('toggle');
            });
      });
  </script>
</head>

<body>
    <!--初始化  從區塊鏈拿資料-->
    <?php
  
    $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course'; 
    $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
    $main_course = json_decode($main_course_encode, true);
    
    function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data){
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST,"DELETE");
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: 111111111111111111111',
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
    }

?>
    <!--初始化  從區塊鏈拿資料-->
    <!--自動生成換頁-->
    <?php
    function addPage($main_course){
        $main_count = count($main_course);
        $main_index = 0;
        $page_count = 1;
        while($main_count > 0){
            if($page_count == 1){
                echo '<div class="item active">';
            }
            else{
                echo '<div class="item">';
            }
            echo '<div class="w3-row-padding">';
            $card_count=0;
            for($i=$main_index;$i<count($main_course) && $i<$main_index+3;$i++){
                add_new_main_course($i,$main_course);
                $card_count+=1;
            }
            echo '</div>';
            echo '</div>';
            $main_count = $main_count-3;
            $page_count = $page_count+1;
            $main_index = $main_index+$card_count;
        }
        
    }
    function pageCount($main_course){
        $main_count = count($main_course);
        $main_index = 0;
        $page_count = 0;
        $card_count=0;
        while($main_count > 0){
            for($i=$main_index;$i<count($main_course) && $i<$main_index+3;$i++){
                $card_count+=1;
            }
            $main_count = $main_count-3;
            $page_count = $page_count+1;
            $main_index = $main_index+$card_count;
        }
        return $page_count;
    }
?>
    <!--自動生成換頁-->
    <!--自動生成課程區塊-->
    <?php
    function add_new_main_course($index,$main_course){
        
        echo '<div class="w3-third w3-section">';
        echo '<div class="w3-card-4">';
        echo '<div class="w3-container w3-blue" style="height: 500px; overflow: scroll;">';
        echo '<form action="select_course.php" method="post">';
        echo '<center>';
        echo '<h4 id="main_name">'.$main_course[$index]["name"].' ('.$main_course[$index]["pass_hours"].')</h4>';
            $unit_course_url = 'http://120.110.112.152:3000/api/queries/select_unit_course?Main_course=resource%3Aorg.example.empty.Main_course%23'.$main_course[$index]["Main_course_id"];
            $unit_course_encode = callAPI('GET', $unit_course_url, false);    
            $unit_course = json_decode($unit_course_encode, true);
            for($i=0;$i<count($unit_course);$i++){
                add_new_unit_course($i,$unit_course,$index,$main_course);
            }
        echo '</center>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
    }
    function add_new_unit_course($index,$unit_course,$main_course_index,$main_course){
        $teacher_id_arr = explode('#',$unit_course[$index]["teacher"]);
        $classroom_id_arr = explode('#',$unit_course[$index]["classroom"]);
        $teacher_id = $teacher_id_arr[count($teacher_id_arr)-1];
        $classroom_id = $classroom_id_arr[count($classroom_id_arr)-1];
        $teacher_url = 'http://120.110.112.152:3000/api/org.example.empty.teacher/'.$teacher_id;
        $teacher_encode = callAPI('GET', $teacher_url, false);  // 尚未解析成JSON
        $teacher = json_decode($teacher_encode, true);
        $classroom_url = 'http://120.110.112.152:3000/api/org.example.empty.classroom/'.$classroom_id;
        $classroom_encode = callAPI('GET', $classroom_url, false);  // 尚未解析成JSON
        $classroom = json_decode($classroom_encode, true);
        $department_arr = explode('#',$teacher["department"]);
        $department_id = $department_arr[count($department_arr)-1];
        $department_url = 'http://120.110.112.152:3000/api/org.example.empty.department/'.$department_id;
        $department_encode = callAPI('GET', $department_url, false);  // 尚未解析成JSON
        $department = json_decode($department_encode, true);
        echo '<div class="form-group>';
        $color = '';
        //if($index%2==1)
        //    $color = 'style="background-color:#46A;"';  
        echo '<a href="#'.$unit_course[$index]["name"].'"><div id="'.$unit_course[$index]["name"].'" style="text-decoration:none;"><div class="unit-course-block" title="'.$unit_course[$index]["name"].'" data-toggle="popover"  data-placement="bottom" data-html="true" data-content="
                            <h4><b>課程介紹</b></h4><p>'.$unit_course[$index]["introduction"].'</p><br>
                            <h4><b>授課老師</b></h4>
                            <p>
                               姓名：'.$teacher["name"].'<br>
                               系所：'.$department["name"].'<br>
                               學位：'.$teacher["grade"].'<br>
                               職位：'.$teacher["degree"].'<br>
                            </p>
                            <h4><b>上課時間、地點</b></h4>
                            <p>
                               時間：'.$unit_course[$index]["start_time"].' ~ '.$unit_course[$index]["end_time"].'<br>
                               地點：'.$classroom["name"].'<br>
                               時數： '.$unit_course[$index]["hours"].' hour<br>
                            </p>" >';
        $remain = $unit_course[$index]["max_stu"]-$unit_course[$index]["selection_course_people"];
        if($remain<0) 
            $remain=0;
        $remain_color='green';
        if($remain < 4)
            $remain_color='red';
        echo '<span class="w3-badge w3-'.$remain_color.'" style="float:right;display:inline;margin:1% 2px 1% 0;">'.$remain.'</span>';
        echo '<button type="submit" name="like" class="btn btn-warning" value="'.($main_course["$main_course_index"]["Main_course_id"]." ".$unit_course[$index]["unit_course_id"]).'" style="float:right;display:inline;margin:1% 2px 1% 0;">';
        echo '<span class="glyphicon glyphicon-star"></span>';
        echo '</button>';
        echo '<button type="submit" name="add" class="btn btn-success" value="'.($main_course["$main_course_index"]["Main_course_id"]." ".$unit_course[$index]["unit_course_id"]).'"  style="float:right;display:inline;margin:1% 2px 1% 0;">';
        echo '<span class="glyphicon glyphicon-plus"></span>';
        echo '</button>';
        echo '<a href="#'.$unit_course[$index]["name"].'"><h5>'.$unit_course[$index]["name"].' ('.$unit_course[$index]["hours"].')';
        
       
        echo '</h5></a>';
        
        echo '</div></a>';
        echo '</div><br>';
        
    }
?>
    <!--自動生成課程區塊-->

    <!--自動生成購物車上的換頁-->
    <?php
    function add_shopping_tab($main_course_id,$index){
        $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course/'.$main_course_id; 
        $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
        $main_course = json_decode($main_course_encode, true);
        
        if($index==0){
            echo '<li class="acative"><a href="#'.$main_course_id.'" data-toggle="tab" style="background-color:skyblue">'.$main_course['name'].'</a></li>';
        }else{
            echo '<li><a href="#'.$main_course_id.'" data-toggle="tab" style="background-color:skyblue">'.$main_course['name'].'</a></li>';
        }
    }
?>
    <!--自動生成購物車上的換頁-->

    <!--加選購物車項目-->
    <?php  //已添加至post_api，沒有錯誤沒有警告 2019/03/06 ?>
    <!--加選-->
    <!-- Indicators -->

    <!-- 這是新增圖片的選單__開始~~~~~~~~~~~~~~~~~~~~~~!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!~~~~~~~~~-->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <div class="navbar-header">

            <a class="navbar-brand" href="index.php">
                <img src="logo_v5.2(已去底).jpg" class="img-rounded" width="30" height="30" class="d-inline-block align-top" alt="" style="position: absolute;width:45px;height:40px;float:left;background-color:rgb(250,243,255);top:6px;">
                <span class="h3 mx-1" style="position: absolute;float:left;top:0px;left:65px;margin-bottom:2%;margin-top: 1%;">微學分選課系統</span>
            </a>

            <!--            <a href="v1.5_tr_input_score.php">-->
            <!--            <a class="navbar-brand" href="#" style="position: absolute;float:left;"> <img src="logo_v5.2(已去底).jpg" class="img-rounded" style="position: absolute;width:45px;height:40px;float:left;background-color:rgb(250,243,255);top:6px;">  微學分選課系統</a>-->
        </div>
        <ul class="nav navbar-nav navbar-right">

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
    </div>
</nav>
<!-- 這是新增圖片的選單__結束~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <div class="container" style="width:100%;">
       <center>
        <span class="w3-badge w3-green">?</span><span class="w3-badge w3-red">?</span>剩餘人數，紅色表示小於4
      </center>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <?php 
                    $pageIndex = pageCount($main_course);
                    for($i=0;$i<$pageIndex;$i++){
                        if($i==0){
                            echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
                        }
                        else{
                            echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
                        }
                    }
                ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" style="height:80%;">
                <?php addPage($main_course); ?>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="top:1500;width:50px">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next" style="top:1500;width:50px ">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    
    <br>
    <!--/////////////shopping-cart///////////////-->
    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal" style="text-align:right;   
                                                    position:fixed;
                                                    right: 0%;
                                                    bottom: 0%;
                                                    margin-bottom:5px;
                                                    margin-right:5px;"><span class="glyphicon glyphicon-shopping-cart"></span></button>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="w3-row-padding">
            <div class="w3-third w3-section" style="text-align:right;   
                                                    position:fixed;
                                                    right: 0%;
                                                    bottom: 0%;
                                                    margin-bottom:5px;
                                                    margin-right:5px;">
                <!-- 將購物車放在右下角，注意字也會向右靠 -->
                <ul class="nav nav-tabs">

                    <?php 
                            $session_index=0;
                            foreach($_SESSION as $key0 => $value0){
                                if($key0!="member" && $key0!="login" && $key0!="like" && $key0!="course"){
                                    add_shopping_tab($key0,$session_index);
                                    $session_index++;
                                }
                            }
                        ?>

                </ul>
                <div class="w3-container w3-pale-blue" style="height: 250px; overflow:auto; overflow-x: hidden;">

                    <br>

                    <div class="tab-content">
                        <?php   
                       $key_index=0;
                       
                       foreach($_SESSION as $key0 => $value0){
                             if($key0!="member" && $key0!="like" && $key0!="login" && $key0!="course"){
                                 if($key_index==0)
                                    echo '<div id="'.$key0.'" class="tab-pane fade in active">';
                                 else
                                     echo '<div id="'.$key0.'" class="tab-pane fade">';
                                  foreach ($_SESSION[$key0] as $key => $value){
                                      echo '<form action="select_course.php" method="post">';
                                      echo '<center>';
                                      echo '<div class="form-group">';     
                                      echo '<a href="'.$key0.'"><div id="'.$key0.'" class="unit-course-block">';
                                       echo '<button type="submit" name="like" class="btn btn-warning" value="'.$key0.
                                      " ".$_SESSION[$key0][$key]["id"].'" style="float:right;display:inline;margin:1% 2px 1% 0;">';
                                      echo '<span class="glyphicon glyphicon-star"></span>';
                                      echo '</button>';
                                      echo '<button type="submit" name="del_unit_course" class="btn btn-danger" value="'.$key0.
                                      " ".$_SESSION[$key0][$key]["id"].'"  style="float:right;display:inline;margin:1% 2px 0 0;">';
                                      echo '<span class="glyphicon glyphicon-minus"></span>';
                                      echo '</button>';
                                      echo '<h5>'.$_SESSION[$key0][$key]["name"];  
                                      echo '</h5>';
                                      echo '</div></a>';   
                                      echo '</div>';      
                                      echo '</center>';  
                                      echo '</form>';
                                  }
                              reset($_SESSION[$key0]);
                              echo '</div>';
                                 $key_index++;
                              }
                          }
                          reset($_SESSION);
                    ?>

                    </div>
                    <br>
                    <center>
                        <form action="select_course.php" method="post">
                            <button type="submit" name="select_course" class="btn btn-info">
                                <h5>選課</h5>
                            </button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
    <!--/////////////shopping-cart///////////////-->


    <div class="w3-theme-l3">
        <center>
            <p class="w3-large">Providence University</p>
        </center>
    </div>

</body>

</html>
