<!--// 打開session-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="./css/bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="w3-theme.css">
    <script src="./css/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

    <script src="https://static.pengyaou.com/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
    <script src="https://static.pengyaou.com/js/jquery-1.8.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>老師評分</title>
    <meta charset="UTF-8">
</head>
<!--// tab使用的CSS-->
<!--// 有#TabMain  .tabItemContainer       .tabBodyContainer  -->
<!--//             .tabItemContainer>li                       -->
<!--//             .tabItemContainer>li>a-->
<!--                                                              -->
<!--//  .tabItemCurrent-->
<!--//  .tabItemContainer>li>a:hover-->
<!--                                                              -->
<!--//   .tabBodyItem-->
<!--//   .tabBodyItem>p-->
<!--//   .tabBodyItem>p>a-->
<!--                                                              -->
<!--//    .tabBodyCurrent-->
<style>
    #TabMain {
        width: 800px;
        margin: 0 auto;
        margin-top: 100px;
    }

    .tabItemContainer {
        background-color: white;
        width: 100px;
        float: left;
    }

    .tabBodyContainer {
        width: 90%;
        height: 250px;
        float: left;
        background-color: #fff;
        border: 1px solid #ccc;
        -webkit-border-radius: 0 5px 5px 0;
        -moz-border-radius: 0 5px 5px 0;
        border-radius: 0 5px 5px 0;
        margin-left: 1px;
    }

    .tabItemContainer>li {
        list-style: none;
        text-align: center;
    }

    .tabItemContainer>li>a {
        float: left;
        width: 100%;
        padding: 30px 0 30px 0;
        font: 16px "微软雅黑", Arial, Helvetica, sans-serif;
        color: #808080;
        cursor: pointer;
        text-decoration: none;
        border: 1px solid transparent;
    }

    .tabItemCurrent {
        background-color: #fff;
        border: 1px solid #ccc !important;
        border-right: 1px solid #fff !important;
        position: relative;
        -webkit-border-radius: 5px 0 0 5px;
        -moz-border-radius: 5px 0 0 5px;
        border-radius: 5px 0 0 5px;
    }
    /*  */
    .tabItemContainer>li>a:hover {
        color: #333;
    }

    .tabBodyItem {
        position: absolute;
        width: 90%;
        display: none;
    }

    .tabBodyItem>p {
        font: 13px "微软雅黑", Arial, Helvetica, sans-serif;
        text-align: center;
        margin-top: 30px;
    }

    .tabBodyItem>p>a {
        text-decoration: none;
        color: #0F3;
    }

    .tabBodyCurrent {
        display: block;
    }

</style>

