<?php 
    require_once 'header.php';
    if(isset($_POST['save_book'])){
        $book_name = $_POST['book_name'];
        $book_author_name = $_POST['book_author_name'];
        $book_publication_name = $_POST['book_publication_name'];
        $book_purchase_date = $_POST['book_purchase_date'];
        $book_price = $_POST['book_price'];
        $book_qty = $_POST['book_qty'];
        $available_qty = $_POST['available_qty'];
        $librarian_username = $_SESSION['librarian_username'];

        $image = explode('.' , $_FILES['book_image']['name']);
        $image_ext = end($image);
        $image = date('Ymdhis.'). $image_ext;

        $sql ="INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$librarian_username')";
        $result = mysqli_query($con , $sql);
        if($result){
            move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/' .$image);
            $success = "Data Saved Successfully !!";
        }else{
            $error = "Data Not Saved Please Try Again !";
        }
    }
?>
<!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                    <?php
                if(isset($success)){?>
                    <div class="alert alert-success" role="alert">
                        <?= $success ;?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
            ?>
            <?php
                if(isset($error)){?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ;?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
            ?>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                        <h5 class="mb-lg">Add Books</h5>

                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                            <div class="col-sm-8">
                                                <input type="file" id="book_image" name="book_image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name" class="col-sm-4 control-label">Publication Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_publication_name" placeholder="publication Name" name="book_publication_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name" class="col-sm-4 control-label">Author Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="book_author_name" placeholder="Book Author Name" name="book_author_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="book_purchase_date" placeholder="Book Purchase Date" name="book_purchase_date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for=" book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="book_qty" placeholder="Book Quantity" name="book_qty">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for=" available_qty" class="col-sm-4 control-label">Availibale Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="available_qty" placeholder="Availibale Quantity" name="available_qty">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-8">
                                                <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
<?php 
    require_once 'footer.php';
?>