<?php
require 'controller/controluser.php';
$id = $_GET["id"];
$result =tampil("SELECT * FROM user WHERE id = $id")[0];
    if(isset($_POST['submit'])) {
        if (ubah($_POST) > 0) {
               echo "<script>
                    alert('data berhasil diubah!');
                    window.location.href = 'users.php';
                </script>";
        } else {
            echo "<script>
                    alert('data gagal diubah!');   
                </script>"; 
        }

    }


?>
<?php  
include 'partials/cms/header.php';
?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'partials/cms/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
              <?php include 'partials/cms/navbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    

                    <!-- Content Row -->
                              <div class="row">
                    <div class="col-lg-7 mx-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create data user!</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <input type="hidden" name="id" value="<?=$result["id"] ?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Username" name="username" value="<?=$result["username"] ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Password" name="password" value="<?= $result["password"] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" value="<?=$result["email"] ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Masukan gambar" name="gambar" value="<?=$result["gambar"] ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control mb-5 form-control-user"
                                            id="exampleRepeatPassword" placeholder="Role" name="role" value="<?=$result["role"] ?>">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user  btn-block" value="register account" name="submit">
                                
                            
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>

                    <!-- Content Row -->

                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'partials/cms/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
        <?php include 'partials/cms/modal.php';?>

</body>

</html>