<body>
<!-- session測試  可刪除-->
<a href="./close_session.php"> 關閉seesion </a><br><br>
<!-- post 、 get的API-->
<?php
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
?>
<!--一橫菜單(有我的最愛、選課、login...-->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">微學分選課系統</a>
        </div>
        <ul class="nav navbar-nav navbar-right">

            <?php
            if(isset($_SESSION["login"]) && $_SESSION["login"]==1){
                echo '<li><a href="#"><span class="glyphicon glyphicon-star"></span> 我的最愛</a></li>';
                echo '<li><a href="./index.php"><span class="glyphicon glyphicon-shopping-cart"></span> 選課</a></li>';
                echo "<li><a href=\"./stu.php\"><span class=\"glyphicon glyphicon-user\"></span> 學生專區</a></li>";
            }
            else if(isset($_SESSION["login"]) && $_SESSION["login"]==2){
                echo '<li><a href="v1.6_tr_input_score.php"><span class="glyphicon glyphicon-star"></span> 評分</a></li>';
                echo '<li><a href="./v1.6_tr_open_course.php"><span class="glyphicon glyphicon-shopping-cart"> 開課申請</a></li>';
            }else{
                echo '<li><a href="#"><span class="glyphicon glyphicon-star"></span> 我的最愛</a></li>';
                echo '<li><a href="./index.php"><span class="glyphicon glyphicon-shopping-cart"></span> 選課</a></li>';
                echo "<li><a href=\"./login_page.php\"><span class=\"glyphicon glyphicon-user\"></span> Login</a></li>";
            }
            ?>
            <li><a href="./logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<!--主要程式(抓學期 & 抓學期課程-->
<?php
    $year = "1072";
    echo '<hr>'.$year.'授課課程</h2>';
    show_all_main_course();
?>
<!-- function_1_抓本全期 有的全部"主課程"-->
<?php
function show_all_main_course (){
    echo '<div id="accordion" class="w3-row-padding">';
    //先去看有幾個main course
    $N_main_url ='http://120.110.112.152:3000/api/org.example.empty.Main_course';
    //                        回傳一堆json檔案
    $N_main_get_data = callAPI('GET', $N_main_url, false);
    //                        把jso,"n解碼放response
    $N_main_response = json_decode($N_main_get_data, true);
//    echo $N_main_response[0]["Main_course_id"];
//    echo $N_main_url;
    for($N_main = 0 ; $N_main < count($N_main_response); $N_main++){
//        要置製造主課程的選單
        echo '<div class="card" >';
        echo '<div id="'.$N_main_response[$N_main]["Main_course_id"].'" style="background-color:#0353A4"; class="card-header" >';
        // 做 以主課程為名的按鈕
        echo '<button data-target="#'.$N_main_response[$N_main]["Main_course_id"].'lists" style="color: white;" aria-controls="'.$N_main_response[$N_main]["Main_course_id"].'lists" class="btn btn-link" data-toggle="collapse"  aria-expanded="false">';
        echo "<h3>".$N_main_response[$N_main]["name"]."</h3>";
        echo '</button>';
        echo '</div>';
        // 傳主課程id過去，要做主課程中的微課程了
        show_main_unit_course($N_main_response[$N_main]["Main_course_id"]);
        echo '</div>';
    }
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
        echo '<div id="'.$main_N_unit_response[$N_unit]["unit_course_id"].' table" style="background-color: #B9D6F2;">';
        //        每個unit table叫做  u002table  前面為unit id 加上table
        echo '<button data-target="#'.$main_N_unit_response[$N_unit]["unit_course_id"].'table"  style="color: black;" aria-controls="'.$main_N_unit_response[$N_unit]["unit_course_id"].'table" class="btn btn-link" data-toggle="collapse"  >';
//        echo "<front color='red'>".$main_N_unit_response[$N_unit]["attend_status"]."</front>";
//        echo $main_N_unit_response[$N_unit]["attend_status"];
        echo "<h3>".$main_N_unit_response[$N_unit]["name"]."</h3>";
        echo '</button>';

        echo '</div>';



       // echo '<div id="'.$main_N_unit_response[$N_unit]["unit_course_id"].'table"  aria-labelledby="'.$main_N_unit_response[$N_unit]["unit_course_id"].'" class="collapse"  >';
        //            把unit id 還有空的$all_stu_id陣列傳過去
        show_unit_table($main_N_unit_response[$N_unit]["unit_course_id"].'table',$main_N_unit_response[$N_unit]["hours"]);

      //  echo '</div>';

    }

    echo '</div>';
}
function show_unit_table ($get_unit_course_id_table,$unit_course_hours){
   // echo $unit_course_hours;
    echo '<form name="tr_send_point" method="post" action="./v1.2_tr_input_score_system.php">';
        echo '<div id="#'.$get_unit_course_id_table.'"aria-labelledby="'.$get_unit_course_id_table.'"'.'class="collapse"';
            echo '<div class="tabItemContainer">';
                for($i=1 ; $i<=$unit_course_hours ; $i++){
                    echo '<li><a>第'.$i.'堂課</a></li>';
                }
            echo '</div>';
        echo '<div class="tabBodyContainer">';

    for($i=1 ; $i<=$unit_course_hours ; $i++) {

        echo '<div class="tabBodyItem tabBodyCurrent">';
            echo '<table  class="table table-striped">';


                echo '<thead><tr> <th>學號</th> <th>姓名</th> <th>出缺席</th>  <th>分數</th> </tr></thead>';
                echo '<tbody>';

                    echo '<tr>';
                        echo '<td>410555888</td>';
                        echo '<td>X羊駝X</t>';
                        echo '<td>測試</td>';
                        echo '<td>測試</td>';
                    echo '</tr>';
                echo '</tbody>';


            echo '</table>';
        echo '</div>';
    }


        echo '</div>';
    echo '</div>';

    echo '<br><input type="submit" name="sub_button" value="確認修改"><hr>';
    echo '</form>';
}

