<?php
  
  $kode = $_POST['kode'];
  $judul = $_POST['judul'];
  $pengarang = $_POST['pengarang'];
  $tt = $_POST['tt'];
  $penerbit = $_POST['penerbit'];
  $jh = $_POST['jh'];
  $kategori = $_POST['kategori'];
  $cover_img = $_POST['cover_img'];

  $file = fopen("data.txt", "r");
  $data = "";

  while (!feof($file)) {
    $line = fgets($file);
    $line = explode("|", $line);

    if (!($line[0] < 2) || ($line[0] == 1)) {
      if ($line[0] == $kode) {
        $line[1] = $judul;
        $line[2] = $pengarang;
        $line[3] = $tt;
        $line[4] = $penerbit;
        $line[5] = $jh;
        $line[6] = $kategori ;
        $line[7] = $cover_img . PHP_EOL;
      }
      $data .= $line[0] . "|" . $line[1] . "|" . $line[2] . "|" . $line[3]. "|" . $line[4]
      . "|" . $line[5]. "|" . $line[6] . "|" . $line[7];   
      
    }
    if(file_put_contents($filename, $data, FILE_APPEND)){
      echo 'Form data has been saved to '.$filename ;
    }
    else{
      echo 'Insert Data Failed';
    }
  }
  
  // $data = substr($data, 0, -1);
  fclose($file);

  $file = fopen("data.txt", "w");

  fwrite($file, $data);
  fclose($file);

  header("Location: read.php");
?>
