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


# If admin decide to approve the application
if (isset($_POST["approve"])) {
    # code...
    $queryApprove = "UPDATE main SET stat='Approved' WHERE id='$id'";
    mysqli_query($connect, $queryApprove);

    echo "<script>alert('Data has successfully updated');
    window.location='index.php'</script>";

}

# If admin decide to reject the application
if (isset($_POST["reject"])) {
    # code...
    $res = $_POST['rejection'];

    $queryReject = "UPDATE main SET stat='Rejected', comment='$res' WHERE id='$id'";
    $test = mysqli_query($connect, $queryReject);

    echo "<script>alert('Data has successfully updated');
    window.location='index.php'</script>";

}
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
                      <form action="" method="post">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Manager Name</label>
                            <?php 
                            $queryName = "SELECT * FROM profile_user WHERE team='$resultReserve[team]'";
                            $mgrName = mysqli_query($connect, $queryName);
                            $manager =  mysqli_fetch_array($mgrName);
                            ?>
                            <p><?php echo $manager['name'];?></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Players</label>
                            <!-- Players that will be playing in the court -->
                            <?php
                            include 'player_list.php'; 
                            
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
                              <?php 
                              $queryTeam = "SELECT * FROM team WHERE id='$resultReserve[team]'";
                              $teamPlay = mysqli_query($connect, $queryTeam);
                              $teamName = mysqli_fetch_array($teamPlay);
                              ?>
                              <p><?php echo $teamName['team'];?></p>
                            </div>
                          </div>

                          <div class="mb-3 col-md-6"></div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span>MY (+60) <?php echo $result['no_tel'];?></span>
                              <p></p>
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
                              <?php echo $manager['email'];?>
                            </div>
                          </div>

                          <div class="mb-3 col-md-6"></div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Reservation Date</label>
                            <div class="input-group input-group-merge">
                              <p><?php echo date("d/m/Y", strtotime($resultReserve['dt'])); ?></p>
                            </div>
                          </div>
                          
                          <div class="mb-3 col-md-6"></div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Time</label>
                          <div class="col-md-6">
                            <p><?php echo date("h:i A", strtotime($resultReserve['time_st']));?> <i class='tf-icons bx bx-minus'></i> <?php echo date("h:i A", strtotime($resultReserve['time_st'])); ?></p>
                          </div>

                        </div>
                        </div>
                        

                        <div class="row justify-content-end">
                          <div class="demo-inline-spacing">
                            <button type="submit" name="approve" class="btn rounded-pill btn-outline-success">
                              <span class="tf-icons bx bx-check-circle"></span>&nbsp; Approve
                            </button>
                        </form>
                            <button type="button" class="btn rounded-pill btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalCenter">
                              <span class="tf-icons bx bx-x-circle"></span>&nbsp; Reject
                            </button>
                            

                            <!-- Vertically Centered Modal -->
                            <div class="col-lg-4 col-md-6">
                            <div class="mt-3">

                                <!-- Modal -->
                                <form action="" method="post">
                                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Rejection Form</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                        <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Reason of rejection</label>
                                            <textarea class="form-control" rows="3" name="rejection"></textarea>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn rounded-pill btn-outline-secondary" data-bs-dismiss="modal">
                                        Cancel
                                        </button>
                                        <button type="submit" name="reject" class="btn rounded-pill btn-danger">
                                            Reject
                                        </button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
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