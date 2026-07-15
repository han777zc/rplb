<?php
require 'controller/controluser.php';
$id = $_GET["id"];
   
  if (hapus($id) > 0) {
               echo "<script>
                    alert('data berhasil dihapus!');
                    window.location.href = 'users.php';
                </script>";
        } else {
            echo "<script>
                    alert('data gagal dihapus!');   
                </script>"; 
        }


?>