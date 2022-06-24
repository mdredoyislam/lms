<?php 
    require_once 'header.php';
?>
<div class="col-md-6 col-md-offset-3">
                    <!--PROFILE-->
                    <div>
                        <div class="profile-photo">
                            <img style="height:100px; width:100px" alt="User photo" src="../images/books/20200503094324.jpg">
                        </div>
                        <div class="user-header-info">
                            <h2 class="user-name">
                            <?php
                                if(!empty($librarian_info)){
                                    $librarian_info['firstname'].' '.$librarian_info['lastname'];
                                }else{
                                    echo "Libraian Name";
                                }
                            ?></h2>
                            <h5 class="user-position">LIBRARIAN</h5>
                            <div class="user-social-media">
                        </div>
                    </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                    <!--CONTACT INFO-->
                    <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
                        <div class="panel-content">
                            <h4 class=""><b>Contact Information</b></h4>
                            <ul class="user-contact-info ph-sm">
                                <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b>
                                <?php
                                    if(!empty($librarian_info)){ 
                                        $librarian_info['email'];
                                    }else{
                                        echo "example.librarian@gmail.com";
                                    }
                                ?>
                                </li>
                                <li><b><i class="color-primary mr-sm fa fa-user"></i></b>
                                <?php
                                    if(!empty($librarian_info)){ 
                                        $librarian_info['username'];
                                    }else{
                                        echo "Librarian User Name";
                                    }
                                ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
<?php 
    require_once 'footer.php';
?>