//    echo '<br><table  class="table table-striped">';
//
//
//    echo '<thead><tr> <th>學號</th> <th>姓名</th> <th>出缺席</th>  <th>分數</th> </tr></thead>';
//
//    $get_unit_course_id_url = 'http://120.110.112.152:3000/api/queries/select_record_unit_course?unit_course=resource%3Aorg.example.empty.unit_course%23'.$get_unit_course_id;
////                        回傳一堆json檔案
//    $get_unit_course_id_get_data = callAPI('GET', $get_unit_course_id_url, false);
////                        把json解碼放response
//
//
//    $get_unit_course_id_response = json_decode($get_unit_course_id_get_data, true);
////                        echo count($response);
//    echo '<tbody>';
//    for($n = 0 ; $n < count($get_unit_course_id_response) ; $n++) {
////         $stu[0]為切割後的resource...那串  $stu[1]為切割完的學生id
//        $stu = explode("#", $get_unit_course_id_response[$n]["student"]);
////        $main_id[0]為切割後的resource...那串  $main_id[1]為切割完的main id
//        $main_id = explode("#", $get_unit_course_id_response[$n]["main_course"]);
//        $semester_list = explode("#", $get_unit_course_id_response[$n]["semester_list"]);
//
//        echo '<tr>';
//        echo '<td>' . $stu[1] . '</td>';
//        $stu_url = 'http://120.110.112.152:3000/api/org.example.empty.student/' . $stu[1];
//        //                                 echo $stu_url;
//        //                                 echo "======".$n."<br>";
//        $stu_get_data = callAPI('GET', $stu_url, false);
//        //                                 echo $stu_get_data."<hr>";
//        $stu_response = json_decode($stu_get_data, true);
//        //                                 echo $stu_get_data;
//        //                                 echo $stu_response["name"]."<hr>";
//
//        echo '<td>' . $stu_response["name"] . '</td>';
//
//        echo '<td>';
////         unit的id 加上學生的id
//        $unit_and_stu_id = $get_unit_course_id.$stu[1];
////        $stu[0]為切割後的resource...那串  $stu[1]為切割完的學生id
////        $all_stu_id[$n] = $stu[1];
////        $_SESSION[A001]儲存了這個為課程的全部學生id
////        echo $get_unit_course_id;
//        $_SESSION["course"][$get_unit_course_id][$n]=$stu[1];
////        $SESSION["course"][A001][pig001] = 這個select的id
//        $_SESSION["course"][$get_unit_course_id][$stu[1]]=$get_unit_course_id_response[$n]["select_record_id"];
////        echo $_SESSION["course"][$get_unit_course_id][$n]=$stu[1];
//        if($get_unit_course_id_response[$n]["attend_status"] == "ATTEND"){
//            echo '<input type="radio" name="attend' .$unit_and_stu_id. '" value="attend" checked="True">出席';
//            echo '<input type="radio" name="attend' .$unit_and_stu_id. '" value="unattend">未出席';
//        }
//        else{
//            echo '<input type="radio" name="attend' .$unit_and_stu_id. '" value="attend" >出席';
//            echo '<input type="radio" name="attend' .$unit_and_stu_id. '" value="unattend" checked="True">未出席';
//
//        }
//
//        echo '</td>';
//
//        echo '<td> <input type="text" name="score'.$unit_and_stu_id.'" size="8" value="'.$get_unit_course_id_response[$n]["score"].'"><br><br> </td>';
//        echo '</tr>';
//    }
//    echo '</tbody>';
////
//    echo '</table>';
////    傳送$all_stu_id陣列 過去
////    echo '<input type="hidden" name="all_stu_id" value="$all_stu_id[]">';
////    傳送unit id 過去
//    echo '<input type="hidden" name="unit_id" value="'.$get_unit_course_id.'">';
//    echo '<input type="hidden" name="n_stu" value="'.count($get_unit_course_id_response).'">';
//    if(isset($main_id[1]) && isset($semester_list[1])){
//        echo '<input type="hidden" name="main_id" value="'.$main_id[1].'">';
//        echo '<input type="hidden" name="semester_list" value="'.$semester_list[1].'">';
//    }


?>


<!--// 執行tab  unit_tab-->
<script type="text/javascript">
    $(document).ready(function(e) {
        SidebarTabHandler.Init();
    });
    var SidebarTabHandler = {
        Init: function() {
            $(".tabItemContainer>li").click(function() {
                $(".tabItemContainer>li>a").removeClass("tabItemCurrent");
                $(".tabBodyItem").removeClass("tabBodyCurrent");
                $(this).find("a").addClass("tabItemCurrent");
                $($(".tabBodyItem")[$(this).index()]).addClass("tabBodyCurrent");
            });
        }
    }

</script>
</body>

</html>
