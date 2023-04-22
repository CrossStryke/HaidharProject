<?php 
include "auth.php";
$loginQuery = "SELECT * FROM login_user WHERE username='$_SESSION[username]'";
$profile = "SELECT * FROM profile_user WHERE username='$_SESSION[username]'";
$query = mysqli_query($connect, $profile);
$login = mysqli_query($connect, $loginQuery);

$result = mysqli_fetch_array($query);
$resultLogin = mysqli_fetch_array($login);
include 'temp.php';

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

$queryPlayer = "SELECT * FROM players WHERE team='$result[team]' LIMIT $start_from, $num_per_page";
$playerList = mysqli_query($connect, $queryPlayer);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players of <?php echo $result['team']?></title>
</head>
<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Players List</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Search function -->
                        <div class="pagination justify-content-end">
                            <a href=""><button class="btn btn-primary me-2" type="button">Add New Player</button></a>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Bil</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            
                            <tr>
                                <?php 
                                $bil = 1;// Index count
                                // Getting data from thee players table
                                while ($players = mysqli_fetch_array($playerList)) {
                                    # code...

                                $queryRole = "SELECT * FROM position WHERE id='$players[pos]'";
                                $roleList = mysqli_query($connect, $queryRole);
                                $position = mysqli_fetch_array($roleList);
                                ?>
                                <td><?php echo $bil; ?></td>
                                <td><?php echo $players['name']; ?></td>
                                <td><?php echo $position['description'];?></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                            </tr>
                            <?php 
                            $bil++;
                                }?>
                        </table>
                        <br>
                        <ul class="pagination">
                        <?php 
                        $query = "SELECT * FROM players WHERE team='$result[team]'";
                        $tableList = mysqli_query($connect, $query);
                        $total_records = mysqli_num_rows($tableList);
                        $total_page = ceil($total_records/$num_per_page);
                        ?> 
                        <li class="page-item prev"><a href="players.php?page=<?php echo $page-1; ?>" class="page-link"><i class="tf-icon bx bx-chevron-left"></i></a></li>
                        <?php
                        for ($i=1; $i<= $total_page; $i++) { 
                            # code...
                        ?>
                        <li class="page-item"><a class="page-link" href="players.php?page=<?php echo $i; ?>"><?php echo $i;}?></a></li>
                        <li class="page-item next"><a href="players.php?page=<?php echo $page+1; ?>" class="page-link"><i class="tf-icon bx bx-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
