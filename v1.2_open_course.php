
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <link rel="stylesheet" href="./css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="w3-theme.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
    <script src="./css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>


    <meta charset="UTF-8">
    <title>tr_page</title>
    <!--    !!<link rel="stylesheet" href="login_tr_and_stu.css">-->

</head>

<!--CSS寫在head中   JS寫在body中-->
<body>
<?php //這邊是選擇菜單  ?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">UnitCourseWeb</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="v1.5_tr_input_score.php"><span class="glyphicon glyphicon-star"></span> 評分</a></li>
            <li><a href="v1.2_tr_open_course.php"><span class="glyphicon glyphicon-shopping-cart"></span> 開課</a></li>
            <?php
            if(isset($_SESSION["login"]) && $_SESSION["login"]==1){
                echo "<li><a href=\"./stu.php\"><span class=\"glyphicon glyphicon-user\"></span> 學生專區</a></li>";
            }else if(isset($_SESSION["login"]) && $_SESSION["login"]!=2){
                echo "<li><a href=\"./login_page.php\"><span class=\"glyphicon glyphicon-user\"></span> Login</a></li>";
            }
            ?>
            <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>
<!--<a href="./close_session.php"> 關閉seesion </a><br><br>-->

<?php //這邊是選擇菜單  ?>
<?php

$year = "1072";
echo '<hr>'.$year.'授課課程</h2>';
show_all_main_course();

