<?php
    if( isset($_POST["add_unit_course"]) ) {
        $unit_course_id = $_POST["add_unit_course"];
        switch (strtoupper($unit_course_id)){
            case "a001":
                $_SESSION["A"]["a001"]["id"]="a001";
                $_SESSION["A"]["a001"]["name"]="微課程a001";
                $_SESSION["A"]["a001"]["resource"]="resource:org.example.empty.unit_course#a001";
                break;
        }
        
    }
    else if( isset($_POST["del_unit_course"]) ){
        $unit_course_id = $_POST["del_unit_course"];
    }
    else if( isset($_POST["like"]) ){
        $unit_course_id = $_POST["like"];
        switch (strtoupper($unit_course_id)){
            case "a001":
                $_SESSION["A"]["a001"]["id"]="a001";
                $_SESSION["A"]["a001"]["name"]="微課程a001";
                $_SESSION["A"]["a001"]["resource"]="resource:org.example.empty.unit_course#a001";
                break;
                
        }
    }
?>