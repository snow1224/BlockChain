<?php
if( isset($_POST["add"]) ) {
        $post_arr1 = explode(' ',$_POST["add"]);
        $main_course_id = $post_arr1[0];
        $unit_course_id = $post_arr1[1];       
        $unit_course_url = "http://120.110.112.152:3000/api/org.example.empty.unit_course/".$unit_course_id; //拿加選課程的資料
        $unit_course_encode = callAPI('GET', $unit_course_url, false);    
        $unit_course2 = json_decode($unit_course_encode, true);
        $_SESSION[$main_course_id][$unit_course_id]["id"]=$unit_course_id;
        $_SESSION[$main_course_id][$unit_course_id]["name"]=$unit_course2["name"];
        $_SESSION[$main_course_id][$unit_course_id]["resource"]="resource:org.example.empty.unit_course#".$unit_course_id;
        $_SESSION[$main_course_id][$unit_course_id]["main_resourse"]="resource:org.example.empty.Main_course#".$main_course_id;
        $_SESSION[$main_course_id][$unit_course_id]["semester"]=$unit_course2["semester"];
        }else if( isset($_POST["del_unit_course"]) ){
            $post_arr2 = explode(' ',$_POST["del_unit_course"]);
            $Main_course_id = $post_arr2[0];
            $unit_course_id = $post_arr2[1];
            unset($_SESSION[$Main_course_id][$unit_course_id]);
            if(count($_SESSION[$Main_course_id])==0) unset($_SESSION[$Main_course_id]);
        }else if(isset($_POST["mark_unit_course"]){
            $post_arr2 = explode(' ',$_POST["del_unit_course"]);
            $Main_course_id = $post_arr2[0];
            $unit_course_id = $post_arr2[1];
            
            
        }
        else if( isset($_POST["like"]) ){
            $post_arr1 = explode(' ',$_POST["like"]);
            $main_course_id = $post_arr1[0];
            $unit_course_id = $post_arr1[1];
            $unit_course_url = "http://120.110.112.152:3000/api/org.example.empty.unit_course/".$unit_course_id; //拿加選課程的資料
            $unit_course_encode = callAPI('GET', $unit_course_url, false);    
            $unit_course2 = json_decode($unit_course_encode, true);
            $mylike_id = uniqid(rand());
            $data_array2 =  array(
                            "mylike_id"                => $mylike_id,
                            "student"                  => "resource:org.example.empty.student#".$_SESSION["member"]["stu"]["account"],
                            "main_course"              => $unit_course2["Main_course"],
                            "unit_course"              => "resource:org.example.empty.unit_course#".$unit_course_id
            );
            callAPI('POST','http://120.110.112.152:3000/api/org.example.empty.mylike',json_encode($data_array2));
            $student_url = 'http://120.110.112.152:3000/api/org.example.empty.student/'.$_SESSION["member"]["stu"]["account"]; 
            $student_encode = callAPI('GET', $student_url, false);  // 尚未解析成JSON
            $student = json_decode($student_encode, true);
            $mylike = $student["mylike"];
            if(!in_array($main_course_id,$mylike)){
                array_push($mylike,$main_course_id);
            }
            else if(count($mylike)==0){
                array_push($mylike,$main_course_id);
            }
            $data_array3 =  array(
                            "mylike"                   => $mylike,
                            "academic_year"            => $student["academic_year"],
                            "degree"                   => $student["degree"],
                            "main_course_record"       => $student["main_course_record"],
                            "name"                     => $student["name"],
                            "email"                    => $student["email"],
                            "password"                 => $student["password"],
                            "department"               => $student["department"]
            );
            callAPI('PUT','http://120.110.112.152:3000/api/org.example.empty.student/'.$_SESSION["member"]["stu"]["account"],json_encode($data_array3));
            
        }else if( isset($_POST["select_course"]) ){
            foreach($_SESSION as $key0 => $value0){ 
                $student_url = 'http://120.110.112.152:3000/api/org.example.empty.student/'.$_SESSION["member"]["stu"]["account"]; 
                $student_encode = callAPI('GET', $student_url, false);  // 尚未解析成JSON
                $student = json_decode($student_encode, true);
                
                if($key0!="login" && $key0!="member" && $key0!="like" && $key0!="course" && is_array($_SESSION[$key0]) && !empty($_SESSION[$key0])){
                        if(!in_array($key0,$student["main_course_record"])){
                        array_push($student["main_course_record"],$key0);
                        $data_array3 =  array(
//                                "id"                       => $student["id"],
                                "mylike"                   => $student["mylike"],
                                "academic_year"            => $student["academic_year"],
                                "degree"                   => $student["degree"],
                                "main_course_record"       => $student["main_course_record"],
                                "name"                     => $student["name"],
                                "email"                    => $student["email"],
                                "password"                 => $student["password"],
                                "department"               => $student["department"]
                        );
                        callAPI('PUT','http://120.110.112.152:3000/api/org.example.empty.student/'.$_SESSION["member"]["stu"]["account"],json_encode($data_array3));
                        }
                    foreach ($_SESSION[$key0] as $key => $value){
                        $select_record_id = uniqid(rand());
                        $data_array =  array(
                            "select_record_id"  => $select_record_id,
                            "semester_list"     => $_SESSION[$key0][$key]["semester"],
                            "attend_status"     => "ATTEND",
                            "pass_status"       => false,
                            "score"             => 0,
                            "student"           => "resource:org.example.empty.student#".$_SESSION["member"]["stu"]["account"],
                            "unit_course"       => $_SESSION[$key0][$key]["resource"],
                            "main_course"       => $_SESSION[$key0][$key]["main_resourse"]
                        );
                        $make_call = callAPI('POST','http://120.110.112.152:3000/api/org.example.empty.select_record',json_encode($data_array));
                        $response = json_decode($make_call, true);
                        $url = 'http://120.110.112.152:3000/api/org.example.empty.unit_course/'.$key;
                        $get_data = callAPI('GET', $url, false);
                        $response = json_decode($get_data, true);
                        $data_array2 =  array(
//                            "unit_course_id"                => $response["unit_course_id"],
                            "name"                          => $response["name"],
                            "start_time"                    => $response["start_time"],
                            "end_time"                      => $response["end_time"],
                            "hours"                         => $response["hours"],
                            "weeks"                         => $response["weeks"],
                            "department"                    => $response["department"],
                            "teacher"                       => $response["teacher"],
                            "max_stu"                       => $response["max_stu"],
                            "classroom"                     => $response["classroom"],
                            "pass_score"                    => $response["pass_score"],
                            "selection_course_people"       => ($response["selection_course_people"]+1),
                            "introduction"                  => $response["introduction"],
                            "use_status"                    => $response["use_status"],
                            "Main_course"                   => $response["Main_course"],
                            "semester"                      => $response["semester"]
                        );
                        callAPI('PUT','http://120.110.112.152:3000/api/org.example.empty.unit_course/'.$key,json_encode($data_array2));
                    }
//                    echo "<script> alert('選課成功!'); </script>";
                }     
            }
            echo "<script> alert('選課成功!'); </script>";
        }else if( isset($_POST["del_mylike"] )){
            $post_arr2 = explode(' ',$_POST["del_mylike"]);
            $Main_course_id = $post_arr2[0];
            $unit_course_id = $post_arr2[1];
            
            $stu_mylike_url='http://120.110.112.152:3000/api/queries/select_mylike_and_unit_course?unitcourse=resource%3Aorg.example.empty.unit_course%23'.$unit_course_id.'&student=resource%3Aorg.example.empty.student%23'.$_SESSION["member"]["stu"]["account"];
            $stu_mylike_encode=callAPI('GET',$stu_mylike_url,false);
            $stu_mylike=json_decode($stu_mylike_encode,true);
            $del_mylike_url='http://120.110.112.152:3000/api/org.example.empty.mylike/'.$stu_mylike[0]["mylike_id"];
            $del_mylike_encode=callAPI('DELETE',$del_mylike_url,false);
            
            
            echo '<script>alert("刪除成功");</script>';
        }
        else if(isset($_POST["speed_add"]) ){
            $post_arr1 = explode(' ',$_POST["speed_add"]);
            $main_course_id = $post_arr1[0];
            $unit_course_id = $post_arr1[1];       
            $unit_course_url = "http://120.110.112.152:3000/api/org.example.empty.unit_course/".$unit_course_id; //拿加選課程的資料
            $unit_course_encode = callAPI('GET', $unit_course_url, false);    
            $unit_course2 = json_decode($unit_course_encode, true);
            $select_record_id = uniqid(rand());
            $data_array =  array(
                    "select_record_id"  => $select_record_id,
                    "semester_list"     => $unit_course2["semester"],
                    "attend_status"     => "ATTEND",
                    "pass_status"       => false,
                    "score"             => 0,
                    "student"           => "resource:org.example.empty.student#".$_SESSION["member"]["stu"]["account"],
                    "unit_course"       => "resource:org.example.empty.unit_course#".$unit_course2["unit_course_id"],
                    "main_course"       => $unit_course2["Main_course"]
            );
            
            $make_call = callAPI('POST','http://120.110.112.152:3000/api/org.example.empty.select_record',json_encode($data_array));
            $response = json_decode($make_call, true);
                $student_url = 'http://120.110.112.152:3000/api/org.example.empty.student/'.$_SESSION["member"]["stu"]["account"]; 
                $student_encode = callAPI('GET', $student_url, false);  // 尚未解析成JSON
                $student = json_decode($student_encode, true);
                
                    if(!in_array($main_course_id,$student["main_course_record"])){
                        array_push($student["main_course_record"],$main_course_id);
                        $data_array3 =  array(
//                                "id"                       => $student["id"],
                                "mylike"                   => $student["mylike"],
                                "academic_year"            => $student["academic_year"],
                                "degree"                   => $student["degree"],
                                "main_course_record"       => $student["main_course_record"],
                                "name"                     => $student["name"],
                                "email"                    => $student["email"],
                                "password"                 => $student["password"],
                                "department"               => $student["department"]
                        );
                        callAPI('PUT','http://120.110.112.152:3000/api/org.example.empty.student/'.$_SESSION["member"]["stu"]["account"],json_encode($data_array3));
                    }
        }
?>
