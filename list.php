<?php
  function kode()
  {
    $file = fopen("data.txt", "r");


    if (!('' == file_get_contents("data.txt"))) {
      if ($file) {
        while (($line = fgets($file)) !== false) {
          $data = explode("|", $line);
          $kode = $data[0];
        }
        
        
      }
    } else {
      echo "";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/2365b8dab9.js" crossorigin="anonymous"></script>

    <style>
        body {
            margin-top:40px;
            color:#06194d;
            font-weight:900;
            background:#ffdda7;
            font-family: 'Roboto Slab', serif;      
        }

        h1 {
            color:#06194d;;
            margin:20px;
        }
        table
        {
            border: 1;
            border-collapse: collapse;
            margin-left: 50px;
            margin-right:50px;
            margin-bottom: 20px;
        }
        
        table, th, td
        {
            border: 1px solid gainsboro;
            padding: 20px;
            text-align: left;
            margin: 30px auto;
        }
        
        img {
            height:400px;
            width:100%;
        }
        .card {
            
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            box-sizing: border-box;
            margin: 0 auto;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        </style>

        <title>Form</title>
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
            <a href="<?php echo "list.php"; ?>" class="active">
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
            <a href="<?php echo "read.php"; ?>">
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
            <div class="search-box">
                <i class='bx bx-search' ></i>
                <form method="GET" action="customer.php" style="text-align: left">
                    <input name="search" method="GET" action="customer.php" placeholder="  Search..." id="mysearch" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                </form>
                <span class="clear" onclick="document.getElementById('mysearch').value = ''"><i class="fa fa-times" aria-hidden="true"></i></span>

            </div>  
           
            <div class="profile-details">
                <span class="admin_name">Rosalena Brigita</span>
                <i class='bx bx-chevron-down' ></i>
            </div>
        </div>
        

        <div class="dash-content">
            <div class="database">
                <h1><center>List Data Buku Perpustakaan</center></h1>
                <div class="database-data" style="align-items=center">
                    
                    <?php
                    $file_name = "data.txt";

                    $read = file($file_name); 

                    $rows = explode("\n", $file_name);
                    $rowCount = count($rows);
                    echo "<div class='card'>";

                    foreach ($read as $books){
                        $data_explode = explode("|", $books);
                        echo "<table>";

                        echo    "
                            <tr>
                                <td rowspan=9>";
                                echo "<img src = './cover/$data_explode[7].'";
                        echo "      </td>
                            </tr>
                            <tr>
                                <th>Kode Buku</th>
                                <td>$data_explode[0]</td>
                            </tr>
                            <tr>
                                <th>Judul Buku</th>
                                <td>$data_explode[1]</td>
                            </tr>
                            <tr>
                                <th>Pengarang</th>
                                <td>$data_explode[2]</td>
                            </tr>
                            <tr>
                                <th>Tahun Terbit</th>
                                <td>$data_explode[3]</td>
                            </tr>
                            <tr>
                                <th>Penerbit</th>
                                <td>$data_explode[4]</td>
                            </tr>
                            <tr>
                                <th>Jumlah Halaman</th>
                                <td>$data_explode[5]</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>$data_explode[6]</td>
                            </tr>
                            

                        </table>";
                        } ?>
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
</body>
</html>
