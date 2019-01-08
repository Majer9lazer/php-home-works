<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 9:08
 *
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task_1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<div class="container-fluid">
    <h3>Попытайтесь выбрать что нибудь</h3>
    <div class="row">

        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="chooseSomethingList" data-toggle="list"
                   href="#chooseList"
                   role="tab" aria-controls="choose">Choose something</a>
                <a class="list-group-item list-group-item-action" id="allRecordsList" data-toggle="list"
                   href="#recordsList"
                   role="tab" aria-controls="records">All Records</a>

            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="chooseList" role="tabpanel"
                     aria-labelledby="chooseSomethingList">...
                </div>
                <div class="tab-pane fade show" id="recordsList" role="tabpanel" aria-labelledby="allRecordsList">
                    <h4 id="loadingHeader">Loading .</h4>
                    <table class="table table-hover table-striped" hidden id="allRecordsTable">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <td>Description</td>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<body>

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
<!--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"-->
<!--        crossorigin="anonymous"></script>-->
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
<script>
    $(document).ready(function () {
        $('#allRecordsList').on('show.bs.tab', function (e) {
            let counter = 1;
            let loadingTimer = setInterval(function () {
                if (counter === 1) {
                    counter++;
                    $('#loadingHeader').text('Loading .');
                } else if (counter === 2) {
                    counter++;
                    $('#loadingHeader').text('Loading ..');
                } else {
                    $('#loadingHeader').text('Loading ...');
                    counter = 1;
                }
            }, 150);
            $('#allRecordsTable tbody').empty();

            $('#loadingHeader').removeAttr('hidden');
            $('#allRecordsTable').attr('hidden', 'true');
            $.post('request.php', function (data) {
                let cars = JSON.parse(data);
                $.each(cars, function (index, value) {
                    var markup = "<tr>" +
                        "<td>" + value['name'] + "</td>" +
                        "<td>" + value['description'] + "</td>" +
                        "</tr>";
                    $('#allRecordsTable tbody').append(markup);
                });
                clearInterval(loadingTimer);
                $('#allRecordsTable').removeAttr('hidden');
                $('#loadingHeader').attr('hidden', 'true');
            });
        })

    });

</script>
</html>
