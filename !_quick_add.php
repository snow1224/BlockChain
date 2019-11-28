<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<!--CSS寫在head中   JS寫在body中-->
<body>
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
<!--                 V新增八學生              -->
<div name="div_add_five_stu">  <!-- sub = add_five_stu -->
    <h3>新增學生</h3>
    <p>新增的學生id有 410528322   410516312  410575125  410536123  410573656 410516594  410528321 410568965</p>
    <form name="post_stu" method="post" action="./!_quick_add.php">
        <input type="submit" name="add_stu_list" size="5" value="確定">
    </form>
</div>   <!-- sub = add_five_stu -->

<!--                 V新增八位老師              -->
<div name="div_add_five_tr">   <!--sub = add_five_tr -->
    <h3>新增老師</h3>
    <p>新增的老師id有 tr_210516594  tr_210528321  tr_210520213  tr_420052322  tr_310428354 tr_698568482  tr_561568403  tr_310478462</p>
    <form name="post_tr" method="post" action="./!_quick_add.php">
        <input type="submit" name="add_tr_list" size="5" value="確定">
    </form>
</div>  <!--sub = add_five_tr -->


<!--                 新增APP主課程&微課程__01                -->

<div name="main_001" style="background-color:#FFD382;padding:10px;margin-bottom:5px;">
    <div name="div_add_seven_main">   <!--sub = add_main_unit_01 -->
        <h3>新增主課程__進階APP實作</h3>
        <p>新增"APP實作"跟他的微課程 </p>
        <form name="post_tr1" method="post" action="./!_quick_add.php">
            <input type="submit" name="add_main_unit_01" size="5" value="確定">
        </form>
    </div> <!--sub = add_main_unit_01 -->
<!--                 新增修  APP微課程  的學生 -->
    <form name="post_stu1" method="post" action="./!_quick_add.php"> <!-- 新增main_unit_01學生 -->
        <h3>新增APP實作的學生</h3>
    <!--    <br>-->
        <input type="submit" name="add_main_unit_01_stu" size="5" value="確定"> <!-- 新增main_unit_01學生 -->

    </form>
</div>

<!--                 新增手作課程的主課程&微課程__02                -->
<div name="main_001" style="background-color:lightskyblue;padding:10px;margin-bottom:5px;">
    <div name="div_add_seven_main">   <!--sub = add_main_unit_02 -->
        <h3>新增主課程__手作課程</h3>
        <p>新增"手作課程"跟他的微課程 </p>
        <form name="post_tr2" method="post" action="./!_quick_add.php">
            <input type="submit" name="add_main_unit_02" size="5" value="確定">
        </form>
    </div>
    <!--                 新增修  手作課程微課程  的學生              -->

    <form name="post_stu2" method="post" action="./!_quick_add.php"> <!-- 新增main_unit_01學生 -->
        <h3>新增修手作課程學生</h3>
        <!--    <br>-->
        <input type="submit" name="add_main_unit_02_stu" size="5" value="確定"> <!-- 新增main_unit_01學生 -->

    </form>

</div>

<!--                 新增網頁課程的主課程&微課程__03               -->
<div name="main_001" style="background-color:lightskyblue;padding:10px;margin-bottom:5px;">
    <div name="div_add_seven_main">   <!--sub = add_main_unit_02 -->
        <h3>新增主課程__網頁實作課程</h3>
        <p>新增"網頁實作"跟他的微課程 </p>
        <form name="post_tr2" method="post" action="./!_quick_add.php">
            <input type="submit" name="add_main_unit_03" size="5" value="確定">
        </form>
    </div>
    <!--                 新增修  網頁實作微課程  的學生              -->

    <form name="post_stu2" method="post" action="./!_quick_add.php"> <!-- 新增main_unit_01學生 -->
        <h3>新增網頁實作課程學生</h3>
        <!--    <br>-->
        <input type="submit" name="add_main_unit_03_stu" size="5" value="確定"> <!-- 新增main_unit_01學生 -->

    </form>

</div>

<!--                 新增 資訊入門的主課程&微課程__04               -->
<div name="main_001" style="background-color:lightskyblue;padding:10px;margin-bottom:5px;">
    <div name="div_add_seven_main">   <!--sub = add_main_unit_02 -->
        <h3>新增主課程__資訊入門課程</h3>
        <p>新增"資訊入門"跟他的微課程 </p>
        <form name="post_tr2" method="post" action="./!_quick_add.php">
            <input type="submit" name="add_main_unit_04" size="5" value="確定">
        </form>
    </div>
    <!--                 新增修  資訊入門微課程  的學生              -->

    <form name="post_stu2" method="post" action="./!_quick_add.php"> <!-- 新增main_unit_01學生 -->
        <h3>新增資訊入門課程學生</h3>
        <!--    <br>-->
        <input type="submit" name="add_main_unit_04_stu" size="5" value="確定"> <!-- 新增main_unit_01學生 -->

    </form>

</div>

<!--                 新增 說話藝術 的主課程&微課程__05               -->
<div name="main_001" style="background-color:lightskyblue;padding:10px;margin-bottom:5px;">
    <div name="div_add_seven_main">   <!--sub = add_main_unit_02 -->
        <h3>新增主課程__說話藝術課程</h3>
        <p>新增"說話藝術"跟他的微課程 </p>
        <form name="post_tr2" method="post" action="./!_quick_add.php">
            <input type="submit" name="add_main_unit_05" size="5" value="確定">
        </form>
    </div>
    <!--                 新增修  說話藝術微課程  的學生              -->

    <form name="post_stu2" method="post" action="./!_quick_add.php"> <!-- 新增main_unit_01學生 -->
        <h3>新增說話藝術課程學生</h3>
        <!--    <br>-->
        <input type="submit" name="add_main_unit_05_stu" size="5" value="確定"> <!-- 新增main_unit_01學生 -->

    </form>

