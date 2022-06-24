<?php
    require_once '../dbcon.php';
    $sql = "SELECT * FROM `students`";
    $result = mysqli_query($con , $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print All Students</title>
    <style>
        body{
            margin:0px;
            padding: 0px;
            font-family: kalpurush;
        }
        .print-area{
            width: 750px;
            height : 1050px;
            margin : 0 auto;
            box-sizing : border-box;
            page-break-after : always;
        }
        .header , .page-info{
            text-align: center;
        }
        .header h3{
            margin: 5px 0;
            
        }
        .data-info{}
        .data-info table{
            width : 100%;
            border-collapse : collapse;
        }
        .data-info table th , .data-info table td{
            border : 1px solid #555;
            padding : 4px;
            line-height : 1em;
        }
    </style>
</head>
<body onload="window.print()">
<?php
    $sl = 1;
    $page = 1;
    $total = mysqli_num_rows($result);
    $par_page = 10;
    while($row = mysqli_fetch_assoc($result)){
        if($sl % $par_page == 1){
            echo page_header();
        }
        ?>
   
                <tr>
                    <td><?= $sl ; ?></td>
                    <td><?= $row['fname'].' '.$row['lname']?></td>
                    <td><?= $row['roll'] ?></td>
                    <td><?= $row['reg'] ?></td>
                    <td><?= $row['email'] ?></td>
                </tr>

 <?php 
 if($sl % $par_page == 0 || $total == $par_page){
    echo page_footer($page++);
}
    $sl++;
} ?>    
</body>
</html>
<?php
    function page_header(){
        $data='
        <div class="print-area">
        <div class="header">
            <h3>Smart Soft IT Rangpur</h3>
            <h3>স্মার্ট সফট আইটি , রংপুর</h3>
        </div>
        <div class="data-info">
            <table>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Roll</th>
                    <th>Reg</th>
                    <th>Email</th>
                </tr>
        ';
        return $data;
    }
    function page_footer($page){
        $data='
        </table>
            <div class="page-info">page:- '.$page.'</div>
        </div>
    </div>
        ';
        return $data;
    }
?>