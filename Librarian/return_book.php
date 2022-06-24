<?php 
    require_once 'header.php';
    $sql = "SELECT `book_issue`.`id`,`book_issue`.`book_id`,`book_issue`.`book_issue_date`,`students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phone`,`books`.`book_name`,`books`.`book_image`
    FROM `book_issue`
    INNER JOIN `students` ON `students`.`id` = `book_issue`.`student_id`
    INNER JOIN `books` ON `books`.`id` = `book_issue`.`book_id`
    WHERE `book_issue`.`book_return_date` = ''";
    $result = mysqli_query($con , $sql);
?>
<!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Reurn Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                        <h4 class="section-subtitle"><b>Reurn Books</b></h4>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="table-responsive">
                                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Roll</th>
                                            <th>Phone</th>
                                            <th>Book Name</th>
                                            <th>Book Issue Date</th>
                                            <th>Return Book</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                            while($row = mysqli_fetch_assoc($result)){?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= ucwords($row['fname'] ." ". $row['lname']) ?></td>
                                                    <td><?= $row['roll'] ?></td>
                                                    <td><?= $row['phone'] ?></td>
                                                    <td><?= $row['book_name'] ?></td>
                                                    <td><?= $row['book_issue_date'] ?></td>
                                                    <td><a href="return_book.php?id=<?= $row['id'] ?>&bookid=<?= $row['book_id'] ?>">Return Book</a></td>
                                                </tr>
                                            <?php $i++; }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $bookid = $_GET['bookid'];
                        $date = date('d-m-y');
                        $result1 = mysqli_query($con , "UPDATE `book_issue` SET `book_return_date`='$date'  WHERE `id` = '$id'");
                        if($result1){
                            mysqli_query($con , "UPDATE `books` SET `available_qty` = `available_qty` +1 WHERE id = '$bookid'");
                            ?>
                            <script>
                                alert('Book Return Successfully');
                               history.go(-1);
                            </script>
                            <?php
                        }else{
                            ?>
                            <script>
                                alert('Somthing Went Wrong Please Try Again !!');
                            </script>
                            <?php
                        }
                    }
                    
                ?>
<?php 
    require_once 'footer.php';
?>