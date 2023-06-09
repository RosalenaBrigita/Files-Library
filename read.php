<?php 
 if (isset($_GET['kode'])) {
   $kode = $_GET['kode'];
   deletedata($kode);
 }

 function deletedata($kode)
 {
   $file = fopen("data.txt", "r");
   $temp = fopen("temp.txt", "w");

   while (!feof($file)) {
     $line = fgets($file);
     $data = explode("|", $line);
     if ($data[0] != $kode) {
       fwrite($temp, $line);
     }
   }

   fclose($file);
   fclose($temp);

   unlink("data.txt");
   rename("temp.txt", "data.txt");

   header("Location: read.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https:cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https:cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" href="https:unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https:unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <script src="https:kit.fontawesome.com/2365b8dab9.js" crossorigin="anonymous"></script>

    <style>
        #update {
            color:green;
        }
        #delete {
            color:red;
        }
        th, td { white-space: nowrap; }
        div.dataTables_wrapper {
            width: 800px;
            margin: 0 auto;
        }
        a {
            text-decoration : none;
        }
        center {
            margin :20px;
        }
    </style>

    <title>PERPUSTAKAAN</title>
</head>
<body>
    <div class="sidebar close">
     
            <div class="logo-details">
                <i class='bx bxs-data'></i>
            <span class="logo_name">LIBRARY</span>           

            </div>
       
            <ul class="nav-links">
            <li>
                <div class="iocn-link">
                <a href="<?php echo "list.php"; ?>">
                <i class="fa fa-book" aria-hidden="true"></i>
                    <span class="link_name">DATA BUKU</span>
                </a>
                </div>
                <ul class="sub-menu">
                <li><a class="link_name" href="#">Data Buku</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                <a href="<?php echo "read.php"; ?>" class="active">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                    <span class="link_name">EDIT DATA</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                <li><a class="link_name" href="<?php echo "read.php";?>">Edit Database</a></li>
                <li><a href="<?php echo "form.php"; ?>">Insert Data</a></li>
                </ul>
            </li> 
            <li>
                    <div class="iocn-link">
                    <a href="<?php echo "data.txt"; ?>" >
                    <i class="fa fa-file-text" aria-hidden="true"></i>
                        <span class="link_name">Text File</span>
                    </a>
                    </div>
                    <ul class="sub-menu">
                    <li><a class="link_name" href="#">Text file</a></li>
                    </ul>
            </li>
        </ul>
    </div>

    <section class="dashboard">
        <div class="top">
            <div class="sidebar-button">
                <i class='bx bx-menu sidebar-toggle'></i>
            </div>
           
            <div class="profile-details">
                <span class="admin_name">Rosalena Brigita</span>
                <i class='bx bx-chevron-down' ></i>
            </div>
        </div>
        

        <div class="dash-content">
            <div class="database">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Database Perpustakaan</span>
                </div>

                <div class="database-data">
                    <div class="center">
                        <table id="example" class="stripe row-border order-column" style="width:100%" >
                            <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Penerbit</th>
                                <th>Jumlah Halaman</th>
                                <th>Kategori</th>
                                <th>cover</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $handle = fopen("data.txt", "r");
                                if ($handle) {
                                while (($line = fgets($handle)) !== false) {
                                    // proces the line read
                                    // echo $line;

                                    $data_explode = explode("|", $line);
                                    if ((!($data_explode[0] < 2)) || ($data_explode[0] == 1)) {
                                    echo "
                                        <tr>
                                        <td> $data_explode[0] </td>
                                        <td> $data_explode[1] </td>
                                        <td> $data_explode[2] </td>
                                        <td> $data_explode[3] </td>
                                        <td> $data_explode[4] </td>
                                        <td> $data_explode[5] </td>
                                        <td> $data_explode[6] </td>
                                        <td> <a href = $data_explode[7] target='$data_explode[7]'>$data_explode[7]</a></td>";
                                    echo'  
                                        <td><center>
                                                <a href="update.php?kode=' . $data_explode[0] . '"><i class="fa-sharp fa-solid fa-pen" id="update"></i></a>
                                                <a href="?kode=' . $data_explode[0] . '">&nbsp;&nbsp;&nbsp<i class="fa-solid fa-trash" id="delete"></i></a>
                                        
                                        </center></td>
                                        </tr>';
                                    }
                                }

                                fclose($handle);
                                } else {
                                echo "Error: File not found";
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--<script src="script.js"></script>-->
    <script>
        
        const body = document.querySelector("body"),
        modeToggle = body.querySelector(".mode-toggle");
        sidebar = body.querySelector(".sidebar");
        sidebarToggle = body.querySelector(".sidebar-toggle");
        
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e)=>{
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
            });
        }

        let getStatus = localStorage.getItem("status");
        if(getStatus && getStatus ==="close"){
            sidebar.classList.toggle("close");
        }

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            if(sidebar.classList.contains("close")){
                localStorage.setItem("status", "close");
            }else{
                localStorage.setItem("status", "open");
            }
        })
        
        
        sidebarToggle.onclick = function() {
        sidebar.classList.toggle("active");
        if(sidebar.classList.contains("active")){
        sidebarToggle.classList.replace("bx-menu" ,"bx-menu-alt-right");
        }else
        sidebarToggle.classList.replace("bx-menu-alt-right", "bx-menu");
        }
        
    </script>
    <!--script tabel-->
    <script src="https:code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https:cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https:cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>

    <script>
        $(document).ready(function() {
        var table = $('#example').DataTable( {
            scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: true,
            paging:         false,
            fixedColumns:   {
                left: 2
            }
        } );
    } );
    </script>
</body>
</html>
