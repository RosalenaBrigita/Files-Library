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
        form {
            margin-left:30px;
            
        }
        input[type=submit], input[type=reset] , input[type=button] , input[type=text] #db {
            background-color: #0b3cc1;;
            color:#fff;
            border: none;
            padding: 16px 32px;
            text-decoration: none;
            font-family: 'Roboto Slab', serif;      
            margin: 20px 4px 0 0;
            cursor: pointer;
            border-radius:10px;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=submit]:hover,input[type=reset]:hover,input[type=button]:hover{
            background-color: #06194d;;
            color: white;
            font-weight:700;
        }
        input[type=text], input[type=number], select[type=text]{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            border:0px;
            box-sizing: border-box;
            color:rgb(30, 27, 2);
            opacity:0.5;
            font-weight:700;
        }
        input[type=text]:hover, input[type=number]:hover, select[type=text]:hover {
            opacity:1;
            border:2px;
            border-color:#06194d;;
            border-style:groove;
        }

        input[type=file]::file-selector-button:hover {
            background: #06194d;
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
            
                <h1><center>Insert Data Buku</center></h1>

                <div class="database-data">

                    <form action="saveData1.php" method="post"  enctype = "multipart/form-data">
                        <table id="db">
                        <tr>
                            <td width="200">Kode Buku</td>
                            <td>:</td>
                            <td><input type="text" name="kode" required value="<?php echo kode() ?>"></td>
                        </tr>

                        <tr>
                            <td>Judul Buku</td>
                            <td>:</td>
                            <td><input type="text" name="judul" size="30" required></td>
                        </tr>
                        <tr>
                            <td>Pengarang</td>
                            <td>:</td>
                            <td><input type="text" name="pengarang" size="30" required></td>
                        </tr>
                        <tr>
                            <td>Tahun Terbit</td>
                            <td>:</td>
                            <td><input type="number" name="tt" size="30" required></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>:</td>
                            <td><input type="text" name="penerbit" size="30" required></td>
                        </tr>
                        <tr>
                            <td>Jumlah Halaman</td>
                            <td>:</td>
                            <td><input type="number" name="jh" size="30"></td>
                        </tr>
                        <tr>
                            <td>kategori</td>
                            <td>:</td>
                            <td><select type="text" name="kategori" required>
                                <option>---</option>
                                <option>Fiksi-Novel</option>
                                <option>Fiksi-Komik</option>
                                <option>Fiksi-Dongeng</option>
                                <option>Fiksi-Novelet</option>
                                <option>NonFiksi-Buku Ilmiah</option>
                                <option>NonFiksi-Panduan</option>
                                <option>NonFiksi-Kamus</option>
                                <option>NonFiksi-Karya Ilmiah</option>
                                <option>NonFiksi-Biografi</option>
                                <option>NonFiksi-Ensiklopedia</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Cover Buku</td>
                            <td>:</td>
                            <td><input type="file" name="cover" size="30" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                                <td>
                                    <input type="submit" value="Save" name="save">
                                    <input type="reset" value="Cancel" name="cancel">
                                    <input type="button" value="Back" name="back" onclick="self.history.back()">
                                </td>
                            </tr>
                        </table>
                    </form>
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
