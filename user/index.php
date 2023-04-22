<?php 
include "auth.php";
$loginQuery = "SELECT * FROM login_user WHERE username='$_SESSION[username]'";
$profile = "SELECT * FROM profile_user WHERE username='$_SESSION[username]'";
$query = mysqli_query($connect, $profile);
$login = mysqli_query($connect, $loginQuery);

$result=mysqli_fetch_array($query);
$resultLogin = mysqli_fetch_array($login);
include "temp.php";
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
$list = "SELECT * FROM main WHERE team='$result[team]' ORDER BY id DESC LIMIT $start_from, $num_per_page"; 
$futsal = mysqli_query($connect, $list);
    # code...
    $team = "SELECT * FROM team WHERE id='$result[team]'";
    $listTeam = mysqli_query($connect, $team);
    while ($resultTeam = mysqli_fetch_array($listTeam)) {
        # code...
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
            <p>Manager of Team <?php echo $resultTeam['team'];} ?></p>
            <div class="col-12">
                <div class="card">
                    <div class="container-p-y flex-grow-1 container-xxl">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Tarikh</th>
                                <th>Masa Mula</th>
                                <th>Masa Akhir</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            
                            <?php 
                            $bil = 1;
                            while ($mgr = mysqli_fetch_array($futsal)){
                            ?>
                            <tr>
                                <td><?php echo $bil; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($mgr['dt'])); ?></td>
                                <td><?php echo date("h:i A", strtotime($mgr['time_st'])); ?></td>
                                <td><?php echo date("h:i A", strtotime($mgr['time_ed'])); ?></td>
                                <td class="
                                <?php
                                switch ($mgr['stat']) {
                                    case 'Approved':
                                        # code...
                                        echo "alert alert-success";
                                        break;
                                    
                                    case 'Rejected':
                                        # code...
                                        echo "alert alert-danger";
                                        break; 

                                    case 'Pending':
                                        # code...
                                        echo "alert alert-warning";
                                        break;   
                                    default:
                                        # code...
                                        echo "alert alert-primary";
                                        break;
                                } ?>"><?php echo $mgr['stat']; ?></td>
                                <td><a href="details.php?id=<?php echo $mgr['id'];?>"><button class="btn btn-primary">Details</button></a></td>
                            </tr>
                            <?php 
                            $bil++;
                            }
                            ?>
                        </table>
                        <br>
                        <ul class="pagination">
                        <?php 
                        $query = "SELECT * FROM main";
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
</html>