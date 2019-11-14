<?php
    session_start();
?>
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
  <style>
      #stu_course{
          cursor: pointer;
      }
  </style>
  <?php 
    include "callAPI.php";
    include "post_api.php"; 
        
    ?>
</head>

<?php //初始化變數 
    $student_url = 'http://120.110.112.152:3000/api/org.example.empty.student/'.$_SESSION["member"]["stu"]["account"]; 
    $student_encode = callAPI('GET', $student_url, false);  // 尚未解析成JSON
    $student = json_decode($student_encode, true);
    $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course'; 
    $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
    $main_course = json_decode($main_course_encode, true);
    for($i=0;$i<count($student["main_course_record"]);$i++){
        $avg_score[$student["main_course_record"][$i]]=-1;  //計算成績用，還沒按結算學分前，預設為-1
        $hours[$student["main_course_record"][$i]]=0;  //計算總時數，用來判斷區塊顏色
    }
    if(count($student["main_course_record"])==0){
        $avg_score=-1;
        $hours=-1;
    }
      //初始化變數 ?>

<?php //自動生成學期tab 
    function semester_tab($student){
        $year=$student["academic_year"];
        for($i=1;$i<=$student["degree"];$i++){
            if($i==1){
                echo '<li><a href="#'.$year.'1" class="acative" data-toggle="tab" style="background-color:skyblue">'.$year.'1</a></li>';
                echo '<li><a href="#'.$year.'2" class="acative" data-toggle="tab" style="background-color:skyblue">'.$year.'2</a></li>';   
            }
            else{
                echo '<li><a href="#'.$year.'1" data-toggle="tab" style="background-color:skyblue">'.$year.'1</a></li>';
                echo '<li><a href="#'.$year.'2" data-toggle="tab" style="background-color:skyblue">'.$year.'2</a></li>';   
            }
            $year++;
        }
    }
      //自動生成學期tab ?>
<?php 
    function semester_tab_content($main_course,$student,$avg_score,$hours){
        echo '<div class="tab-content">';
        $index=1;
        $year=$student["academic_year"];
        for($i=0;$i<$student["degree"]+1;$i++){
            $unit_index=1;
            $semester=$year.''.$index;
            
            $record_url = 'http://120.110.112.152:3000/api/queries/select_record_and_semester?semester=resource%3Aorg.example.empty.semester_list%23'.$semester.'&student=resource%3Aorg.example.empty.student%23'.$_SESSION["member"]["stu"]["account"].'&main_course=resource%3Aorg.example.empty.Main_course%23'.$student["main_course_record"][0]; 
            $record_encode = callAPI('GET', $record_url, false);  // 尚未解析成JSON
            $record = json_decode($record_encode, true);
            
            
            if($i==0){
                echo '<div id="'.$semester.'" class="tab-pane fade in active">';
            }else{
                echo '<div id="'.$semester.'" class="tab-pane fade">';
            }
            if(count($record)!=0){
            echo '<dl><dt><h3>通過課程</h3></dt></dl>';
            for($i=0;$i<count($student["main_course_record"]);$i++){
                $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course/'.$student["main_course_record"][$i]; 
                $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
                $main_course = json_decode($main_course_encode, true);
                if($hours[$student["main_course_record"][$i]]>=$main_course["pass_hours"]){
                    stu_main_course_list($student["main_course_record"][$i],$semester,$avg_score,'green',$unit_index,$hours);
                    $unit_index++;
                }
            }
            echo '<dl><dt><h3>未通過課程</h3></dt><dd class="text-danger">注意：未達時數者，平均分數=分數*時數/主課程通過時數</dd></dl>';
            for($i=0;$i<count($student["main_course_record"]);$i++){
                $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course/'.$student["main_course_record"][$i]; 
                $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
                $main_course = json_decode($main_course_encode, true);
                if($avg_score[$student["main_course_record"][$i]]==-1){
                    stu_main_course_list($student["main_course_record"][$i],$semester,$avg_score,'yellow',$unit_index,$hours);
                    $unit_index++;   
                }
                else if($hours[$student["main_course_record"][$i]]<$main_course["pass_hours"]){
                    stu_main_course_list($student["main_course_record"][$i],$semester,$avg_score,'red',$unit_index,$hours);
                    $unit_index++;
                }
            
            }
            }
            else{
                echo '<h3>尚未修習課程！</h3>';
            }
            $index++;
            if($index>2){ 
                $index=1;
                $year++;
            }
            echo '</div>';
        }
        echo '</div>';
    }
    //自動生成tab內容?>
