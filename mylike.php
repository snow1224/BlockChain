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
  <?php include "post_api.php"; 
        include "callAPI.php";
    ?>
</head>

<?php //初始化變數 
    $student_url = 'http://120.110.112.152:3000/api/org.example.empty.student/'.$_SESSION["member"]["stu"]["account"]; 
    $student_encode = callAPI('GET', $student_url, false);  // 尚未解析成JSON
    $student = json_decode($student_encode, true);
    $mylike_url = 'http://120.110.112.152:3000/api/org.example.empty.mylike'; 
    $mylike_encode = callAPI('GET', $mylike_url, false);  // 尚未解析成JSON
    $mylike = json_decode($mylike_encode, true);
      //初始化變數 ?>
<?php 
    function semester_tab_content($student){
        echo '<div class="tab-content">';

        $index=1;
        $year=$student["academic_year"];
        for($i=0;$i<$student["degree"]+1;$i++){
            $unit_index=1;
            $semester=$year.''.$index;
            if($i==0){
                echo '<div id="'.$semester.'" class="tab-pane fade in active">';
            }else{
                echo '<div id="'.$semester.'" class="tab-pane fade">';
            }
            
             if(is_array($student["mylike"]) && !empty($student["mylike"])){
                for($i=0;$i<count($student["mylike"]);$i++){
                    $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course/'.$student["mylike"][$i]; 
                    $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
                    $main_course = json_decode($main_course_encode, true);
                    stu_main_course_list($student["mylike"][$i],$semester,$unit_index);
                    $unit_index++;   
                
            
                }
                $index++;
             }
            
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
    function stu_main_course_list($main_course_id,$semester,$unit_index){
        $flag=0;
        
        $main_course_url = 'http://120.110.112.152:3000/api/org.example.empty.Main_course/'.$main_course_id; 
        $main_course_encode = callAPI('GET', $main_course_url, false);  // 尚未解析成JSON
        $main_course = json_decode($main_course_encode, true);
        echo '<div class="panel-group">';
            
                $mylike_url = 'http://120.110.112.152:3000/api/queries/select_mylike_and_student?main_course=resource%3Aorg.example.empty.Main_course%23'.$main_course_id.'&student=resource%3Aorg.example.empty.student%23'.$_SESSION["member"]["stu"]["account"]; 
                $mylike_encode = callAPI('GET', $mylike_url, false);  // 尚未解析成JSON
                $mylike = json_decode($mylike_encode, true);
                if(count($mylike)!=0){
                    
                    if($flag==0){
                        echo '<div id="'.$main_course_id.'" class="tab-pane fade in active">';
                        $flag=1;
                    }else{
                        echo '<div id="'.$main_course_id.'" class="tab-pane fade">';
                    }
                    echo '<div id="'.$main_course_id.'" class="panel panel-default" >';
                    echo '<div class="panel-heading">';
                    
                    echo '<div data-target="#all_unit_'.$unit_index.'" aria-controls="all_unit_'.$unit_index.'"  data-toggle="collapse"  aria-expanded="false">'.$main_course["name"].'&emsp;<span class="w3-badge w3-blue" style="float:right;">'.count($mylike).'</span></div>';
                        
                       
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div id="all_unit_'.$unit_index.'"  aria-labelledby="all_unit_'.$unit_index.'" class="collapse in">';
                    echo '<div id="collapse'.$unit_index.'"> ';
                    echo '<div id="'.$main_course_id.'" class="panel panel-default">';
                    echo '<table class="table">';
                    echo '<thead>';
                    echo '<tr class="panel-default">';
                    echo '<th>課程名稱</th>';
                    echo '<th>通過標準</th>';
                    echo '<th>上課時間</th>';
                    echo '<th>加選</th>';
                    echo '<th>刪除</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    for($j=0;$j<count($mylike);$j++){
                        $unit_course_arr = explode('#',$mylike[$j]["unit_course"]);
                        $unit_course_id = $unit_course_arr[count($unit_course_arr)-1];
                        $unit_course_url = 'http://120.110.112.152:3000/api/org.example.empty.unit_course/'.$unit_course_id;
                        $unit_course_encode = callAPI('GET', $unit_course_url, false);  // 尚未解析成JSON
                        $unit_course = json_decode($unit_course_encode, true);
                        echo '<tr>';
                        echo '<form action="mylike.php" method="post">';
                        echo '<td>'.$unit_course["name"].'</td>';
                        echo '<td>'.$unit_course["pass_score"].'</td>';
                        echo '<td>--</td>';   
                        echo '<td><button type="submit" name="speed_add" class="btn btn-success btn-lg" sytle="float:right;" value="'.$main_course_id.' '.$unit_course_id.'"><span class="glyphicon glyphicon-plus"></span></button></td>';
                        echo '<td><button type="submit" name="del_mylike" class="btn btn-danger btn-lg" sytle="float:right;" value="'.$main_course_id.' '.$unit_course_id.'"><span class="glyphicon glyphicon-minus"></span></button></td>';
                        echo '</tr>';
                        echo '</form>';    
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


<?php //這邊是選擇菜單  ?>
<nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
                  <a class="navbar-brand" href="#">微學分選課系統</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                      <li><a href="./mylike.php"><span class="glyphicon glyphicon-star"></span> 我的最愛</a></li>
                      <li><a href="./index.php"><span class="glyphicon glyphicon-shopping-cart"></span> 選課</a></li>
                      <?php
                        if(isset($_SESSION["login"]) && $_SESSION["login"]==1){
                           echo "<li><a href=\"./stu.php\"><span class=\"glyphicon glyphicon-user\"></span> 學生專區</a></li>";
                        }else{
                           echo "<li><a href=\"./login_page.php\"><span class=\"glyphicon glyphicon-user\"></span> Login</a></li>";
                        }
                      ?>
                      <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
          </div>
</nav>

 <?php //這邊是選擇菜單  ?>
 
<!--/////////////學生清單///////////////-->
      <div class="w3-row-padding">
            <div class="w3-third w3-section" style="width:100%;">
                  <div class="w3-container w3-light-gray" style="height: 80%; overflow:auto; overflow-x: hidden;">
                   <center><span class="w3-badge w3-blue">?</span>已選擇微課程數量</center>
                   <br>
                   <?php semester_tab_content($student); //接下來剩下加上判斷有無通過，並更改顏色及區塊出現位置  ?>
                   
                       
                   <br>
                   
                   
               </div>
            </div>
      </div>
<!--/////////////學生清單///////////////-->
</html>