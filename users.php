<?php 
require 'controller/controluser.php';
    $users =tampil("SELECT * FROM user");
    if (isset($_POST["cari"])) {
        $users = cari($_POST["keyword"]);
   
    }

?>
<?php  include 'partials/cms/header.php';?>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Users</h1>
                        <a href="tambahuser.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
                    </div>

                    <!-- Content Row -->
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                            <div class="row">
                                <div class="col-9">
                                        <h6 class="mt-2 font-weight-bold text-primary">DataTables Example</h6>
                                </div>
                                
                                <div class="col-3">     
                          <form action="" method="post"
                          class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input name= "keyword" type="text" class="form-control bg-white border-0 small" placeholder="Search for..."
                                        aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" name="cari">
                                                <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Gambar</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Gambar</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($users as $user) : ?>
                                        <tr>
                                            <td><?= $i++; ?>    </td>
                                            <td><?= $user["username"]; ?></td>
                                            <td><?= $user["email"]; ?></td>
                                            <td ><?= $user["password"]; ?></td>
                                            <td><img src="images/<?= $user["gambar"]; ?>" alt="" width="100" height="100"></td>
                                            <td><?= $user["role"]; ?></td>
                                           
                                            <td><a href="/hapususer.php?id=<?= $user['id']; ?>" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                         <i class="fas fa-trash"></i>
                                                    </span>
                                                   
                                    </a>
                                           <a href="/edituser.php?id=<?= $user['id']; ?>" class="btn btn-warning btn-icon-split">
                                                    <span class="icon text-white-50">
                                                         <i class="fas fa-edit"></i>
                                                    </span>
                                                   
                                    </a>
                                </td>
                                        </tr>
                                        <?php endforeach; ?>
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                 

                   

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