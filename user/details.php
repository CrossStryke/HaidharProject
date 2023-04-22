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
# Get the ID from the button of the previous
$id = $_GET['id'];

$queryReserve = "SELECT * FROM main WHERE id='$id'";
$reserve = mysqli_query($connect, $queryReserve);
$resultReserve = mysqli_fetch_array($reserve);

$queryTeam = "SELECT * FROM team WHERE id='$result[team]'";
$teamList = mysqli_query($connect, $queryTeam);
$team = mysqli_fetch_array($teamList);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Details</title>
</head>
<body>

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Reservation Details</h4>
    <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                  <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Manager Name</label>
                            <p><?php echo $result['name'];?></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Players</label>
                            <!-- Players that will be playing in the court -->
                            <?php
                            include 'list_player.php'; 
                            
                            ?>
                            <table class="table table-borderless">
                              <tr>
                                <th>Goalkeeper</th>
                                <td>:</td>
                                <td><?php echo $GK['name']; ?></td>
                              </tr>

                              <tr>
                                <th>Pivot</th>
                                <td>:</td>
                                <td><?php echo $PVT['name']; ?></td>
                              </tr>

                              <tr>
                                <th>Left Winger</th>
                                <td>:</td>
                                <td><?php echo $LW['name']; ?></td>
                              </tr>

                              <tr>
                                <th>Right Winger</th>
                                <td>:</td>
                                <td><?php echo $RW['name']; ?></td>
                              </tr>

                              <tr>
                                <th>Fixed Defender</th>
                                <td>:</td>
                                <td><?php echo $FIXO['name']; ?></td>
                              </tr>
                            </table>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Team Name</label>
                            <div class="input-group input-group-merge">
                              <p><?php echo $team['team'];?></p>
                            </div>
                          </div>

                          <div class="mb-3 col-md-6"></div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <p>MY (+60) <?php echo $result['no_tel'];?></p>
                            </div>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Subsitute</label>
                            <!-- PHP code to retrive the player data -->
                            <table class="table table-borderless">
                              <tr>
                                <th>Subsitute 1</th>
                                <td>:</td>
                                <td><?php echo $sub1['name']; ?></td>
                              </tr>

                              <tr>
                                <th>Subsitute 2</th>
                                <td>:</td>
                                <td><?php echo $sub2['name']; ?></td>
                              </tr>

                              <tr>
                                <th>Subsitute 3</th>
                                <td>:</td>
                                <td><?php echo $sub3['name']; ?></td>
                              </tr>

                              <tr>
                                <th>Subsitute 4</th>
                                <td>:</td>
                                <td><?php echo $sub4['name']; ?></td>
                              </tr>

                              <tr>
                                <th>Subsitute 5</th>
                                <td>:</td>
                                <td><?php echo $sub5['name']; ?></td>
                              </tr>
                            </table>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Email</label>
                            <div class="input-group input-group-merge">
                              <p><?php echo $result['email']; ?></p>
                            </div>
                          </div>

                          <div class="mb-3 col-md-6">
                          <label class="form-label" for="phoneNumber">Status</label>
                            <div class=" input-group-merge
                                <?php
                                switch ($resultReserve['stat']) {
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
                                } ?>">
                                <i class="
                                <?php
                                switch ($resultReserve['stat']) {
                                    case 'Approved':
                                        # code...
                                        echo "bx bx-check";
                                        break;
                                    
                                    case 'Rejected':
                                        # code...
                                        echo "bx bx-x";
                                        break; 

                                    case 'Pending':
                                        # code...
                                        echo "bx bx-time";
                                        break;   
                                    default:
                                        # code...
                                        echo "alert alert-primary";
                                        break;
                                } ?>"></i>
                              <?php echo $resultReserve['stat']; ?>
                            </div>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Reservation Date</label>
                            <div class="input-group input-group-merge">
                              <p><?php echo date("d/m/Y", strtotime($resultReserve['dt'])); ?></p>
                            </div>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                          <label class="form-label" for="phoneNumber">Reason of Rejection (If rejected)</label>
                            <div class="input-group input-group-merge">
                              <p><?php echo $resultReserve['comment']; ?></p>
                            </div>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Time</label>
                          <div class="col-md-6">
                            <p><?php echo date("h:i A", strtotime($resultReserve['time_st']));?> <i class='tf-icons bx bx-minus'></i> <?php echo date("h:i A", strtotime($resultReserve['time_st'])); ?></p>
                          </div>
                        </div>

                        </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>

          </div> <!--Do not touch. This is not supposed to be touched -->
          <?php 
          include '../foot.html';
          ?> 
        </div> <!--Do not touch. This is not supposed to be touched -->
      </div> <!--Do not touch. This is not supposed to be touched -->
    </div> <!--Do not touch. This is not supposed to be touched -->
</body>
</html>