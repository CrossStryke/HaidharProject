<?php
include '../connect.php';
include 'auth.php';
include 'index.html';


$profile = "SELECT * FROM profile_user WHERE username='$_SESSION[username]'";
$query = mysqli_query($connect, $profile);
    # code...

if(isset($_POST["submit"])){

  $insert = mysqli_fetch_array($query);
  $team = $insert['team'];
  $date = $_POST['date'];
  $start = $_POST['time_st'];
  $end = $_POST['time_ed'];

  $insertQuery = "INSERT INTO main(team, dt, time_st, time_ed) VALUES('$team', '$date', '$start', '$end')";
  mysqli_query($connect, $insertQuery);

  echo "<script>alert('Rekod berjaya disimpan');
  window.location='index.php'</script>";
}
$listQuery = mysqli_query($connect, $profile);
while ($result=mysqli_fetch_array($listQuery)) {
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
  <h4 class="fw-bold py-3 mb-4">Court Reservation</h4>
    <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic with Icons -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form method="post" action="">
                      <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <span id="basic-icon-default-fullname2"
                                ><p><?php echo $result['name']; ?></p>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Team</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <span id="basic-icon-default-fullname2">
                              <p><?php echo $result['team']; ?></p>
                              </span>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <span id="basic-icon-default-fullname2"
                                ><p><?php echo $result['email']; ?></p>
                              </span>
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                          <div class="col-sm-10">
                            <div class="input-group">
                              <span id="basic-icon-default-fullname2"
                                ><p name="phoneNo"><?php echo $result['no_tel'];} ?></p>
                              </span>
                            </div>
                          </div>
                        </div>

                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Date</label>
                          <div class="col-sm-2">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                              <input
                                type="date"
                                class="form-control"
                                name="date"
                                aria-label="John Doe"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                        </div>

                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Time</label>
                          <div class="col-sm-2">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                              <input
                                type="time"
                                class="form-control"
                                name="time_st"
                                aria-label="John Doe"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                          _
                          <div class="col-sm-2">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-fullname2" class="input-group-text"></span>
                              <input
                                type="time"
                                class="form-control"
                                name="time_ed"
                                aria-label="John Doe"
                                aria-describedby="basic-icon-default-fullname2"
                              />
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="submit" class="btn btn-primary">Reserve</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!--Do not touch. This is not supposed to be touched -->
          <?php 
          include 'foot.html';
          ?> 
        </div> <!--Do not touch. This is not supposed to be touched -->
      </div> <!--Do not touch. This is not supposed to be touched -->
    </div> <!--Do not touch. This is not supposed to be touched -->
</body>
</html>