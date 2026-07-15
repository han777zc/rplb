<?php 
//koneksi database
$conn = mysqli_connect(
    "localhost",
    "root", 
    "",
    "post_rpl_b"
);
// masuk ke tabel users
 function tampil($data){
    global $conn;
    $result = mysqli_query($conn,$data);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] =$row;
    }   
    return $rows;
 }

    function tambah($data){
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $role = $data['role'];

        $gambar =upload();
        if ($gambar === 4){
            return false;
        }

        $QUERY = "INSERT INTO user VALUES (NULL, '$username','$email','$password', '$gambar', '$role')";
        global $conn;
        mysqli_query($conn,$QUERY);
        return mysqli_affected_rows($conn);

  
     }

     function upload(){
        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $tmpname = $_FILES['gambar']['tmp_name'];
        $error = $_FILES['gambar']['error'];

        //cek apakah tidak ada gambar yang diupload
    if ($error === 4){
      echo "<script>
                    alert('masukan gambar terlebih dahulu!');
                    window.location.href = 'tambahuser.php';
                </script>";

     }
     //cek ukuran file 
     if ($ukuranfile > 1000000){
        echo "<script>
                    alert('ukuran gambar terlalu besar!');
                    window.location.href = 'tambahuser.php';
                </script>";
     }
     //cek apakah yang diupload adalah gambar
     $ekstensiagambar= ['jpg','jpeg','png','jfif'];
     $pecahgambar = explode('.',$namafile);
     $pecahgambar = strtolower(end($pecahgambar));
        if (!in_array($pecahgambar,$ekstensiagambar)){
            echo "<script>
                        alert('File yang anda upload bukan gambar!');
                        window.location.href = 'tambahuser.php';
                    </script>";
     }
     move_uploaded_file($tmpname,'images/' . $namafile);
     return $namafile;
}
     function hapus($data){  
        $query = "DELETE FROM user WHERE id = $data";
        global $conn;
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
     }

    function ubah($data){
        global $conn;
        $id = $data['id'];
        $username = $data['username'];
        $password = $data['password'];
        $email = $data['email'];
        $gambar = $data['gambar'];
        $role = $data['role'];

        $QUERY = "UPDATE user SET 
        username = '$username',
        email = '$email',
        password = '$password',
        gambar = '$gambar',
        role = '$role'
        where id = $id
        ";
        global $conn;
        mysqli_query($conn,$QUERY);
        return mysqli_affected_rows($conn);
    }
    function cari ($data){
        $query = "SELECT * FROM user WHERE username like '%$data%'
         OR email like '%$data%' 
         OR role like '%$data%'";
        return tampil($query);
    }

     ?>