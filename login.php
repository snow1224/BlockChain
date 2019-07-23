<?php
session_start();

    if(isset($_POST["sub"])){
        $useraccount = trim($_POST["useraccount"]);
        $userpassword = trim($_POST["userpassword"]);
        $job = $_POST["job"];

//        login_Inspection_system($useraccount,$userpassword);
        if(empty($useraccount) || empty($userpassword)){
            echo '<form name="test" method="post" action="v1.login_system.php">';
            echo '<input type = "hidden" name = "is_empty" value="帳號/密碼空白"><br>';
            echo '</form>';
//            header("Location:v1.login_tr_and_stu.php");

        }
        $head="Location:v1.login_tr_and_stu.php";
        switch (strtolower($job)){
            case "stu":
                $url = 'http://120.110.112.152:3000/api/org.example.empty.student/'.$useraccount;
                $head = "Location:stu.php";
                break;
            case "tr":
                $url = 'http://120.110.112.152:3000/api/org.example.empty.teacher/'.$useraccount;
                $head = "Location:tr.php";
                break;
        }
        $get_data = callAPI('GET', $url, false);  //去學生欄位找$useraccount   若找不到會錯，若找的到
        $response = json_decode($get_data, true); // 把找到的結果解析
        if($response["id"] == $userpassword && $userpassword!=""){
            echo "帳號密碼正確喔! <br>";
            header($head);


        }else{
//            echo "帳號/密碼錯誤";
            header($head);
        }

    }


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

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }


?>