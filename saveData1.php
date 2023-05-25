<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Library_PHP_Fildzah.css">
    <title>Insert</title>
</head>
<body>
   <?php

   if(isset($_FILES['cover'])){
      $errors= array();
      $file_name = $_FILES['cover']['name'];
      $file_size =$_FILES['cover']['size'];
      $file_tmp =$_FILES['cover']['tmp_name'];
      $file_type=$_FILES['cover']['type'];
      $tmp = explode('.', $file_name);
      $file_ext = end($tmp);
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="Choose a JPEG, JPG or PNG file!";
      }
      
      if($file_size > 2097152){
         $errors[]="File size max 2 MB !";
      }
      
      if(empty($errors)==true){
      $folder = "cover/";
         move_uploaded_file($file_tmp,$folder.$file_name);
      }else{
         print_r($errors);
      }
   }

   $filename = "data.txt";

   $kode = $_POST['kode'];
   $judul = $_POST['judul'];
   $pengarang = $_POST['pengarang'];
   $tt = $_POST['tt'];
   $penerbit = $_POST['penerbit'];
   $jh = $_POST['jh'];
   $kategori = $_POST['kategori'];
 
    $f_data = $kode . '|' . $judul . '|' . $pengarang . '|' . 
            $tt . '|' . $penerbit . '|' . $jh . '|' . $kategori . '|' . $file_name . PHP_EOL;


   if (file_put_contents($filename, $f_data, FILE_APPEND)){
       echo "Form data has been saved to ".$filename ;
   }else {
       echo "Insert Data Failed\n";
   }
   

   echo '<a href="read.php">"</br>"Click here to read</a>';
   $file = fopen($filename, "a");
//    fwrite($file, $f_data);
   fclose($file);
   ?>
</body>
</html>