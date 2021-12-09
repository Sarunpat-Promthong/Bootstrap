<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<style>
    .bg1 {
        background-color: rgb(255, 136, 0);
    }

    .bg2 {
        background-color: rgb(203, 245, 19);
    }

    .bg3 {
        background-color: rgb(110, 176, 252);
        width: 200px;
        height: 1420px;
        float: left;
    }

    .bg4 {
        background-color: rgb(44, 20, 180);
        text-align: center;
        width: 80%;
        height: 100px
    }
</style>

<body>
    <div class="container">
        <img src="https://www.scholarship.in.th/wp-content/uploads/2020/05/071818-sports-equipment-recreation-gym-fitness-adobestock_190038155.jpeg"
            class="img-fluid" alt="..." width="80%">
        <div class="container">
            <div class="col-12 bg3"></div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 20rem;">
                    <img src="https://www.matichon.co.th/wp-content/uploads/2021/07/2021-07-24T100202Z_705784928_SP1EH7O0RVADV_RTRMADP_3_OLYMPICS-2020-BDM-X-DOUBLES-GP.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">แบดมินตัน เป็นกีฬาชนิดหนึ่ง ที่ใช้ไม้ตีลูก ลูกสำหรับใช้ตีนั้น เรียกกันมาช้านานว่า "ลูกขนไก่" เพราะสมัยก่อนกีฬานี้ใช้ขนของไก่มาติดกับลูกบอลทรงกลมขนาดเล็ก ปัจจุบันลูกขนไก่ผลิตจากขนเป็ดที่คัดแล้ว</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 20rem;">
                    <img src="https://thethaiger.com/th/wp-content/uploads/sites/9/2019/07/USAsMatthewAnderson1jumpstospiketheballduringaVolleyballNationsLeagueFinalsmatchbetweentheUSAandFranceatCreditUnion1ArenainChicagoIllinoisonJuly102019.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">วอลเลย์บอล เป็นกีฬาที่แข่งขันกันระหว่าง 2 ทีม ทีมละ 6 คน รวมตัวรับอิสระ 1 คน โดยแบ่งแดนจากกันด้วยตาข่ายสูง แข่งทำคะแนนจากลูกบอลที่ตกในเขตแดนของฝ่ายตรงข้ามเพื่อตีลูกวอลเลย์บอลลงแดนศัตรู
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <button id="btnBack"> back </button>

                <div id="main">
                    <table  class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody id="tblPost">
                        </tbody>
                    </table>
                </div>

                <div id="detail">
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>UserID</th>
                            </tr>
                        </thead>
                        <tbody id="tblDetails">
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-12 bg4">
            </div>
        </div>
    </div>
</body>
<script>
    function showDetails(id) {
        $("#main").hide();
        $("#detail").show();

        // console.log(id);
        var url = "https://jsonplaceholder.typicode.com/posts/" + id

        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='detailROW'";
                line += "><td>" + data.id + "</td>"
                line += "<td><b>" + data.title + "</b><br/>"
                line += data.body + "</td>"
                line += "<td>" + data.userId + "</td>"
                line += "</tr>";
                $("#tblDetails").append(line);
            })
            .fail((xhr, err, status) => {

            })


    }

    function LoadPosts() {
        var url = "https://jsonplaceholder.typicode.com/posts"
        var i = 0;
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    // console.log(item);
                    i++;
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>"
                    line += "<td><b>" + item.title + "</b><br/>"
                    line += item.body + "</td>"
                    line += "<td><button onClick='showDetails(" + item.id + ");'>Link</button></td>"
                    line += "</tr>";
                    $("#tblPost").append(line);
                    if (i == 10) {
                        loadPost().stop();
                    };
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {

            })
    }

    $(() => {
        LoadPosts();
        $("#detail").hide();
        $("#btnBack").click(() => {
            $("#main").show();
            $("#detail").hide();
            $("#detailROW").remove();
        });
    })
</script>
</html>