function show_all_main_course (){
    echo '<div id="accordion" class="w3-row-padding">';
    //先去看有幾個main course
    $N_main_url ='http://120.110.112.152:3000/api/org.example.empty.Main_course';
    //                        回傳一堆json檔案
    $N_main_get_data = callAPI('GET', $N_main_url, false);
    //                        把json解碼放response
    $N_main_response = json_decode($N_main_get_data, true);
//    echo $N_main_response[0]["Main_course_id"];
    for($N_main = 0 ; $N_main < count($N_main_response); $N_main++){
//        要置製造主課程的選單
        echo '<div class="card" >';
        echo '<div id="'.$N_main_response[$N_main]["Main_course_id"].'" style="background-color:#0353A4"; class="card-header" >';
        // 做 以主課程為名的按鈕
        echo '<button data-target="#'.$N_main_response[$N_main]["Main_course_id"].'lists" style="color: white;" aria-controls="'.$N_main_response[$N_main]["Main_course_id"].'lists" class="btn btn-link" data-toggle="collapse"  aria-expanded="false">';



        echo "<h3>".$N_main_response[$N_main]["name"]."</h3>";
        //       主課程的+
//        echo '<div class="container">';
//        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#unit">Open Modal</button>

        echo '<button type="button" name="tr_add_unit_course" class="btn btn-success  " value="" data-toggle="modal"  data-target="#unit'.$N_main_response[$N_main]["Main_course_id"].'"><span class="glyphicon glyphicon-plus"></span></button>';
        //!!!!!!!!!!!!!!!!
?>

            <!-- Trigger the modal with a button -->

            <!-- Modal -->

        <div class="modal fade" id="main" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <form name="open_main_course" method="post" action="v1.2_tr_open_course.php"><br>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">建立主課程</h4>
                        </div>
                        <div class="modal-body ">
                            學分：<input type="number" name="input_credit" size="20"><br><br>
                            部門：<input type="text" name="input_department" size="20"><br><br>
                            課程名稱：<input type="text" name="input_course_name" size="20"><br><br>
                            須通過時數：<input type="number" name="input_pass_hours" size="20">(未滿一個小時，以一個小時計算)<br><br>
                            是否開放給外系：<input type="radio" name="input_external_status" size="20" checked="true">是
                            <input type="radio" name="input_external_status" size="20">否 <br><br>

                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="post_tr_main_course_sub" size="5" value="確定">
                        </div>
                    </form>

                </div>

            </div>
        </div>

        <div class="modal fade" id="unit<?php echo $N_main_response[$N_main]["Main_course_id"]; ?>" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <form name="open_unit_course" method="post" action="v1.2_tr_open_course.php"><br>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">建立微課程</h4>
                        </div>
                        <div class="modal-body ">
                            微課程名字：<input type="text" name="input_name" size="20"><br><br>
                            課程介紹：<textarea type="text" name="input_introduction" size="20" ></textarea><br><br>
                            上課開始日期：<input type="date" name="input_start_date" size="20"><br><br>
                            上課結束日期：<input type="date" name="input_end_date" size="20"><br><br>
                            上課開始時間：<input type="time" name="input_start_time" size="20"><br><br>
                            上課結束時間：<input type="time" name="input_end_time" size="20"><br><br>

                            星期：<input type="text" name="input_weeks" size="20"><br><br>
                            部門：<input type="text" name="input_department" size="20"><br><br>
                            授課老師id：<input type="text" name="input_teacher" size="20"><br><br>

                            上課地點：<input type="text" name="input_classroom" size="20"><br><br>
                            主課程為：<input type="text" name="input_Main_course" size="20" value=" <?php echo $N_main_response[$N_main]["Main_course_id"]; ?>"><br><br>


                            學期：<input type="number"  min="0"  name="input_semester" size="20"><br><br>
                            上課時數：<input type="number" min="0" max="30000" name="input_hours" size="20">(未滿一個小時，以一個小時計算)<br><br>
                            最大學生數：<input type="number" min="0" max="30000" name="input_max_stu" size="20"><br><br>
                            通過分數：<input type="number" min="0" max="100" name="input_pass_score" size="20"><br><br>

                            <!--                                <input type="radio" name="input_external_status" size="20"> <br><br>-->

                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="post_tr_unit_course_sub" size="5" value="確定">
                        </div>
                    </form>

                </div>

            </div>
        </div>

        <?php
        echo '</button>';
        echo '</div>';
// 傳主課程id過去，要做主課程中的微課程了
        show_main_unit_course($N_main_response[$N_main]["Main_course_id"]);
        echo '</div>';
    }
    echo '</div><br>';
    echo '<div>';
//    onclick="location.href='http://localhost:81/mini/v1.1_tr_open_ex_main_course.php'"
        echo '<button type="button" name="tr_add_main_course" class="btn btn-success btn-info btn-lg" data-toggle="modal" data-target="#main"  value=""  style="width:97%;background-color:#FFD382;padding:10px; margin:0 20px;" ><span class="glyphicon glyphicon-plus"></span></button>';
    echo '</div>';
}
function show_main_unit_course($N_main_id){
//    //他的id叫做  M002lists  前面是主課程id，加上"lists"
    echo '<div id="'.$N_main_id.'lists"  aria-labelledby="'.$N_main_id.'" class="collapse" >';
    // 根據main id 找他有幾個微課程
    $main_N_unit_url ='http://120.110.112.152:3000/api/queries/select_unit_course?Main_course=resource%3Aorg.example.empty.Main_course%23'.$N_main_id;
    //      回傳一堆json檔案
    $main_N_unit_get_data = callAPI('GET', $main_N_unit_url, false);
    //                        把json解碼放response
    $main_N_unit_response = json_decode($main_N_unit_get_data, true);

    for($N_unit = 0 ; $N_unit < count($main_N_unit_response); $N_unit++){
        echo '<div id="'.$main_N_unit_response[$N_unit]["unit_course_id"].'" style="background-color: #B9D6F2;">';
        //        每個unit table叫做  u002table  前面為unit id 加上table
//        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#unit">Open Modal</button>
        echo '<button data-target="#'.$main_N_unit_response[$N_unit]["unit_course_id"].'table"  style="color: black;" aria-controls="'.$main_N_unit_response[$N_unit]["unit_course_id"].'table" class="btn btn-link" data-toggle="collapse"  >';
//        echo "<front color='red'>".$main_N_unit_response[$N_unit]["attend_status"]."</front>";
//        echo $main_N_unit_response[$N_unit]["attend_status"];
        echo "<h3>".$main_N_unit_response[$N_unit]["name"]."</h3>";
//     微課程的+
//        echo '<button type="submit" name="tr_add_main_course" class="btn btn-success" value=""><span class="glyphicon glyphicon-plus"></span></button>';

        echo '</button>';

        echo '</div>';



        echo '<div id="'.$main_N_unit_response[$N_unit]["unit_course_id"].'table"  aria-labelledby="'.$main_N_unit_response[$N_unit]["unit_course_id"].'" class="collapse"  >';
        //            把unit id 還有空的$all_stu_id陣列傳過去
//        show_unit_table($main_N_unit_response[$N_unit]["unit_course_id"]);

        echo '</div>';

    }

    echo '</div>';
}
//

