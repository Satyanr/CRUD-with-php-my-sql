<html>
<head>    
    <title>XI-PPLG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="bg-secondary bg-gradient">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle h1 text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            KELAS
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="xipplg.php">XI-PPLG</a></li>
            <li><a class="dropdown-item" href="xpplg.php">X-PPLG</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
// Create database connection using config file
include_once("config.php");

// Attempt select query execution
$result = mysqli_query ($mysqli,"SELECT * FROM advanture WHERE kelas='XI-PPLG'");
    if(mysqli_num_rows($result) > 0){
?>
        <div class="grid text-center" style="--bs-gap: .25rem 1rem;">
          <div class="g-col-6">   
            <table class="table table-light table-striped-columns w-100 mb-5 m-auto text-center">
                <thead>
             
                    <tr class="text-center">
                        <th>NIS</th> <th>Nama</th> <th>Kelas</th> <th>Umur</th> <th>Option</th>
                    </tr>
                </thead>
        <?php  
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['nis'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['kelas'] . "</td>";
                echo "<td>" . $row['umur'] . "</td>";
                echo "<td><a href='edit.php?id=$row[id]'>Edit</a> | <a href='delete.php?id=$row[id]'>Delete</a></td></tr>";
            echo "</tr>";
        }
        ?>
            </table>
        </div>
    </div>
<?php
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
 
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>