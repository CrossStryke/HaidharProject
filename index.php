<?php 
include 'connect.php';
include 'index.html';

// Import index database
$allList = "SELECT * FROM main";
$queryList = mysqli_query($connect, $allList);
$resultList = mysqli_fetch_array($queryList);

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
$list = "SELECT * FROM main LIMIT $start_from, $num_per_page";
$team = mysqli_query($connect, $list);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
<div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-12">
                <div class="card">
                    <div class="container-p-y flex-grow-1 container-xxl">
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Team</th>
                                <th>Tarikh</th>
                                <th>Masa Mula</th>
                                <th>Masa Akhir</th>
                            </tr>
                            
                            <?php 
                            $bil = 1;
                            while ($mgr = mysqli_fetch_array($team)){
                            ?>
                            <tr>
                                <td><?php echo $bil; ?></td>
                                <?php
                                $teamList = "SELECT * FROM team WHERE id='$mgr[team]'";
                                $queryTeam = mysqli_query($connect, $teamList);
                                while ($resultTeam = mysqli_fetch_array($queryTeam)) {
                                # code...
                                ?>
                                <td><?php echo $resultTeam['team'];?></td>
                                <td><?php echo date("d/m/Y", strtotime($mgr['dt'])); ?></td>
                                <td><?php echo date("h:i A", strtotime($mgr['time_st'])); ?></td>
                                <td><?php echo date("h:i A", strtotime($mgr['time_ed'])); ?></td>
                            </tr>
                            <?php 
                            $bil++;
                                }
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
            <?php include 'foot.html';?> 
        </div> <!--Do not touch. This is not supposed to be touched -->
      </div> <!--Do not touch. This is not supposed to be touched -->
    </div> <!--Do not touch. This is not supposed to be touched -->
</body>
</html>