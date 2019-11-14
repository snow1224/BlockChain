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
<div name="div_add_five_stu">  <!-- sub = add_five_stu -->
    <h3>新增學生</h3>
    <p>新增的學生id有 410528322   410516312  410575125  410536123  410573656</p>
    <form name="post_stu" method="post" action="./farmer_system_post.php">
        <input type="submit" name="add_five_stu" size="5" value="確定">
    </form>
</div>   <!-- sub = add_five_stu -->

<div name="div_add_five_tr">   <!--sub = add_five_tr -->
    <h3>新增老師</h3>
    <p>新增的老師id有 tr_210528322   tr_215988322  tr_210520213  tr_420052322  tr_310428354</p>
    <form name="post_tr" method="post" action="./farmer_system_post.php">
        <input type="submit" name="add_five_tr" size="5" value="確定">
    </form>
</div>  <!--sub = add_five_tr -->

<div name="main_001" style="background-color:#FFD382;padding:10px;margin-bottom:5px;">
    <div name="div_add_seven_main">   <!--sub = add_main_unit_01 -->
        <h3>新增主課程__進階APP實作</h3>
        <p>新增"APP實作"跟他的微課程 </p>
        <form name="post_tr1" method="post" action="./farmer_system_post.php">
            <input type="submit" name="add_main_unit_01" size="5" value="確定">
        </form>
    </div> <!--sub = add_main_unit_01 -->

    <form name="post_stu1" method="post" action="./farmer_system_post.php"> <!-- 新增main_unit_01學生 -->
        <h3>新增main_unit_01學生</h3>
    <!--    <br>-->
        <input type="submit" name="add_main_unit_01_stu" size="5" value="確定"> <!-- 新增main_unit_01學生 -->

    </form>
</div>

<!--  002-->
<div name="main_001" style="background-color:lightskyblue;padding:10px;margin-bottom:5px;">
    <div name="div_add_seven_main">   <!--sub = add_main_unit_02 -->
        <h3>新增主課程__農作物課程</h3>
        <p>新增"農作物課程"跟他的微課程 </p>
        <form name="post_tr2" method="post" action="./farmer_system_post.php">
            <input type="submit" name="add_main_unit_02" size="5" value="確定">
        </form>
    </div> <!--sub = add_main_unit_02 -->
    <form name="post_stu2" method="post" action="./farmer_system_post.php"> <!-- 新增main_unit_01學生 -->
        <h3>新增main_unit_01學生</h3>
        <!--    <br>-->
        <input type="submit" name="add_main_unit_02_stu" size="5" value="確定"> <!-- 新增main_unit_01學生 -->

    </form>

</div>

<h3>新增主課程__進階APP實作</h3>
<p>新增"APP實作"跟他的微課程 </p>
<form name="post_tr1" method="post" action="./farmer_system_post.php">
    <input type="submit" name="add_main_unit_03" size="5" value="確定">
