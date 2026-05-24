<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 70%;
            background-color: gray;
            margin: auto;
            text-align: center;
        }

        .data {
            
            color: black;
            
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>JSON Data</h1>
        <div class="data">
            <table id="load-data" border="1px"  cellspacing="11px" width="100%">
                <tr>
                    <th>student_id</th>
                    <th>institute_name1</th>
                    <th>board_name1</th>
                    <th>total_marks1</th>
                    <th>obtained_marks1</th>
                    <th>percentage_marks1</th>
                    <th>name1</th>
                </tr>
            </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        // $.ajax({
        //     url: "encode.php",
        //     type: "POST",
        //     data: {
        //         id: 53
        //     },
        //     dataType: "JSON",
        //     success: function(data) {
        //         $.each(data, function(key, value) {
        //             $(".data").append(value.board_name1 + " " + value.institute_name1 + " " +
        //                 value.name1 + " " + value.obtained_marks1 + " " +
        //                 value.percentage_marks1 + " " + value.obtained_marks1 + " " +
        //                 value.student_id + +" " + value.total_marks1 + "</br>"
        //             )
        //         })
        //     }
        // });
        $.getJSON(
            "encode.php",
            function(data) {
                $.each(data, function(key, value) {
                    $("#load-data").append("<tr><td>"+value.student_id + " </td><td> " + value.institute_name1 + " </td><td> " + 
                        value.board_name1 + " </td><td> " + value.total_marks1 + " </td><td> " + 
                        value.obtained_marks1 + " </td><td> " + value.percentage_marks1 + " </td><td> " + 
                        value.name1 +" </td></tr>"
                    )
                })
            }
        );
    </script>

</body>

</html>