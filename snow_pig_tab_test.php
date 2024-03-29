<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://static.pengyaou.com/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
    <script src="https://static.pengyaou.com/js/jquery-1.8.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>側邊Tab加上開課</title>
    <meta charset="UTF-8">
</head>
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

<div id="accordion" class="w3-row-padding">
    <div class="card">
        <div id="N_main_response" style="background-color:#0353A4" ; class="card-header">
            <button data-target="#N_main_response_list" style="color: white;" aria-controls="N_main_response_list" class="btn btn-link" data-toggle="collapse" aria-expanded="false">
                <h3>A主課程名稱</h3>
            </button>

        </div>
        <div id="N_main_response_list" aria-labelledby="N_main_response" class="collapse">
            <div id="main_N_unit_response table" style="background-color: #B9D6F2;">
                <button data-target="#main_N_unit_response_stu" table style="color: black;" aria-controls="main_N_unit_response_stu" class="btn btn-link" data-toggle="collapse">
                    <h3>A微課程名稱</h3>
                </button>
            </div>

        </div>
        <div id="main_N_unit_response_stu" aria-labelledby="main_N_unit_response_stu" class="collapse">
            <!--                    <div id="TabMain">-->
            <div class="tabItemContainer">
                <li><a>第一堂課</a></li>
                <li><a>第二堂課</a></li>
                <li><a>第三堂課</a></li>
            </div>
            <div class="tabBodyContainer">
                <div class="tabBodyItem tabBodyCurrent">
                    <table  class="table table-striped">
                        <thead><tr> <th>學號</th> <th>姓名</th> <th>出缺席</th>  <th>分數</th> </tr></thead>
                        <tbody>
                        <tr>
                            <td>410555888</td>
                            <td>羊駝</td>
                            <td>測試</td>
                            <td>測試</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tabBodyItem">
                    <p>第二堂課?</p>
                    <p></p>
                </div>
                <div class="tabBodyItem">
                    <p>第三堂課??</p>
                    <p></p>
                </div>
            </div>
            <!--                    </div>-->

        </div>

        <div id="N_main_response2" style="background-color:#0353A4" ; class="card-header">
            <button data-target="#N_main_response_list2" style="color: white;" aria-controls="N_main_response_list2" class="btn btn-link" data-toggle="collapse" aria-expanded="false">
                <h3>A主課程名稱</h3>
            </button>

        </div>
        <div id="N_main_response_list2" aria-labelledby="N_main_response" class="collapse">
            <div id="main_N_unit_response table2" style="background-color: #B9D6F2;">
                <button data-target="#main_N_unit_response_stu2" table style="color: black;" aria-controls="main_N_unit_response_stu2" class="btn btn-link" data-toggle="collapse">
                    <h3>A微課程名稱</h3>
                </button>
            </div>

        </div>
        <div id="main_N_unit_response_stu2" aria-labelledby="main_N_unit_response_stu2" class="collapse">
            <!--                    <div id="TabMain">-->
            <div class="tabItemContainer">
                <li><a>第一堂課</a></li>
                <li><a>第二堂課</a></li>
                <li><a>第三堂課</a></li>
            </div>
            <div class="tabBodyContainer">
                <div class="tabBodyItem tabBodyCurrent">
                    <table  class="table table-striped">
                        <thead><tr> <th>學號</th> <th>姓名</th> <th>出缺席</th>  <th>分數</th> </tr></thead>
                        <tbody>
                        <tr>
                            <td>410555888</td>
                            <td>羊駝</td>
                            <td>測試</td>
                            <td>測試</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tabBodyItem">
                    <p>第二堂課?</p>
                    <p></p>
                </div>
                <div class="tabBodyItem">
                    <p>第三堂課??</p>
                    <p></p>
                </div>
            </div>
            <!--                    </div>-->

        </div>
    </div>
</div>



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