</div>

<!-- 2019/11/26  V新增 add_stu_list && department-->
<?php
//  新增學生 & 新增department~~~~~~~~~~~~~~~~


    if(isset($_POST["add_stu_list"])){
//        新增資訊學院 department 001  、  新增美術學院 department 002 、 新增外語院 department 003 、
        $add_department_list_id_array = array("001","002","003");
        $add_department_list_name_array = array("資訊學院","美術學院","外語學院");

        for ($department_num=0 ; $department_num < count($add_department_list_id_array) ; $department_num++){
            $data_array = array(
                "department_id" => $add_department_list_id_array[$department_num],
                "name" => $add_department_list_name_array[$department_num],
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.department', json_encode($data_array));
            $response = json_decode($make_call, true);
        }




//        新增學生資料
        $add_stu_list_id_array    = array("410516594","410528321","410528322","410516312","410575125","410536123","410573656","410568965");
        $add_stu_list_name_array  = array("王雅芙","李雪怡","陳慧妍","李熙明","林碧萱","陳雨婷","莊涵東","陳宇翔");
        $add_stu_list_pass_array  = array("410516594","410528321","qkejqlda","dfwletks","erfsgdh","hsdfgerdf","41wtfwef057we3656","410werewr568afe965");
        $add_stu_list_department_array = array("001","001","002","001","003","002","003","002");
        for($stu_num=0 ; $stu_num < count($add_stu_list_id_array) ; $stu_num++){
            $data_array =  array(
                "academic_year"        =>   107,
                "degree"               =>    1,
                "id"                   =>   $add_stu_list_id_array[$stu_num],
                "name"                 =>   $add_stu_list_name_array[$stu_num],
                "email"                =>   "stu_".$add_stu_list_id_array[$stu_num]."pu.edu.tw",
                "password"             =>   $add_stu_list_pass_array[$stu_num],
                "department"           =>    "resource:org.example.empty.department#001"
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.student', json_encode($data_array));
            $response = json_decode($make_call, true);
        }
    }





?>

<!--  2019/11/26 V新增 add_tr_list && building-->
<?php
// 新增老師 && building~~~~~~~~~~~~~~~~~~~~~~~~~


if(isset($_POST["add_tr_list"])){

    //     新增建築001、002、003
    $add_building_list_id_array = array("001","002","003");
    $add_building_list_name_array = array("主顧樓","格倫樓","任垣樓");
    for($building_num=0 ; $building_num < count($add_building_list_name_array) ; $building_num++){
        $data_array = array(
            "building_id" => $add_building_list_id_array[$building_num],
            "name" => $add_building_list_name_array[$building_num],
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.building', json_encode($data_array));
        $response = json_decode($make_call, true);
    }
//      新增老師
    $add_tr_list_grade_array = array("國立中央大學資訊工程系","國立清華大學資訊安全所","國立交通大學資訊管理系","國立中央軟體工程學系","國立清華資訊工程學系","國立交通大學外文系","東海大學美術系","紐約州立大學石溪分校數學系");
    $add_tr_list_id_array    = array("tr_210516594","tr_210528321","tr_210520213","tr_420052322","tr_310428354","tr_698568482","tr_561568403","tr_310478462");
    $add_tr_list_name_array  = array("林鈺琪","李瑾萱","陳檀雅","李久彥","林羽千","陳熙雯","莊言泓","陳逸瀟");
    $add_tr_list_pass_array  = array("tr_210516594","tr_210528321","qkejqlda","dfwletks","erfsgdh","hsdfgerdf","41wtfwef057we3656","410werewr568afe965");
    $add_tr_list_department_array = array("001","001","001","001","001","003","002","001");
    for($tr_num=0 ; $tr_num < count($add_tr_list_id_array) ; $tr_num++){
        $data_array =  array(
            "grade"           => $add_tr_list_grade_array[$tr_num],
            "degree"          => "President",
            "building"        => "resource:org.example.empty.building#001",
            "id"              => $add_tr_list_id_array[$tr_num],
            "name"            => $add_tr_list_name_array[$tr_num],
            "email"           => $add_tr_list_id_array[$tr_num]."@pu.edu.tw",
            "password"        => $add_tr_list_pass_array[$tr_num],
            "department"      => "resource:org.example.empty.department#".$add_tr_list_department_array[$tr_num],

        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.teacher', json_encode($data_array));
        $response = json_decode($make_call, true);
    }

}
//





?>

<!-- 新增 APP主課程&微課程 add_main_unit_01   && 修APP微課程的學生  -->
<?php
// 新增 APP主課程&微課程 add_main_unit_01
    if(isset($_POST["add_main_unit_01"]) ) {
//        新增 APP主課程
        $data_array = array(
            "Main_course_id" => "APP_main_course_001",
            "name" => "APP基本實作課程",
            "credit" => 1,
            "department" => "resource:org.example.empty.department#001",
            "external_status" => true,
            "pass_hours" => 10,
            "use_status" => true,
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
        $response = json_decode($make_call, true);
//        新增classroom 001
        $data_array = array(
            "classroom_id" => "001",
            "name"       => "主顧111",
            "class_type" => "PROFESSION",
            "use_status" => true,
            "department" => "resource:org.example.empty.department#001",
            "building"   => "resource:org.example.empty.building#001",

        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.classroom', json_encode($data_array));
        $response = json_decode($make_call, true);
//        新增 APP微課程

        $add_001main_unit_list_id_array = array("APP_main_course_001_001","APP_main_course_001_002","APP_main_course_001_003","APP_main_course_001_004","APP_main_course_001_005");
        $add_001main_unit_list_name_array = array("開發環境架設","APP UI設計","APP 前端開發","APP 後端開發","APP 程式測試");
        $add_001main_unit_list_start_time_array = array("2018/10/02 14:00","2019/10/11 14:00","2019/10/12 14:00","2019/10/17 14:00","2019/10/23 14:00");
        $add_001main_unit_list_end_time_array = array("2018/10/02 16:00","2019/10/11 16:00","2019/10/12 16:00","2019/10/17 16:00","2019/10/23 16:00");
        $add_001main_unit_list_weeks_array = array("二","四","五","三","二");
        $add_001main_unit_list_teacher_array = array("tr_210516594","tr_210528321","tr_420052322","tr_210516594","tr_698568482");
        $add_001main_unit_list_max_stu_array = array("30","50","45","25","30");
        $add_001main_unit_list_pass_score_array = array("70","80","70","80","85");
        $add_001main_unit_list_introduction_array = array("如何安裝Android Studio","設計有美感的APP UI介面","如何開發APP前端頁面","如何開發APP後端資料傳輸","如何有效率的debug APP程式");

        for($main001_unit_num=0 ; $main001_unit_num < count($add_001main_unit_list_id_array) ; $main001_unit_num++){
            $data_array = array(
                "unit_course_id" => $add_001main_unit_list_id_array[$main001_unit_num],
                "name" => $add_001main_unit_list_name_array[$main001_unit_num],
                "start_time" => $add_001main_unit_list_start_time_array[$main001_unit_num],
                "end_time" => $add_001main_unit_list_end_time_array[$main001_unit_num],
                "hours" => 2,
                "weeks" => $add_001main_unit_list_weeks_array[$main001_unit_num],
                "department" => "resource:org.example.empty.department#001",
                "teacher" => "resource:org.example.empty.teacher#".$add_001main_unit_list_teacher_array[$main001_unit_num],
                "max_stu" => $add_001main_unit_list_max_stu_array[$main001_unit_num],
                "classroom" => "resource:org.example.empty.classroom#001",
                "pass_score" => $add_001main_unit_list_pass_score_array[$main001_unit_num],
                "selection_course_people" => 0,
                "introduction" => $add_001main_unit_list_introduction_array[$main001_unit_num],
                "use_status" => true,
                "Main_course" => "resource:org.example.empty.Main_course#APP_main_course_001",
                "semester" => "resource:org.example.empty.semester_list#1071",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
            $response = json_decode($make_call, true);
        }
    }
//  新增修APP微課程的學生

    if(isset($_POST["add_main_unit_01"]) ) {

        $add_stu_selct_list_stuid_array = array("410516594","410528321","410528322","410516312","410575125","410536123","410573656","410568965");
        $add_stu_selct_list_unitid_array = array("APP_main_course_001_001","APP_main_course_001_002","APP_main_course_001_003","APP_main_course_001_004","APP_main_course_001_005");
        for($main001_unit_num=0 ; $main001_unit_num < count($add_stu_selct_list_stuid_array) ; $main001_unit_num++){
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#1071",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#".$add_stu_selct_list_stuid_array[$main001_unit_num],
                "unit_course" => "resource:org.example.empty.unit_course#".$add_stu_selct_list_unitid_array[$main001_unit_num],
                "main_course" => "resource:org.example.empty.Main_course#APP_main_course_001",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

        }

        $add_stu_selct_list_stuid_array = array("410528321","410516594","410528321","410516312","410575125","410536123","410573656","410568965");
        $add_stu_selct_list_unitid_array = array("APP_main_course_001_001","APP_main_course_001_002","APP_main_course_001_003","APP_main_course_001_003","APP_main_course_001_003");


        for($main001_unit_num=0 ; $main001_unit_num < count($add_stu_selct_list_stuid_array) ; $main001_unit_num++){
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#1071",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#".$add_stu_selct_list_stuid_array[$main001_unit_num],
                "unit_course" => "resource:org.example.empty.unit_course#".$add_stu_selct_list_unitid_array[$main001_unit_num],
                "main_course" => "resource:org.example.empty.Main_course#APP_main_course_001",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

        }

    }


?>


<!-- 新增DIY手作課程 主課程&微課程 add_main_unit_02   && 修 手作課程微課程的學生  -->
<?php
// 新增 DIY手作課程主課程&微課程 add_main_unit_02
if(isset($_POST["add_main_unit_02"]) ) {
//        新增 APP主課程
    $data_array = array(
        "Main_course_id" => "DIY_main_course_002",
        "name" => "DIY手作課程",
        "credit" => 1,
        "department" => "resource:org.example.empty.department#002",
        "external_status" => true,
        "pass_hours" => 9,
        "use_status" => true,
    );
    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
    $response = json_decode($make_call, true);
//        新增classroom 002
    $data_array = array(
        "classroom_id" => "002",
        "name"       => "格倫樓120",
        "class_type" => "PROFESSION",
        "use_status" => true,
        "department" => "resource:org.example.empty.department#002",
        "building"   => "resource:org.example.empty.building#001",

    );
    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.classroom', json_encode($data_array));
    $response = json_decode($make_call, true);
//        新增 DIY微課程

    $add_002main_unit_list_id_array = array("DIY_main_course_002_001","DIY_main_course_002_002","DIY_main_course_002_003","DIY_main_course_002_004","DIY_main_course_002_005");
    $add_002main_unit_list_name_array = array("草圖設計","","","","");
    $add_002main_unit_list_start_time_array = array("2018/10/02 14:00","2019/10/11 14:00","2019/10/12 14:00","2019/10/17 14:00","2019/10/23 14:00");
    $add_002main_unit_list_end_time_array = array("2018/10/02 15:00","2019/10/11 16:00","2019/10/12 16:00","2019/10/17 16:00","2019/10/23 16:00");
    $add_002main_unit_list_hours_array = array("1","2","2","2","2");

    $add_002main_unit_list_weeks_array = array("二","四","五","三","二");
    $add_002main_unit_list_teacher_array = array("tr_210516594","tr_210528321","tr_420052322","tr_210516594","tr_698568482");
    $add_002main_unit_list_max_stu_array = array("20","40","25","35","30");
    $add_002main_unit_list_pass_score_array = array("80","80","80","60","75");
    $add_002main_unit_list_introduction_array = array("","","","","");

    for($main002_unit_num=0 ; $main002_unit_num < count($add_002main_unit_list_id_array) ; $main002_unit_num++){
        $data_array = array(
            "unit_course_id" => $add_002main_unit_list_id_array[$main002_unit_num],
            "name" => $add_002main_unit_list_name_array[$main002_unit_num],
            "start_time" => $add_002main_unit_list_start_time_array[$main002_unit_num],
            "end_time" => $add_002main_unit_list_end_time_array[$main002_unit_num],
            "hours" => $add_002main_unit_list_hours_array[$main002_unit_num],
            "weeks" => $add_002main_unit_list_weeks_array[$main002_unit_num],
            "department" => "resource:org.example.empty.department#002",
            "teacher" => "resource:org.example.empty.teacher#".$add_002main_unit_list_teacher_array[$main002_unit_num],
            "max_stu" => $add_002main_unit_list_max_stu_array[$main002_unit_num],
            "classroom" => "resource:org.example.empty.classroom#002",
            "pass_score" => $add_002main_unit_list_pass_score_array[$main002_unit_num],
            "selection_course_people" => 0,
            "introduction" => $add_002main_unit_list_introduction_array[$main002_unit_num],
            "use_status" => true,
            "Main_course" => "resource:org.example.empty.Main_course#DIY_main_course_002",
            "semester" => "resource:org.example.empty.semester_list#1071",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}
//  新增修DIY微課程的學生

if(isset($_POST["add_main_unit_02"]) ) {
    $add_stu_selct_list_stuid_array = array("410516594","410528321","410528322","410516312","410575125","410536123","410573656","410568965");
    $add_stu_selct_list_unitid_array = array("DIY_main_course_002_001","DIY_main_course_002_002","DIY_main_course_002_003","DIY_main_course_002_004","DIY_main_course_002_005","DIY_main_course_002_001","DIY_main_course_002_001","DIY_main_course_002_001");
    for($main002_unit_num=0 ; $main002_unit_num < count($add_stu_selct_list_stuid_array) ; $main002_unit_num++){
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#1071",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#".$add_stu_selct_list_stuid_array[$main002_unit_num],
            "unit_course" => "resource:org.example.empty.unit_course#".$add_stu_selct_list_unitid_array[$main002_unit_num],
            "main_course" => "resource:org.example.empty.Main_course#DIY_main_course_002",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

    }

    $add_stu_selct_list_stuid_array = array("410528321","410516594","410528321","410516594","410575125","410536123","410573656","410568965");
    $add_stu_selct_list_unitid_array = array("DIY_main_course_002_001","DIY_main_course_002_002","DIY_main_course_002_002","DIY_main_course_002_002","DIY_main_course_002_005");


    for($main002_unit_num=0 ; $main002_unit_num < count($add_stu_selct_list_stuid_array) ; $main002_unit_num++){
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#1071",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#".$add_stu_selct_list_stuid_array[$main002_unit_num],
            "unit_course" => "resource:org.example.empty.unit_course#".$add_stu_selct_list_unitid_array[$main002_unit_num],
            "main_course" => "resource:org.example.empty.Main_course#DIY_main_course_002",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

    }

}

?>


<!-- 新增 網頁實作主課程&微課程 add_main_unit_03  && 修網頁實作微課程的學生  -->
<?php
// 新增 網頁實作主課程&微課程 add_main_unit_03
if(isset($_POST["add_main_unit_03"]) ) {
//        新增 APP主課程
    $data_array = array(
        "Main_course_id" => "WEB_main_course_003",
        "name" => "WEB基本實作課程",
        "credit" => 1,
        "department" => "resource:org.example.empty.department#001",
        "external_status" => true,
        "pass_hours" => 12,
        "use_status" => true,
    );
    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
    $response = json_decode($make_call, true);
//        新增classroom 003
    $data_array = array(
        "classroom_id" => "003",
        "name"       => "任垣120",
        "class_type" => "PROFESSION",
        "use_status" => true,
        "department" => "resource:org.example.empty.department#001",
        "building"   => "resource:org.example.empty.building#001",

    );
    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.classroom', json_encode($data_array));
    $response = json_decode($make_call, true);
//        新增 APP微課程

    $add_003main_unit_list_id_array = array("WEB_main_course_003_001","WEB_main_course_003_002","WEB_main_course_003_003","WEB_main_course_003_004","WEB_main_course_003_005","WEB_main_course_003_006");
    $add_003main_unit_list_name_array = array("Apache架設","編譯器介紹","WEB UI設計","WEB 前端開發","WEB 後端開發","WEB 程式測試");
    $add_003main_unit_list_start_time_array = array("2018/10/02 14:00","2019/10/11 14:00","2019/10/12 14:00","2019/10/17 14:00","2019/10/23 14:00","2019/10/24 14:00");
    $add_003main_unit_list_end_time_array = array("2018/10/02 16:00","2019/10/11 16:00","2019/10/12 16:00","2019/10/17 16:00","2019/10/23 16:00","2019/10/24 16:00");
    $add_003main_unit_list_weeks_array = array("二","四","五","三","二","三");
    $add_003main_unit_list_teacher_array = array("tr_210516594","tr_210528321","tr_420052322","tr_210516594","tr_698568482","tr_698568482");
    $add_003main_unit_list_max_stu_array = array("30","50","45","25","30","30");
    $add_003main_unit_list_pass_score_array = array("70","80","70","80","85","80");
    $add_003main_unit_list_introduction_array = array("如何架設Apache","如何安裝網頁編譯器","設計有美感的WEB介面","如何開發WEB前端頁面","如何開發WEB後端資料傳輸、設定資料庫欄位","如何有效率的debug WEB程式");

    for($main003_unit_num=0 ; $main003_unit_num < count($add_003main_unit_list_id_array) ; $main003_unit_num++){
        $data_array = array(
            "unit_course_id" => $add_003main_unit_list_id_array[$main003_unit_num],
            "name" => $add_003main_unit_list_name_array[$main003_unit_num],
            "start_time" => $add_003main_unit_list_start_time_array[$main003_unit_num],
            "end_time" => $add_003main_unit_list_end_time_array[$main003_unit_num],
            "hours" => 2,
            "weeks" => $add_003main_unit_list_weeks_array[$main003_unit_num],
            "department" => "resource:org.example.empty.department#001",
            "teacher" => "resource:org.example.empty.teacher#".$add_003main_unit_list_teacher_array[$main003_unit_num],
            "max_stu" => $add_003main_unit_list_max_stu_array[$main003_unit_num],
            "classroom" => "resource:org.example.empty.classroom#003",
            "pass_score" => $add_003main_unit_list_pass_score_array[$main003_unit_num],
            "selection_course_people" => 0,
            "introduction" => $add_003main_unit_list_introduction_array[$main003_unit_num],
            "use_status" => true,
            "Main_course" => "resource:org.example.empty.Main_course#WEB_main_course_003",
            "semester" => "resource:org.example.empty.semester_list#1071",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
        $response = json_decode($make_call, true);
    }
}
//  新增修網頁實作微課程的學生

if(isset($_POST["add_main_unit_03"]) ) {

    $add_stu_selct_list_stuid_array = array("410516594","410528321","410528322","410516312","410575125","410536123","410573656","410568965");
    $add_stu_selct_list_unitid_array = array("WEB_main_course_003_001","APP_main_course_001_002","APP_main_course_001_003","APP_main_course_001_004","APP_main_course_001_005");
    for($main001_unit_num=0 ; $main001_unit_num < count($add_stu_selct_list_stuid_array) ; $main001_unit_num++){
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#1071",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#".$add_stu_selct_list_stuid_array[$main001_unit_num],
            "unit_course" => "resource:org.example.empty.unit_course#".$add_stu_selct_list_unitid_array[$main001_unit_num],
            "main_course" => "resource:org.example.empty.Main_course#APP_main_course_001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

    }

    $add_stu_selct_list_stuid_array = array("410528321","410516594","410528321","410516312","410575125","410536123","410573656","410568965");
    $add_stu_selct_list_unitid_array = array("APP_main_course_001_001","APP_main_course_001_002","APP_main_course_001_003","APP_main_course_001_003","APP_main_course_001_003");


    for($main001_unit_num=0 ; $main001_unit_num < count($add_stu_selct_list_stuid_array) ; $main001_unit_num++){
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#1071",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#".$add_stu_selct_list_stuid_array[$main001_unit_num],
            "unit_course" => "resource:org.example.empty.unit_course#".$add_stu_selct_list_unitid_array[$main001_unit_num],
            "main_course" => "resource:org.example.empty.Main_course#APP_main_course_001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

    }

}


?>


<?php
//
//    if(isset($_POST["add_main_unit_01"]) ) {
//
//        $data_array = array(
//            "Main_course_id" => "farm_M001",
//            "name" => "臺東區農業改良場農藝入門班",
//            "credit" => 2,
//            "department" => "resource:org.example.empty.department#farmer_Dep_001",
//            "external_status" => true,
//            "pass_hours" => 8,
//            "use_status" => true,
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//        $data_array = array(
//            "unit_course_id" => "farm_u001",
//            "name" => "介紹臺東場農園作物研發成果",
//            "start_time" => "2019/03/25 14:00",
//            "end_time" => "2019/03/25 16:00",
//            "hours" => 2,
//            "weeks" => "一",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr_215988322",
//            "max_stu" => 20,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 75,
//            "selection_course_people" => 12,
//            "introduction" => "介紹臺東場農園作物研發成果",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        $data_array = array(
//            "unit_course_id" => "farm_u002",
//            "name" => "農業資訊、農業諮詢單位及農民團體介紹",
//            "start_time" => "2019/03/26 14:00",
//            "end_time" => "2019/03/26 16:00",
//            "hours" => 2,
//            "weeks" => "二",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr_215988322",
//            "max_stu" => 20,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 75,
//            "selection_course_people" => 12,
//            "introduction" => "農業資訊、農業諮詢單位及農民團體介紹",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "unit_course_id" => "farm_u003",
//            "name" => "農藝概論",
//            "start_time" => "2019/03/27 14:00",
//            "end_time" => "2019/03/27 17:00",
//            "hours" => 3,
//            "weeks" => "三",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr_215988322",
//            "max_stu" => 20,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 75,
//            "selection_course_people" => 12,
//            "introduction" => "農藝概論",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        $data_array = array(
//            "unit_course_id" => "farm_u004",
//            "name" => "作物病蟲害管理概述",
//            "start_time" => "2019/03/28 14:00",
//            "end_time" => "2019/03/28 16:00",
//            "hours" => 2,
//            "weeks" => "四",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr_215988322",
//            "max_stu" => 20,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 75,
//            "selection_course_people" => 12,
//            "introduction" => "作物病蟲害管理概述",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "unit_course_id" => "farm_u005",
//            "name" => "作物合理化施肥",
//            "start_time" => "2019/03/30 13:30",
//            "end_time" => "2019/03/30 16:00",
//            "hours" => 3,
//            "weeks" => "六",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr_001",
//            "max_stu" => 20,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 60,
//            "selection_course_people" => 12,
//            "introduction" => "作物合理化施肥",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        $data_array = array(
//            "unit_course_id" => "farm_u006",
//            "name" => "水稻作物田間栽培管理及災害防範",
//            "start_time" => "2019/04/01 14:00",
//            "end_time" => "2019/04/01 16:00",
//            "hours" => 2,
//            "weeks" => "一",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr_001",
//            "max_stu" => 20,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 75,
//            "selection_course_people" => 12,
//            "introduction" => "水稻作物田間栽培管理及災害防範",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
////        $data_array = array(
////            "unit_course_id" => "farm_u007",
////            "name" => "臺東地區雜糧作物栽培管理與田間實作",
////            "start_time" => "2019/04/02 14:00",
////            "end_time" => "2019/04/02 16:00",
////            "hours" => 2,
////            "weeks" => "二",
////            "department" => "resource:org.example.empty.department#dep001",
////            "teacher" => "resource:org.example.empty.teacher#tr001",
////            "max_stu" => 30,
////            "classroom" => "resource:org.example.empty.classroom#001",
////            "pass_score" => 65,
////            "selection_course_people" => 12,
////            "introduction" => "臺東地區雜糧作物栽培管理與田間實作",
////            "use_status" => true,
////            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
////            "semester" => "resource:org.example.empty.semester_list#107",
////        );
////        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////        $response = json_decode($make_call, true);
////
////
////
////        $data_array = array(
////            "unit_course_id" => "farm_u008",
////            "name" => "農業機械概論",
////            "start_time" => "2019/04/05 13:00",
////            "end_time" => "2019/04/05 16:30",
////            "hours" => 4,
////            "weeks" => "五",
////            "department" => "resource:org.example.empty.department#dep001",
////            "teacher" => "resource:org.example.empty.teacher#tr001",
////            "max_stu" => 25,
////            "classroom" => "resource:org.example.empty.classroom#001",
////            "pass_score" => 80,
////            "selection_course_people" => 12,
////            "introduction" => "農業機械概論",
////            "use_status" => true,
////            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
////            "semester" => "resource:org.example.empty.semester_list#107",
////        );
////        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////        $response = json_decode($make_call, true);
////
////
////        $data_array = array(
////            "unit_course_id" => "farm_u009",
////            "name" => "特用作物栽培管理",
////            "start_time" => "2019/04/15 14:00",
////            "end_time" => "2019/04/15 16:00",
////            "hours" => 2,
////            "weeks" => "一",
////            "department" => "resource:org.example.empty.department#dep001",
////            "teacher" => "resource:org.example.empty.teacher#tr001",
////            "max_stu" => 20,
////            "classroom" => "resource:org.example.empty.classroom#001",
////            "pass_score" => 75,
////            "selection_course_people" => 12,
////            "introduction" => "特用作物栽培管理",
////            "use_status" => true,
////            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
////            "semester" => "resource:org.example.empty.semester_list#107",
////        );
////        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////        $response = json_decode($make_call, true);
////
////        $data_array = array(
////            "unit_course_id" => "farm_u010",
////            "name" => "有機農業概述",
////            "start_time" => "2019/04/22 14:00",
////            "end_time" => "2019/04/22 16:00",
////            "hours" => 2,
////            "weeks" => "一",
////            "department" => "resource:org.example.empty.department#dep001",
////            "teacher" => "resource:org.example.empty.teacher#tr001",
////            "max_stu" => 30,
////            "classroom" => "resource:org.example.empty.classroom#001",
////            "pass_score" => 75,
////            "selection_course_people" => 12,
////            "introduction" => "有機農業概述",
////            "use_status" => true,
////            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
////            "semester" => "resource:org.example.empty.semester_list#107",
////        );
////        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////        $response = json_decode($make_call, true);
//
//    }
////    410528322   410516312  410575125  410536123  410573656
//    if(isset($_POST["add_main_unit_01_stu"]) ) {
////        ==========================修微課程001===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410573656",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u001",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410516312",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u001",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u001",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410528322",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u001",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        //    410528322   410516312  410575125  410536123  410573656
//
//        //        ==========================修微課程002===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u002",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410575125",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u002",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410516312",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u002",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410528322",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u002",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//
//
//        //    410528322   410516312  410575125  410536123  410573656
//
//        //        ==========================修微課程003===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410528322",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u003",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u003",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//        //    410528322   410516312  410575125  410536123  410573656
//
//        //        ==========================修微課程004===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410573656",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u004",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u004",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410516312",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u004",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410528322",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u004",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        //    410528322   410516312  410575125  410536123  410573656
//
//        //        ==========================修微課程005===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410528322",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410516312",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410575125",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410573656",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        //    410528322   410516312  410575125  410536123  410573656
//
//        //        ==========================修微課程006===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410528322",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410516312",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410575125",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410573656",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        //    410528322   410516312  410575125  410536123  410573656
//
//        //        ==========================修微課程007===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410575125",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u007",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u007",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410573656",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u007",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//        //        ==========================修微課程008===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410528322",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u008",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410516312",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u008",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410575125",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u008",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//        //        ==========================修微課程009===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410516312",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u009",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410575125",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u009",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u009",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//        //        ==========================修微課程010===============================================
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410575125",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u010",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410536123",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u010",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "select_record_id" => uniqid(rand()),
//            "semester_list" => "resource:org.example.empty.semester_list#107",
//            "attend_status" => "ABSENCE",
//            "pass_status" => false,
//            "score" => 0,
//            "student" => "resource:org.example.empty.student#410573656",
//            "unit_course" => "resource:org.example.empty.unit_course#farm_u010",
//            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//        $response = json_decode($make_call, true);
//    }
////    =======================================
//    if(isset($_POST["add_main_unit_02"])){
//
//            $data_array = array(
//                "Main_course_id" => "farm_M002",
//                "name" => "網頁概念",
//                "credit" => 2,
//                "department" => "resource:org.example.empty.department#farmer_Dep_001",
//                "external_status" => true,
//                "pass_hours" => 8,
//                "use_status" => true,
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
//            $response = json_decode($make_call, true);
//            $data_array = array(
//                "unit_course_id" => "farm_u101",
//                "name" => "網頁運作原理",
//                "start_time" => "2019/03/25 14:00",
//                "end_time" => "2019/03/25 16:00",
//                "hours" => 2,
//                "weeks" => "一",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 20,
//                "classroom" => "resource:org.example.empty.classroom#001",
//                "pass_score" => 75,
//                "selection_course_people" => 12,
//                "introduction" => "XXX",
//                "use_status" => true,
//                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
//                "semester" => "resource:org.example.empty.semester_list#107",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//            $data_array = array(
//                "unit_course_id" => "farm_u102",
//                "name" => "網頁前端",
//                "start_time" => "2019/03/26 14:00",
//                "end_time" => "2019/03/26 16:00",
//                "hours" => 2,
//                "weeks" => "二",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 20,
//                "classroom" => "resource:org.example.empty.classroom#001",
//                "pass_score" => 75,
//                "selection_course_people" => 12,
//                "introduction" => "XXXX",
//                "use_status" => true,
//                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
//                "semester" => "resource:org.example.empty.semester_list#107",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "unit_course_id" => "farm_u103",
//                "name" => "網頁後端",
//                "start_time" => "2019/03/27 14:00",
//                "end_time" => "2019/03/27 17:00",
//                "hours" => 3,
//                "weeks" => "三",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 20,
//                "classroom" => "resource:org.example.empty.classroom#001",
//                "pass_score" => 75,
//                "selection_course_people" => 12,
//                "introduction" => "XXXX",
//                "use_status" => true,
//                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
//                "semester" => "resource:org.example.empty.semester_list#107",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//            $data_array = array(
//                "unit_course_id" => "farm_u104",
//                "name" => "網頁版型設計",
//                "start_time" => "2019/03/28 14:00",
//                "end_time" => "2019/03/28 16:00",
//                "hours" => 2,
//                "weeks" => "四",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 20,
//                "classroom" => "resource:org.example.empty.classroom#001",
//                "pass_score" => 75,
//                "selection_course_people" => 12,
//                "introduction" => "XXXXX",
//                "use_status" => true,
//                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
//                "semester" => "resource:org.example.empty.semester_list#107",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "unit_course_id" => "farm_u105",
//                "name" => "網站架設",
//                "start_time" => "2019/03/30 13:30",
//                "end_time" => "2019/03/30 16:00",
//                "hours" => 3,
//                "weeks" => "六",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 20,
//                "classroom" => "resource:org.example.empty.classroom#001",
//                "pass_score" => 60,
//                "selection_course_people" => 12,
//                "introduction" => "XXXX",
//                "use_status" => true,
//                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
//                "semester" => "resource:org.example.empty.semester_list#107",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
////            $data_array = array(
////                "unit_course_id" => "farm_u106",
////                "name" => "參訪設施蔬菜農場",
////                "start_time" => "2019/05/01 14:00",
////                "end_time" => "2019/05/01 16:00",
////                "hours" => 2,
////                "weeks" => "一",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 20,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 75,
////                "selection_course_people" => 12,
////                "introduction" => "XXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
////
////
////            $data_array = array(
////                "unit_course_id" => "farm_u107",
////                "name" => "參訪全聯果菜生產合作社運銷業務",
////                "start_time" => "2019/05/02 14:00",
////                "end_time" => "2019/05/02 16:00",
////                "hours" => 2,
////                "weeks" => "四",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 30,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 65,
////                "selection_course_people" => 12,
////                "introduction" => "XXXXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
////
////
////
////            $data_array = array(
////                "unit_course_id" => "farm_u108",
////                "name" => "路葡萄酒莊葡萄栽培技術訪談與葡萄加工製程",
////                "start_time" => "2019/05/05 13:00",
////                "end_time" => "2019/05/05 16:30",
////                "hours" => 4,
////                "weeks" => "日",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 25,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 80,
////                "selection_course_people" => 12,
////                "introduction" => "XXXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
////
////
////            $data_array = array(
////                "unit_course_id" => "farm_u109",
////                "name" => "農機操作事項講解與實作",
////                "start_time" => "2019/05/15 14:00",
////                "end_time" => "2019/05/15 16:00",
////                "hours" => 2,
////                "weeks" => "三",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 20,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 75,
////                "selection_course_people" => 12,
////                "introduction" => "XXXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
////
////            $data_array = array(
////                "unit_course_id" => "farm_u110",
////                "name" => "農務e把抓介紹",
////                "start_time" => "2019/05/21 14:00",
////                "end_time" => "2019/05/21 16:00",
////                "hours" => 2,
////                "weeks" => "二",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 30,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 75,
////                "selection_course_people" => 12,
////                "introduction" => "XXXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
////
////
////
////            $data_array = array(
////                "unit_course_id" => "farm_u111",
////                "name" => "農民產銷組織申請與輔導",
////                "start_time" => "2019/05/22 08:00",
////                "end_time" => "2019/05/22 09:00",
////                "hours" => 1,
////                "weeks" => "三",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 30,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 75,
////                "selection_course_people" => 12,
////                "introduction" => "XXXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
////
////
////            $data_array = array(
////                "unit_course_id" => "farm_u112",
////                "name" => "花卉田間操作",
////                "start_time" => "2019/05/22 14:00",
////                "end_time" => "2019/05/22 16:00",
////                "hours" => 2,
////                "weeks" => "三",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 30,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 75,
////                "selection_course_people" => 12,
////                "introduction" => "XXXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
////
////
////            $data_array = array(
////                "unit_course_id" => "farm_u113",
////                "name" => "果樹田間操作實務",
////                "start_time" => "2019/05/22 10:00",
////                "end_time" => "2019/05/22 12:00",
////                "hours" => 2,
////                "weeks" => "三",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 30,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 75,
////                "selection_course_people" => 12,
////                "introduction" => "XXXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
////
////
////            $data_array = array(
////                "unit_course_id" => "farm_u114",
////                "name" => "經營計畫書撰寫與評量",
////                "start_time" => "2019/05/22 16:00",
////                "end_time" => "2019/05/22 18:00",
////                "hours" => 2,
////                "weeks" => "三",
////                "department" => "resource:org.example.empty.department#dep001",
////                "teacher" => "resource:org.example.empty.teacher#tr001",
////                "max_stu" => 30,
////                "classroom" => "resource:org.example.empty.classroom#001",
////                "pass_score" => 75,
////                "selection_course_people" => 12,
////                "introduction" => "XXXX",
////                "use_status" => true,
////                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
////                "semester" => "resource:org.example.empty.semester_list#107",
////            );
////            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
////            $response = json_decode($make_call, true);
//    }
//    if(isset($_POST["add_main_unit_02_stu"]) ) {
//
////        ==========================修微課程001===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u101",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410516312",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u101",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u101",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410528322",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u101",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            //    410528322   410516312  410575125  410536123  410573656
//
//            //        ==========================修微課程002===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u102",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u102",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410516312",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u102",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410528322",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u102",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//
//
//            //    410528322   410516312  410575125  410536123  410573656
//
//            //        ==========================修微課程003===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410528322",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u103",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u103",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//            //    410528322   410516312  410575125  410536123  410573656
//
//            //        ==========================修微課程004===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u104",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u104",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410516312",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u104",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410528322",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u104",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//            //    410528322   410516312  410575125  410536123  410573656
//
//            //        ==========================修微課程005===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410528322",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410516312",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            //    410528322   410516312  410575125  410536123  410573656
//
//            //        ==========================修微課程006===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410528322",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410516312",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            //    410528322   410516312  410575125  410536123  410573656
//
//            //        ==========================修微課程007===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u107",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u107",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u107",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//            //        ==========================修微課程008===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410528322",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u108",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410516312",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u108",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u108",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//            //        ==========================修微課程009===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410516312",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u109",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u109",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u109",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//            //        ==========================修微課程010===============================================
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u110",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410536123",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u110",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u110",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u111",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u112",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410573656",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u114",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u113",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u114",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//            $data_array = array(
//                "select_record_id" => uniqid(rand()),
//                "semester_list" => "resource:org.example.empty.semester_list#107",
//                "attend_status" => "ABSENCE",
//                "pass_status" => false,
//                "score" => 0,
//                "student" => "resource:org.example.empty.student#410575125",
//                "unit_course" => "resource:org.example.empty.unit_course#farm_u111",
//                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//    }
//
//if(isset($_POST["add_main_unit_03"])) {
//
//    $data_array = array(
//        "Main_course_id" => "APP_M002",
//        "name" => "進階APP實作",
//        "credit" => 2,
//        "department" => "resource:org.example.empty.department#farmer_Dep_001",
//        "external_status" => true,
//        "pass_hours" => 8,
//        "use_status" => true,
//    );
//    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
//    $response = json_decode($make_call, true);
//    $data_array = array(
//        "unit_course_id" => "APP_u101",
//        "name" => "APP運作原理",
//        "start_time" => "2019/03/25 14:00",
//        "end_time" => "2019/03/25 16:00",
//        "hours" => 2,
//        "weeks" => "一",
//        "department" => "resource:org.example.empty.department#dep001",
//        "teacher" => "resource:org.example.empty.teacher#tr_420052322",
//        "max_stu" => 20,
//        "classroom" => "resource:org.example.empty.classroom#001",
//        "pass_score" => 75,
//        "selection_course_people" => 12,
//        "introduction" => "APP的原理",
//        "use_status" => true,
//        "Main_course" => "resource:org.example.empty.Main_course#APP_M002",
//        "semester" => "resource:org.example.empty.semester_list#107",
//    );
//    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//    $response = json_decode($make_call, true);
//
//
//    $data_array = array(
//        "unit_course_id" => "APP_u102",
//        "name" => "APP版面設計",
//        "start_time" => "2019/03/26 14:00",
//        "end_time" => "2019/03/26 16:00",
//        "hours" => 2,
//        "weeks" => "二",
//        "department" => "resource:org.example.empty.department#dep001",
//        "teacher" => "resource:org.example.empty.teacher#tr_420052322",
//        "max_stu" => 20,
//        "classroom" => "resource:org.example.empty.classroom#001",
//        "pass_score" => 75,
//        "selection_course_people" => 12,
//        "introduction" => "前端版面設計",
//        "use_status" => true,
//        "Main_course" => "resource:org.example.empty.Main_course#APP_M002",
//        "semester" => "resource:org.example.empty.semester_list#107",
//    );
//    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//    $response = json_decode($make_call, true);
//}
//?>
</body>
</html>