</form>
<?php
    if(isset($_POST["add_five_tr"])){
        //       新增老師1
        $data_array =  array(
            "grade"           => "國立台灣大學研究所",
            "degree"          => "President",
            "building"        => "resource:org.example.empty.building#001",
            "id"              => "tr_210528322",
            "name"            => "王大雪",
            "email"           => "tr_210528322@pu.edu.tw",
            "password"        => "123456",
            "department"      => "resource:org.example.empty.department#002",

        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.teacher', json_encode($data_array));
        $response = json_decode($make_call, true);

        //2
        $data_array =  array(
            "grade"           => "國立台灣大學研究所",
            "degree"          => "President",
            "building"        => "resource:org.example.empty.building#001",
            "id"              => "tr_215988322",
            "name"            => "王雪極",
            "email"           => "tr_215988322@pu.edu.tw",
            "password"        => "123456",
            "department"      => "resource:org.example.empty.department#002",

        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.teacher', json_encode($data_array));
        $response = json_decode($make_call, true);

        //3
        $data_array =  array(
            "grade"           => "國立台灣大學研究所",
            "degree"          => "President",
            "building"        => "resource:org.example.empty.building#001",
            "id"              => "tr_210520213",
            "name"            => "林度鱈",
            "email"           => "tr_210520213@pu.edu.tw",
            "password"        => "123456",
            "department"      => "resource:org.example.empty.department#002",

        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.teacher', json_encode($data_array));
        $response = json_decode($make_call, true);
        // 4
        $data_array =  array(
            "grade"           => "國立台灣大學研究所",
            "degree"          => "President",
            "building"        => "resource:org.example.empty.building#001",
            "id"              => "tr_420052322",
            "name"            => "沉純襅",
            "email"           => "tr_420052322@pu.edu.tw",
            "password"        => "123456",
            "department"      => "resource:org.example.empty.department#002",

        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.teacher', json_encode($data_array));
        $response = json_decode($make_call, true);
        // 5
        $data_array =  array(
            "grade"           => "國立台灣大學研究所",
            "degree"          => "President",
            "building"        => "resource:org.example.empty.building#001",
            "id"              => "tr_310428354",
            "name"            => "王鳕柔",
            "email"           => "tr_310428354@pu.edu.tw",
            "password"        => "123456",
            "department"      => "resource:org.example.empty.department#002",

        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.teacher', json_encode($data_array));
        $response = json_decode($make_call, true);
    }


    if(isset($_POST["add_five_stu"])){
//        新增dep
        $data_array = array(
            "department_id" => "dep001",
            "name" => "科技農業系",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.department', json_encode($data_array));
        $response = json_decode($make_call, true);


//     新增建築
        $data_array = array(
            "building_id" => "001",
            "name" => "build_A",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.building', json_encode($data_array));
        $response = json_decode($make_call, true);


// 新增這幾個學生410528322   410516312  410575125  410536123  410573656  跟一個老師
//                 夏承沛、   吳翔洋        、林嘉昌、   賴怡如、    楊美漢
        $data_array =  array(
              "academic_year"        =>   107,
              "degree"               =>    1,
//              "main_course_record"   =>   [{}],
              "id"                   =>   "410528322",
              "name"                 =>   "夏承沛",
              "email"                =>    "stu_410528322@pu.edu.tw",
              "password"             =>    "123456",
              "department"           =>    "resource:org.example.empty.department#002"
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.student', json_encode($data_array));
        $response = json_decode($make_call, true);


        $data_array =  array(
            "academic_year"        =>   107,
            "degree"               =>    1,
//              "main_course_record"   =>   [{}],
            "id"                   =>   "410516312",
            "name"                 =>   "吳翔洋",
            "email"                =>    "stu_410516312@pu.edu.tw",
            "password"             =>    "QAQQQ",
            "department"           =>    "resource:org.example.empty.department#002"
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.student', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array =  array(
            "academic_year"        =>   107,
            "degree"               =>    1,
//              "main_course_record"   =>   [{}],
            "id"                   =>   "410575125",
            "name"                 =>   "林嘉昌",
            "email"                =>    "stu_410575125@pu.edu.tw",
            "password"             =>    "TATQQQ",
            "department"           =>    "resource:org.example.empty.department#002"
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.student', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array =  array(
            "academic_year"        =>   107,
            "degree"               =>    1,
//              "main_course_record"   =>   [{}],
            "id"                   =>   "410536123",
            "name"                 =>   "賴怡如",
            "email"                =>    "stu_410536123@pu.edu.tw",
            "password"             =>    "qwertyuiop",
            "department"           =>    "resource:org.example.empty.department#002"
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.student', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array =  array(
            "academic_year"        =>   107,
            "degree"               =>    1,
//              "main_course_record"   =>   [{}],
            "id"                   =>   "410573656",
            "name"                 =>   "楊美漢",
            "email"                =>    "stu_410573656@pu.edu.tw",
            "password"             =>    "123456",
            "department"           =>    "resource:org.example.empty.department#002"
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.student', json_encode($data_array));
        $response = json_decode($make_call, true);
    }
//    新增 APP實作
    if(isset($_POST["add_main_unit_01"]) ) {

        $data_array = array(
            "Main_course_id" => "farm_M001",
            "name" => "臺東區農業改良場農藝入門班",
            "credit" => 2,
            "department" => "resource:org.example.empty.department#farmer_Dep_001",
            "external_status" => true,
            "pass_hours" => 8,
            "use_status" => true,
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
        $response = json_decode($make_call, true);
        $data_array = array(
            "unit_course_id" => "farm_u001",
            "name" => "介紹臺東場農園作物研發成果",
            "start_time" => "2019/03/25 14:00",
            "end_time" => "2019/03/25 16:00",
            "hours" => 2,
            "weeks" => "一",
            "department" => "resource:org.example.empty.department#dep001",
            "teacher" => "resource:org.example.empty.teacher#tr_215988322",
            "max_stu" => 20,
            "classroom" => "resource:org.example.empty.classroom#001",
            "pass_score" => 75,
            "selection_course_people" => 12,
            "introduction" => "介紹臺東場農園作物研發成果",
            "use_status" => true,
            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
            "semester" => "resource:org.example.empty.semester_list#107",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
        $response = json_decode($make_call, true);


        $data_array = array(
            "unit_course_id" => "farm_u002",
            "name" => "農業資訊、農業諮詢單位及農民團體介紹",
            "start_time" => "2019/03/26 14:00",
            "end_time" => "2019/03/26 16:00",
            "hours" => 2,
            "weeks" => "二",
            "department" => "resource:org.example.empty.department#dep001",
            "teacher" => "resource:org.example.empty.teacher#tr_215988322",
            "max_stu" => 20,
            "classroom" => "resource:org.example.empty.classroom#001",
            "pass_score" => 75,
            "selection_course_people" => 12,
            "introduction" => "農業資訊、農業諮詢單位及農民團體介紹",
            "use_status" => true,
            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
            "semester" => "resource:org.example.empty.semester_list#107",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "unit_course_id" => "farm_u003",
            "name" => "農藝概論",
            "start_time" => "2019/03/27 14:00",
            "end_time" => "2019/03/27 17:00",
            "hours" => 3,
            "weeks" => "三",
            "department" => "resource:org.example.empty.department#dep001",
            "teacher" => "resource:org.example.empty.teacher#tr_215988322",
            "max_stu" => 20,
            "classroom" => "resource:org.example.empty.classroom#001",
            "pass_score" => 75,
            "selection_course_people" => 12,
            "introduction" => "農藝概論",
            "use_status" => true,
            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
            "semester" => "resource:org.example.empty.semester_list#107",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
        $response = json_decode($make_call, true);


        $data_array = array(
            "unit_course_id" => "farm_u004",
            "name" => "作物病蟲害管理概述",
            "start_time" => "2019/03/28 14:00",
            "end_time" => "2019/03/28 16:00",
            "hours" => 2,
            "weeks" => "四",
            "department" => "resource:org.example.empty.department#dep001",
            "teacher" => "resource:org.example.empty.teacher#tr_215988322",
            "max_stu" => 20,
            "classroom" => "resource:org.example.empty.classroom#001",
            "pass_score" => 75,
            "selection_course_people" => 12,
            "introduction" => "作物病蟲害管理概述",
            "use_status" => true,
            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
            "semester" => "resource:org.example.empty.semester_list#107",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "unit_course_id" => "farm_u005",
            "name" => "作物合理化施肥",
            "start_time" => "2019/03/30 13:30",
            "end_time" => "2019/03/30 16:00",
            "hours" => 3,
            "weeks" => "六",
            "department" => "resource:org.example.empty.department#dep001",
            "teacher" => "resource:org.example.empty.teacher#tr_001",
            "max_stu" => 20,
            "classroom" => "resource:org.example.empty.classroom#001",
            "pass_score" => 60,
            "selection_course_people" => 12,
            "introduction" => "作物合理化施肥",
            "use_status" => true,
            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
            "semester" => "resource:org.example.empty.semester_list#107",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
        $response = json_decode($make_call, true);


        $data_array = array(
            "unit_course_id" => "farm_u006",
            "name" => "水稻作物田間栽培管理及災害防範",
            "start_time" => "2019/04/01 14:00",
            "end_time" => "2019/04/01 16:00",
            "hours" => 2,
            "weeks" => "一",
            "department" => "resource:org.example.empty.department#dep001",
            "teacher" => "resource:org.example.empty.teacher#tr_001",
            "max_stu" => 20,
            "classroom" => "resource:org.example.empty.classroom#001",
            "pass_score" => 75,
            "selection_course_people" => 12,
            "introduction" => "水稻作物田間栽培管理及災害防範",
            "use_status" => true,
            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
            "semester" => "resource:org.example.empty.semester_list#107",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
        $response = json_decode($make_call, true);


//        $data_array = array(
//            "unit_course_id" => "farm_u007",
//            "name" => "臺東地區雜糧作物栽培管理與田間實作",
//            "start_time" => "2019/04/02 14:00",
//            "end_time" => "2019/04/02 16:00",
//            "hours" => 2,
//            "weeks" => "二",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr001",
//            "max_stu" => 30,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 65,
//            "selection_course_people" => 12,
//            "introduction" => "臺東地區雜糧作物栽培管理與田間實作",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//
//        $data_array = array(
//            "unit_course_id" => "farm_u008",
//            "name" => "農業機械概論",
//            "start_time" => "2019/04/05 13:00",
//            "end_time" => "2019/04/05 16:30",
//            "hours" => 4,
//            "weeks" => "五",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr001",
//            "max_stu" => 25,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 80,
//            "selection_course_people" => 12,
//            "introduction" => "農業機械概論",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//
//        $data_array = array(
//            "unit_course_id" => "farm_u009",
//            "name" => "特用作物栽培管理",
//            "start_time" => "2019/04/15 14:00",
//            "end_time" => "2019/04/15 16:00",
//            "hours" => 2,
//            "weeks" => "一",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr001",
//            "max_stu" => 20,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 75,
//            "selection_course_people" => 12,
//            "introduction" => "特用作物栽培管理",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);
//
//        $data_array = array(
//            "unit_course_id" => "farm_u010",
//            "name" => "有機農業概述",
//            "start_time" => "2019/04/22 14:00",
//            "end_time" => "2019/04/22 16:00",
//            "hours" => 2,
//            "weeks" => "一",
//            "department" => "resource:org.example.empty.department#dep001",
//            "teacher" => "resource:org.example.empty.teacher#tr001",
//            "max_stu" => 30,
//            "classroom" => "resource:org.example.empty.classroom#001",
//            "pass_score" => 75,
//            "selection_course_people" => 12,
//            "introduction" => "有機農業概述",
//            "use_status" => true,
//            "Main_course" => "resource:org.example.empty.Main_course#farm_M001",
//            "semester" => "resource:org.example.empty.semester_list#107",
//        );
//        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//        $response = json_decode($make_call, true);

    }
//    410528322   410516312  410575125  410536123  410573656
    if(isset($_POST["add_main_unit_01_stu"]) ) {
//        ==========================修微課程001===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410573656",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u001",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);


        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410516312",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u001",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);


        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u001",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);


        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410528322",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u001",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        //    410528322   410516312  410575125  410536123  410573656

        //        ==========================修微課程002===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u002",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410575125",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u002",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);


        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410516312",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u002",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410528322",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u002",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);




        //    410528322   410516312  410575125  410536123  410573656

        //        ==========================修微課程003===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410528322",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u003",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u003",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);
        //    410528322   410516312  410575125  410536123  410573656

        //        ==========================修微課程004===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410573656",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u004",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u004",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410516312",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u004",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410528322",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u004",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);


        //    410528322   410516312  410575125  410536123  410573656

        //        ==========================修微課程005===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410528322",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410516312",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410575125",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410573656",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u005",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        //    410528322   410516312  410575125  410536123  410573656

        //        ==========================修微課程006===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410528322",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410516312",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410575125",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410573656",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u006",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        //    410528322   410516312  410575125  410536123  410573656

        //        ==========================修微課程007===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410575125",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u007",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u007",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410573656",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u007",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);
        //        ==========================修微課程008===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410528322",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u008",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410516312",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u008",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410575125",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u008",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);
        //        ==========================修微課程009===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410516312",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u009",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410575125",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u009",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u009",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);
        //        ==========================修微課程010===============================================
        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410575125",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u010",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410536123",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u010",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);

        $data_array = array(
            "select_record_id" => uniqid(rand()),
            "semester_list" => "resource:org.example.empty.semester_list#107",
            "attend_status" => "ABSENCE",
            "pass_status" => false,
            "score" => 0,
            "student" => "resource:org.example.empty.student#410573656",
            "unit_course" => "resource:org.example.empty.unit_course#farm_u010",
            "main_course" => "resource:org.example.empty.Main_course#farm_M001",
        );
        $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
        $response = json_decode($make_call, true);
    }
//    =======================================
    if(isset($_POST["add_main_unit_02"])){

            $data_array = array(
                "Main_course_id" => "farm_M002",
                "name" => "網頁概念",
                "credit" => 2,
                "department" => "resource:org.example.empty.department#farmer_Dep_001",
                "external_status" => true,
                "pass_hours" => 8,
                "use_status" => true,
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
            $response = json_decode($make_call, true);
            $data_array = array(
                "unit_course_id" => "farm_u101",
                "name" => "網頁運作原理",
                "start_time" => "2019/03/25 14:00",
                "end_time" => "2019/03/25 16:00",
                "hours" => 2,
                "weeks" => "一",
                "department" => "resource:org.example.empty.department#dep001",
                "teacher" => "resource:org.example.empty.teacher#tr001",
                "max_stu" => 20,
                "classroom" => "resource:org.example.empty.classroom#001",
                "pass_score" => 75,
                "selection_course_people" => 12,
                "introduction" => "XXX",
                "use_status" => true,
                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
                "semester" => "resource:org.example.empty.semester_list#107",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
            $response = json_decode($make_call, true);


            $data_array = array(
                "unit_course_id" => "farm_u102",
                "name" => "網頁前端",
                "start_time" => "2019/03/26 14:00",
                "end_time" => "2019/03/26 16:00",
                "hours" => 2,
                "weeks" => "二",
                "department" => "resource:org.example.empty.department#dep001",
                "teacher" => "resource:org.example.empty.teacher#tr001",
                "max_stu" => 20,
                "classroom" => "resource:org.example.empty.classroom#001",
                "pass_score" => 75,
                "selection_course_people" => 12,
                "introduction" => "XXXX",
                "use_status" => true,
                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
                "semester" => "resource:org.example.empty.semester_list#107",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "unit_course_id" => "farm_u103",
                "name" => "網頁後端",
                "start_time" => "2019/03/27 14:00",
                "end_time" => "2019/03/27 17:00",
                "hours" => 3,
                "weeks" => "三",
                "department" => "resource:org.example.empty.department#dep001",
                "teacher" => "resource:org.example.empty.teacher#tr001",
                "max_stu" => 20,
                "classroom" => "resource:org.example.empty.classroom#001",
                "pass_score" => 75,
                "selection_course_people" => 12,
                "introduction" => "XXXX",
                "use_status" => true,
                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
                "semester" => "resource:org.example.empty.semester_list#107",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
            $response = json_decode($make_call, true);


            $data_array = array(
                "unit_course_id" => "farm_u104",
                "name" => "網頁版型設計",
                "start_time" => "2019/03/28 14:00",
                "end_time" => "2019/03/28 16:00",
                "hours" => 2,
                "weeks" => "四",
                "department" => "resource:org.example.empty.department#dep001",
                "teacher" => "resource:org.example.empty.teacher#tr001",
                "max_stu" => 20,
                "classroom" => "resource:org.example.empty.classroom#001",
                "pass_score" => 75,
                "selection_course_people" => 12,
                "introduction" => "XXXXX",
                "use_status" => true,
                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
                "semester" => "resource:org.example.empty.semester_list#107",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "unit_course_id" => "farm_u105",
                "name" => "網站架設",
                "start_time" => "2019/03/30 13:30",
                "end_time" => "2019/03/30 16:00",
                "hours" => 3,
                "weeks" => "六",
                "department" => "resource:org.example.empty.department#dep001",
                "teacher" => "resource:org.example.empty.teacher#tr001",
                "max_stu" => 20,
                "classroom" => "resource:org.example.empty.classroom#001",
                "pass_score" => 60,
                "selection_course_people" => 12,
                "introduction" => "XXXX",
                "use_status" => true,
                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
                "semester" => "resource:org.example.empty.semester_list#107",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
            $response = json_decode($make_call, true);


//            $data_array = array(
//                "unit_course_id" => "farm_u106",
//                "name" => "參訪設施蔬菜農場",
//                "start_time" => "2019/05/01 14:00",
//                "end_time" => "2019/05/01 16:00",
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
//                "unit_course_id" => "farm_u107",
//                "name" => "參訪全聯果菜生產合作社運銷業務",
//                "start_time" => "2019/05/02 14:00",
//                "end_time" => "2019/05/02 16:00",
//                "hours" => 2,
//                "weeks" => "四",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 30,
//                "classroom" => "resource:org.example.empty.classroom#001",
//                "pass_score" => 65,
//                "selection_course_people" => 12,
//                "introduction" => "XXXXX",
//                "use_status" => true,
//                "Main_course" => "resource:org.example.empty.Main_course#farm_M002",
//                "semester" => "resource:org.example.empty.semester_list#107",
//            );
//            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
//            $response = json_decode($make_call, true);
//
//
//
//            $data_array = array(
//                "unit_course_id" => "farm_u108",
//                "name" => "路葡萄酒莊葡萄栽培技術訪談與葡萄加工製程",
//                "start_time" => "2019/05/05 13:00",
//                "end_time" => "2019/05/05 16:30",
//                "hours" => 4,
//                "weeks" => "日",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 25,
//                "classroom" => "resource:org.example.empty.classroom#001",
//                "pass_score" => 80,
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
//                "unit_course_id" => "farm_u109",
//                "name" => "農機操作事項講解與實作",
//                "start_time" => "2019/05/15 14:00",
//                "end_time" => "2019/05/15 16:00",
//                "hours" => 2,
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
//            $data_array = array(
//                "unit_course_id" => "farm_u110",
//                "name" => "農務e把抓介紹",
//                "start_time" => "2019/05/21 14:00",
//                "end_time" => "2019/05/21 16:00",
//                "hours" => 2,
//                "weeks" => "二",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 30,
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
//
//            $data_array = array(
//                "unit_course_id" => "farm_u111",
//                "name" => "農民產銷組織申請與輔導",
//                "start_time" => "2019/05/22 08:00",
//                "end_time" => "2019/05/22 09:00",
//                "hours" => 1,
//                "weeks" => "三",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 30,
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
//                "unit_course_id" => "farm_u112",
//                "name" => "花卉田間操作",
//                "start_time" => "2019/05/22 14:00",
//                "end_time" => "2019/05/22 16:00",
//                "hours" => 2,
//                "weeks" => "三",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 30,
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
//                "unit_course_id" => "farm_u113",
//                "name" => "果樹田間操作實務",
//                "start_time" => "2019/05/22 10:00",
//                "end_time" => "2019/05/22 12:00",
//                "hours" => 2,
//                "weeks" => "三",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 30,
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
//                "unit_course_id" => "farm_u114",
//                "name" => "經營計畫書撰寫與評量",
//                "start_time" => "2019/05/22 16:00",
//                "end_time" => "2019/05/22 18:00",
//                "hours" => 2,
//                "weeks" => "三",
//                "department" => "resource:org.example.empty.department#dep001",
//                "teacher" => "resource:org.example.empty.teacher#tr001",
//                "max_stu" => 30,
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
    }
    if(isset($_POST["add_main_unit_02_stu"]) ) {

//        ==========================修微課程001===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u101",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);


            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410516312",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u101",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);


            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u101",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);


            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410528322",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u101",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            //    410528322   410516312  410575125  410536123  410573656

            //        ==========================修微課程002===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u102",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u102",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);


            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410516312",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u102",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410528322",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u102",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);




            //    410528322   410516312  410575125  410536123  410573656

            //        ==========================修微課程003===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410528322",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u103",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u103",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);
            //    410528322   410516312  410575125  410536123  410573656

            //        ==========================修微課程004===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u104",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u104",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410516312",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u104",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410528322",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u104",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);


            //    410528322   410516312  410575125  410536123  410573656

            //        ==========================修微課程005===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410528322",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410516312",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u105",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            //    410528322   410516312  410575125  410536123  410573656

            //        ==========================修微課程006===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410528322",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410516312",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u106",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            //    410528322   410516312  410575125  410536123  410573656

            //        ==========================修微課程007===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u107",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u107",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u107",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);
            //        ==========================修微課程008===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410528322",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u108",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410516312",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u108",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u108",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);
            //        ==========================修微課程009===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410516312",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u109",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u109",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u109",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);
            //        ==========================修微課程010===============================================
            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u110",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410536123",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u110",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u110",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u111",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u112",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410573656",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u114",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u113",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u114",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

            $data_array = array(
                "select_record_id" => uniqid(rand()),
                "semester_list" => "resource:org.example.empty.semester_list#107",
                "attend_status" => "ABSENCE",
                "pass_status" => false,
                "score" => 0,
                "student" => "resource:org.example.empty.student#410575125",
                "unit_course" => "resource:org.example.empty.unit_course#farm_u111",
                "main_course" => "resource:org.example.empty.Main_course#farm_M002",
            );
            $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.select_record', json_encode($data_array));
            $response = json_decode($make_call, true);

    }

if(isset($_POST["add_main_unit_03"])) {

    $data_array = array(
        "Main_course_id" => "APP_M002",
        "name" => "進階APP實作",
        "credit" => 2,
        "department" => "resource:org.example.empty.department#farmer_Dep_001",
        "external_status" => true,
        "pass_hours" => 8,
        "use_status" => true,
    );
    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.Main_course', json_encode($data_array));
    $response = json_decode($make_call, true);
    $data_array = array(
        "unit_course_id" => "APP_u101",
        "name" => "APP運作原理",
        "start_time" => "2019/03/25 14:00",
        "end_time" => "2019/03/25 16:00",
        "hours" => 2,
        "weeks" => "一",
        "department" => "resource:org.example.empty.department#dep001",
        "teacher" => "resource:org.example.empty.teacher#tr_420052322",
        "max_stu" => 20,
        "classroom" => "resource:org.example.empty.classroom#001",
        "pass_score" => 75,
        "selection_course_people" => 12,
        "introduction" => "APP的原理",
        "use_status" => true,
        "Main_course" => "resource:org.example.empty.Main_course#APP_M002",
        "semester" => "resource:org.example.empty.semester_list#107",
    );
    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
    $response = json_decode($make_call, true);


    $data_array = array(
        "unit_course_id" => "APP_u102",
        "name" => "APP版面設計",
        "start_time" => "2019/03/26 14:00",
        "end_time" => "2019/03/26 16:00",
        "hours" => 2,
        "weeks" => "二",
        "department" => "resource:org.example.empty.department#dep001",
        "teacher" => "resource:org.example.empty.teacher#tr_420052322",
        "max_stu" => 20,
        "classroom" => "resource:org.example.empty.classroom#001",
        "pass_score" => 75,
        "selection_course_people" => 12,
        "introduction" => "前端版面設計",
        "use_status" => true,
        "Main_course" => "resource:org.example.empty.Main_course#APP_M002",
        "semester" => "resource:org.example.empty.semester_list#107",
    );
    $make_call = callAPI('POST', 'http://120.110.112.152:3000/api/org.example.empty.unit_course', json_encode($data_array));
    $response = json_decode($make_call, true);
}
?>
</body>
</html>