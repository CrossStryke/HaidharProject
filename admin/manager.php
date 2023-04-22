<?php 
include "../connect.php";
include "auth.php";
$loginQuery = "SELECT * FROM login_user WHERE username='$_SESSION[username]'";
$profile = "SELECT * FROM profile_user WHERE username='$_SESSION[username]'";
$query = mysqli_query($connect, $profile);
$login = mysqli_query($connect, $loginQuery);

$result=mysqli_fetch_array($query);
$resultLogin = mysqli_fetch_array($login);
    # code...
    include "temp.php";
        # code...

// Pagination
$num_per_page = 10;
if (isset($_GET["page"])) {
    # code...
    $page = $_GET["page"];
    if ($page == 0) {
        # code...
        $page = 1;
    }
}
else {
    # code...
    $page = 1;
}
$start_from = ($page - 1)*$num_per_page;

// Import data from database
$list = "SELECT * FROM login_user WHERE lvl NOT LIKE 'Admin' LIMIT $start_from, $num_per_page";
$team = mysqli_query($connect, $list);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
        <div class="container-xxl flex-grow-1 container-p-y">
            <p>Welcome <?php echo $result['name']; ?></p>
            <p>Admin of Futsal System Management</p>
            <div class="col-12">
                <div class="card">
                    <div class="container-p-y flex-grow-1 container-xxl">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Manager</th>
                                <th>Team</th>
                                <th></th>
                            </tr>
                            
                            <?php 
                            $bil = 1;
                            while ($mgr = mysqli_fetch_array($team)){
                            ?>
                            <tr>
                                <td><?php echo $bil; ?></td>
                                <?php
                                $teamList = "SELECT * FROM profile_user WHERE username='$mgr[username]'";
                                $queryTeam = mysqli_query($connect, $teamList);
                                while ($resultTeam = mysqli_fetch_array($queryTeam)) {
                                # code...
                                ?>
                                <td><?php echo $resultTeam['name'];?></td>
                                <?php 
                                $teamID = "SELECT * FROM team WHERE id='$resultTeam[team]'";
                                $idTeam = mysqli_query($connect, $teamID);
                                while ($resTeam = mysqli_fetch_array($idTeam)) {
                                ?>
                                <td><?php echo $resTeam['team'];}?></td>
                                <td><button class="btn btn-danger" onclick="destroyItem(<?php echo $mgr['id']; ?>)">Delete</button></td>
                                
                            </tr>
                            <?php 
                                }
                                $bil++;
                            }
                            ?>
                        </table>
                        <br>
                        <ul class="pagination">
                        <?php 
                        $query = "SELECT * FROM login_user WHERE lvl NOT LIKE 'Admin'";
                        $tableList = mysqli_query($connect, $query);
                        $total_records = mysqli_num_rows($tableList);
                        $total_page = ceil($total_records/$num_per_page);
                        ?> 
                        <li class="page-item prev"><a href="index.php?page=<?php echo $page-1; ?>" class="page-link"><i class="tf-icon bx bx-chevron-left"></i></a></li>
                        <?php
                        for ($i=1; $i<= $total_page; $i++) { 
                            # code...
                        ?>
                        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i;}?></a></li>
                        <li class="page-item next"><a href="index.php?page=<?php echo $page+1; ?>" class="page-link"><i class="tf-icon bx bx-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>     

                </div> <!--Do not touch. This is not supposed to be touched -->
            <?php include '../foot.html';?> 
        </div> <!--Do not touch. This is not supposed to be touched -->
      </div> <!--Do not touch. This is not supposed to be touched -->
    </div> <!--Do not touch. This is not supposed to be touched -->
</body>
<script>
function destroyItem(id) {
  // display a confirmation box and save the user's choice
  var confirmation = confirm("Are you sure you want to destroy this item?");

  // if the user clicked "OK" (true), redirect to destroy.php with the ID parameter
  if (confirmation == true) {
    window.location.href = "destroy.php?id=" + id;
  }
  // if the user clicked "Cancel" (false), do nothing
  else {
    return false;
  }
}


</script>
</html>