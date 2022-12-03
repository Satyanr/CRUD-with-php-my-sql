<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM advanture ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
 
<body class="bg-secondary bg-gradient">

<!-- As a heading -->
<nav class="navbar bg-dark ">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-light">DATA SISWA</span>
  </div>
</nav>

<div class="g-col-6 pb-5 pt-5">
    <a class="btn btn-light btn-lg float-end mb-2 me-2 " role="button" data-bs-toggle="modal" data-bs-target="#theModal">Add</a>
</div>
<div class="grid text-center" style="--bs-gap: .25rem 1rem;">
  <div class="g-col-6">   
    <table class="table table-striped-columns w-100 mb-5 m-auto text-center">
        <thead class="table-light">
     
            <tr>
                <th>NIS</th> <th>Nama</th> <th>Kelas</th> <th>Umur</th> <th>Option</th>
            </tr>
        </thead>
            <?php  
            while($user_data = mysqli_fetch_array($result)) {         
                echo "<tr class='table-light'>";
                echo "<td>".$user_data['nis']."</td>";
                echo "<td>".$user_data['name']."</td>";
                echo "<td>".$user_data['kelas']."</td>";
                echo "<td>".$user_data['umur']."</td>";   
                echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
            }
            ?>
    </table>
  </div>
</div>

<!--Modal For Add-->

<div class="modal fade text-center" id="theModal">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Data Siswa</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="grid text-center" style="--bs-gap: .25rem 1rem;">
      <div class="g-col-6">
         <form action="home.php" method="post" name="form1">
            <table class="m-auto">
                <tr> 
                    <td>NIS</td>
                    <td><input type="text" name="nis" placeholder="2012345678"></td>
                </tr>
                <tr> 
                    <td>Name</td>
                    <td><input type="text" name="name" placeholder="agus bambang"></td>
                </tr>
                <tr> 
                    <td>Umur</td>
                    <td><input type="text" name="umur" placeholder="19"></td>
                </tr>
                <tr> 
                    <td>Kelas</td>
                    <td><input type="text" name="kelas" placeholder="XI-PPLG"></td>
                </tr>
            </table>
         
      </div>
</div>
</div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" name="Submit" class="btn btn-primary" value="Tambahkan">
              </form>

                  <?php
 

                    if(isset($_POST['Submit'])) {
                        $nis = $_POST['nis'];
                        $name = $_POST['name'];
                        $umur = $_POST['umur'];
                        $kelas = $_POST['kelas'];
                        

                        include_once("config.php");
                                

                        $result = mysqli_query($mysqli, "INSERT INTO advanture(nis,name,umur,kelas) VALUES('$nis','$name','$umur','$kelas')");

                        echo "<meta http-equiv='refresh' content='0'>";

                    }

                    ?>
            </div>
          </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>