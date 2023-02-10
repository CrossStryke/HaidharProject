<?php 
include "../connect.php";
include "auth.php";
include "index.html";

$profile = "SELECT * FROM profile_user WHERE username='$_SESSION[username]'";
$query = mysqli_query($connect, $profile);

$result=mysqli_fetch_array($query);
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
                            </tr>
                            
                            <?php 
                            $bil = 1;
                            $list = "SELECT * FROM main WHERE team='$result[team]'"; 
                            $team = mysqli_query($connect, $list);
                            while ($mgr = mysqli_fetch_array($team)){
                            ?>
                            <tr>
                                <td><?php echo $bil; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($mgr['dt'])); ?></td>
                                <td><?php echo date("h:i A", strtotime($mgr['time_st'])); ?></td>
                                <td><?php echo date("h:i A", strtotime($mgr['time_ed'])); ?></td>
                            </tr>
                            <?php 
                            $bil++;
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>     

                </div> <!--Do not touch. This is not supposed to be touched -->
            <?php include 'foot.html';?> 
        </div> <!--Do not touch. This is not supposed to be touched -->
      </div> <!--Do not touch. This is not supposed to be touched -->
    </div> <!--Do not touch. This is not supposed to be touched -->
</body>
</html>