<?php //自動生成課程清單 
    function stu_main_course_list($main_course_id,$semester,$avg_score,$color,$unit_index,$hours){
        switch($color){
            case 'green':
                $tr_color="light-green";
                break;
            case 'red':
                $tr_color="pink";
                break;
            case 'yellow':
                $tr_color="sand";
                break;
        }
        $flag=0;
        
        $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course/'.$main_course_id; 
        $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
        $main_course = json_decode($main_course_encode, true);
        echo '<div class="panel-group">';
            
                $record_url = 'http://120.110.112.152:3000/api/queries/select_record_and_semester?semester=resource%3Aorg.example.empty.semester_list%23'.$semester.'&student=resource%3Aorg.example.empty.student%23'.$_SESSION["member"]["stu"]["account"].'&main_course=resource%3Aorg.example.empty.Main_course%23'.$main_course_id; 
                $record_encode = callAPI('GET', $record_url, false);  // 尚未解析成JSON
                $record = json_decode($record_encode, true);
                if(count($record)!=0){
                    
                    if($flag==0){
                        echo '<div id="'.$main_course_id.'" class="tab-pane fade in active">';
                        $flag=1;
                    }else{
                        echo '<div id="'.$main_course_id.'" class="tab-pane fade">';
                    }
                    echo '<div id="'.$main_course_id.'" class="panel w3-'.$color.'" >';
                    echo '<div class="panel-heading">';
                    switch($color){
                        case 'yellow':
                            echo '<div id="stu_course" data-target="#all_unit_'.$unit_index.'" aria-controls="all_unit_'.$unit_index.'"  data-toggle="collapse"  aria-expanded="false">'.$main_course["name"].'&emsp;<span class="w3-badge w3-blue" style="float:right;">'.count($record).'</span></div>';
                            break;
                        case 'red':
                            echo '<div id="stu_course" data-target="#all_unit_'.$unit_index.'" aria-controls="all_unit_'.$unit_index.'"  data-toggle="collapse"  aria-expanded="false">'.$main_course["name"].'&emsp;平均分數：'.$avg_score[$main_course_id].'    &emsp;未通過此課程&emsp;<span class="w3-badge w3-blue" style="float:right;">'.count($record).'</span>&emsp;通過時數/已達到時數：'.$main_course["pass_hours"].'/'.$hours[$main_course_id].'</div>';
                            break;
                        case 'green':
                            echo '<div id="stu_course" data-target="#all_unit_'.$unit_index.'" aria-controls="all_unit_'.$unit_index.'"data-toggle="collapse"  aria-expanded="false">'.$main_course["name"].'&emsp;平均分數：'.$avg_score[$main_course_id].'&emsp;獲得學分數：'.$main_course["credit"].'&emsp;<span class="w3-badge w3-blue" style="float:right;">'.count($record).'</span>&emsp;通過時數/已達到時數：'.$main_course["pass_hours"].'/'.$hours[$main_course_id].'</div>';
                            break;
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div id="all_unit_'.$unit_index.'"  aria-labelledby="all_unit_'.$unit_index.'" class="collapse">';
                    echo '<div id="collapse'.$unit_index.'"> ';
                    echo '<div id="'.$main_course_id.'" class="panel panel-default">';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr class="w3-'.$tr_color.'">';
                    echo '<th>課程名稱</th>';
                    echo '<th>分數</th>';
                    echo '<th>退選</th>';
                    echo '<th>備註</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    for($j=0;$j<count($record);$j++){
                        $unit_course_arr = explode('#',$record[$j]["unit_course"]);
                        $unit_course_id = $unit_course_arr[count($unit_course_arr)-1];
                        $unit_course_url = 'http://120.110.112.152:3000/api/org.example.empty.unit_course/'.$unit_course_id;
                        $unit_course_encode = callAPI('GET', $unit_course_url, false);  // 尚未解析成JSON
                        $unit_course = json_decode($unit_course_encode, true);
                        echo '<tr>';
                        echo '<td>'.$unit_course["name"].'</td>';
                        echo '<td>'.$record[$j]["score"].'</td>';
                        echo '<td><form method="post"><button type="submit" name="mark_unit_course" class="btn btn-danger btn-lg" sytle="float:right;" value="'.$main_course_id.' '.$unit_course_id.'"><span class="glyphicon glyphicon-minus"></span></button></form></td>';   //退選
                        if((isset($record[$j]["exit_class"]) && $record[$j]["exit_class"]==0) || !isset($record[$j]["exit_class"])){
                            echo '<td>--</td>';//備註，用來標記有無退選，若有退選則顯示退選，反之顯示--
                        }else{
                            echo '<td>已退選</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    
                    $unit_index++;
                } 
            
        echo '</div>';
        
    }
      //自動生成課程清單 ?>
<?php
    if( isset($_POST["result"]) ) {
        
        for($i=0;$i<count($student["main_course_record"]);$i++){
            $flag=0;
            $course_records_url='http://120.110.112.152:3000/api/queries/select_score?student=resource%3Aorg.example.empty.student%23'.$_SESSION["member"]["stu"]["account"].'&main_course=resource%3Aorg.example.empty.Main_course%23'.$student["main_course_record"][$i];
            $course_records_encode = callAPI('GET', $course_records_url, false);  // 尚未解析成JSON
            $course_records = json_decode($course_records_encode, true);
            $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course/'.$student["main_course_record"][$i];
            $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
            $main_course = json_decode($main_course_encode, true);
            $sum_score=0;
            $sum_hours=0;
            for($j=0;$j<count($course_records);$j++){    //從每筆紀錄，開始計算分數及時數
                $unit_course_arr = explode('#',$course_records[$j]["unit_course"]);
                $unit_course_id = $unit_course_arr[count($unit_course_arr)-1];
                $unit_course_url = 'http://120.110.112.152:3000/api/org.example.empty.unit_course/'.$unit_course_id;
                $unit_course_encode = callAPI('GET', $unit_course_url, false);  // 尚未解析成JSON
                $unit_course = json_decode($unit_course_encode, true);
                if($course_records[$j]["score"]>=$unit_course["pass_score"]){
                    $sum_score+=$course_records[$j]["score"]*$unit_course["hours"];
                    $sum_hours+=$unit_course["hours"];
                    //select_record 要put改是否通過
                    $data_array2=array(
                        "select_record_id" => $course_records[$j]["select_record_id"],
                        "semester_list"    => $course_records[$j]["semester_list"],
                        "attend_status"    => $course_records[$j]["attend_status"],
                        "pass_status"      => true,
                        "score"            => $course_records[$j]["score"],
                        "student"          => $course_records[$j]["student"],
                        "unit_course"      => $course_records[$j]["unit_course"],
                        "main_course"      => $course_records[$j]["main_course"]
                    ); callAPI('PUT','http://120.110.112.152:3000/api/org.example.empty.select_record/'.$course_records[$j]["select_record_id"],json_encode($data_array2));
                    //select_record 要put改是否通過
                }
                if($sum_hours>=$main_course["pass_hours"]){    //通過時數後，計算平均分數
                    $avg_score[$main_course["Main_course_id"]]=round($sum_score/$sum_hours,2);
                    $hours[$main_course["Main_course_id"]]=$sum_hours;
                    $flag=1;
                    //需要將certificate post上去
                    $data_array =  array(
                                "certificate_id"      => $_SESSION["member"]["stu"]["account"].''.$main_course['Main_course_id'].''.uniqid(rand()),
                                "avg_score"           => $avg_score[$main_course["Main_course_id"]],
                                "pass_status"         => true,
                                "semester"            => $unit_course["semester"],
                                "student"             => "resource:org.example.empty.student#".$_SESSION["member"]["stu"]["account"],
                                "main_course"         => "resource:org.example.empty.Main_course#".$main_course["Main_course_id"]
                    );
                    $post_certificate = callAPI('POST','http://120.110.112.152:3000/api/org.example.empty.certificate',json_encode($data_array));
                    //需要將certificate post上去
                    //發送結算事件
                    //發送事件
                    $data_array =  array(
                            "stu_id"          => $_SESSION["member"]["stu"],
                            "score"           => $avg_score[$main_course["Main_course_id"]],
                            "if_pass"         => true
                    );
                    $make_call = callAPI('POST','http://120.110.112.152:3000/api/org.example.empty.stu_settlement',json_encode($data_array));
                    
                    break;
                }
            }
            if($flag==0){
                $avg_score[$main_course["Main_course_id"]]=round($sum_score/$main_course["pass_hours"],2);
                $hours[$main_course["Main_course_id"]]=$sum_hours;
                $data_array =  array(
                                "certificate_id"      => $_SESSION["member"]["stu"]["account"].''.$main_course['Main_course_id'].''.uniqid(rand()),
                                "avg_score"           => $avg_score[$main_course["Main_course_id"]],
                                "pass_status"         => false,
                                "semester"            => $unit_course["semester"],
                                "student"             => "resource:org.example.empty.student#".$_SESSION["member"]["stu"]["account"],
                                "main_course"         => "resource:org.example.empty.Main_course#".$main_course["Main_course_id"]
                );
                $post_certificate = callAPI('POST','http://120.110.112.152:3000/api/org.example.empty.certificate',json_encode($data_array));
                //發送結算事件
                $data_array =  array(
                                "stu_id"          => $_SESSION["member"]["stu"]["account"],
                                "score"           => $avg_score[$main_course["Main_course_id"]],
                                "if_pass"         => false
                );
                $make_call = callAPI('POST','http://120.110.112.152:3000/api/org.example.empty.stu_settlement',json_encode($data_array));
            }
        }
        
        
        
    }
    //結算學分?>

<?php //這邊是選擇菜單  ?>
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
            }else{
//                還沒登入
                echo '<li><a href="./index.php"><span class="glyphicon glyphicon-shopping-cart"></span> 查看課程</a></li>';
                echo "<li><a href=\"./login_page.php\"><span class=\"glyphicon glyphicon-user\"></span> Login</a></li>";
            }
            ?>

        </ul>
    </div>
</nav>
<!-- 這是新增圖片的選單__結束~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

 <?php //這邊是選擇菜單  ?>
 
<!--/////////////學生清單///////////////-->
      <div class="w3-row-padding">
            <div class="w3-third w3-section" style="width:100%;">
                  <ul class="nav nav-tabs" >
                       <?php semester_tab($student); ?>
                        
                  </ul>
                  <div class="w3-container w3-light-gray" style="height: 80%; overflow:auto; overflow-x: hidden;">
                   <center><span class="w3-badge w3-blue">?</span>已修習微課程數量</center>
                   <br>
                   
                   <?php
                    if(count($student["main_course_record"])!=0){
                      semester_tab_content($main_course,$student,$avg_score,$hours); //接下來剩下加上判斷有無通過，並更改顏色及區塊出現位置
                    }else{
                      echo '<h3>尚未修習課程！</h3>';
                        
                    }
                    ?>
                       
                   
                   <br>
                   
                   <center>
                      
                       <form action="stu.php" method="post">
                           <button type="submit" name="result" class="btn btn-info"><h5>結算學分</h5></button>
                       </form>
                   </center>
               </div>
            </div>
      </div>
<!--/////////////學生清單///////////////-->
</html>