function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data){
                echo $data;
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

if(isset($_POST["post_tr_main_course_sub"])){
    $post_id = uniqid(rand());
    $post_main_course_name = $_POST["input_course_name"];
    $post_credit = $_POST["input_credit"];
    $post_department = "resource:org.example.empty.department#".$_POST["input_department"];
    $post_external_status = $_POST["input_external_status"];
    $post_pass_hours = $_POST["input_pass_hours"];

    $data_array =  array(
        "Main_course_id"   => $post_id,
        "name"             => $post_main_course_name,
        "credit"           => $post_credit,
        "department"       => $post_department,
        "external_status"  => $post_external_status,
        "pass_hours"       => $post_pass_hours,
        "use_status"       => true,
    );

    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
    $response = json_decode($make_call, true);
    echo "<script> alert('恭喜新增主課程成功');</script>";
}
if(isset($_POST["post_tr_unit_course_sub"])){
    $post_id = uniqid(rand());
    $post_input_name= $_POST["input_name"];
    $post_input_introduction = $_POST["input_introduction"];

//            日期  時間合併
    $post_input_start_date = $_POST["input_start_date"];
    $post_input_end_date = $_POST["input_end_date"];
    $post_input_start_time = $_POST["input_start_time"];
    $post_input_end_time = $_POST["input_end_time"];

//            $hours = $post_input_end_time - $post_input_start_time;
//            echo $hours;
    $start_course = $post_input_start_date." ".$post_input_start_time;
    $end_course = $post_input_end_date." ".$post_input_end_time;
//           echo $post_input_start_date." ".$post_input_start_time;
    $hours_dif = (strtotime($end_course) - strtotime($start_course))/ (60*60);
//            if($hours_dif % 1 != 0)
//                $hours_dif++;
//            echo $hours_dif;
    $post_input_weeks = $_POST["input_weeks"];
    $post_input_department = "resource:org.example.empty.department#".$_POST["input_department"];
    $post_input_teacher = "resource:org.example.empty.teacher#".$_POST["input_teacher"];

    $post_input_classroom = "resource:org.example.empty.classroom#".$_POST["input_classroom"];
    $post_input_Main_course = "resource:org.example.empty.Main_course#".$_POST["input_Main_course"];

    $post_input_semester = "resource:org.example.empty.semester_list#".$_POST["input_semester"];
    $post_input_hours = $_POST["input_hours"];
    $post_input_max_stu = $_POST["input_max_stu"];
    $post_input_pass_score = $_POST["input_pass_score"];



    $data_array =  array(
        "unit_course_id"   =>    $post_id,
        "name"             =>    $post_input_name,
        "start_time"       =>    $start_course,
        "end_time"         =>    $end_course,
        "hours"            =>    $post_input_hours,
        "weeks"            =>    $post_input_weeks,
        "department"       =>    $post_input_department,
        "teacher"          =>    $post_input_teacher,
        "max_stu"          =>    $post_input_max_stu,
        "classroom"        =>    $post_input_classroom,
        "pass_score"       =>    $post_input_pass_score,
        "selection_course_people"   =>    0,
        "introduction"     =>    $post_input_introduction,
        "use_status"       =>    true,
        "Main_course"      =>    $post_input_Main_course,
        "semester"         =>    $post_input_semester,
    );

    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
    $response = json_decode($make_call, true);
    echo "<script> alert('恭喜新增微成功');</script>";
}


?>
</body>
</html>
