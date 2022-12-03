<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $nis=$_POST['nis'];
    $name=$_POST['name'];
    $kelas=$_POST['kelas'];
    $umur=$_POST['umur'];
        
    // update user data
    $result = mysqli_query($mysqli, "UPDATE advanture SET nis='$nis' name='$name',umur='$umur',kelas='$kelas' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: home.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM advanture WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nis = $user_data['nis'];
    $name = $user_data['name'];
    $umur = $user_data['umur'];
    $kelas = $user_data['kelas'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
 
<body>
<div class="grid text-center" style="--bs-gap: .25rem 1rem;">
    <div class="g-col-6 pb-5 pt-5">
        <a class="btn btn-secondary btn-lg " href="home.php" role="button">Home</a>
    </div>
    <div class="g-col-6">
        <form name="update_user" method="post" action="edit.php">
        <table class="m-auto" border="0">
            <tr> 
                <td>NIS</td>
                <td><input type="text" name="nis" value=<?php echo $nis;?>></td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value=<?php echo $name;?>></td>
            </tr>
            <tr> 
                <td>Umur</td>
                <td><input type="text" name="umur" value=<?php echo $umur;?>></td>
            </tr>
            <tr> 
                <td>Kelas</td>
                <td><input type="text" name="kelas" value=<?php echo $kelas;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </div>
</div>
    
</body>
</html>