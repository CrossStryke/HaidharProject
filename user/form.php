<?php
include '../connect.php';
include "auth.php";
$loginQuery = "SELECT * FROM login_user WHERE username='$_SESSION[username]'";
$profile = "SELECT * FROM profile_user WHERE username='$_SESSION[username]'";
$query = mysqli_query($connect, $profile);
$login = mysqli_query($connect, $loginQuery);

$result=mysqli_fetch_array($query);
$resultLogin = mysqli_fetch_array($login);
include 'temp.php';
    # code...
// Insert data syntax
if(isset($_POST["submit"])){

  $team = $result['team'];
  $date = $_POST['date'];
  $start = $_POST['time_st'];
  $end = $_POST['time_ed'];
  $GK = $_POST['gk'];
  $PVT = $_POST['pvt'];
  $LW = $_POST['lw'];
  $RW = $_POST['rw'];
  $FIXO = $_POST['fixo'];
  $sub1 = $_POST['sub1'];
  $sub2 = $_POST['sub2'];
  $sub3 = $_POST['sub3'];
  $sub4 = $_POST['sub4'];
  $sub5 = $_POST['sub5'];

  $insertQuery = "INSERT INTO main(team, dt, time_st, time_ed, gk, pvt, lw, rw, fixo, sub1, sub2, sub3, sub4, sub5, stat) 
  VALUES('$team', '$date', '$start', '$end', '$GK', '$PVT', '$LW', '$RW', '$FIXO', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5', 'Pending')";
  mysqli_query($connect, $insertQuery);
  

  echo "<script>alert('Thank you for the reservation');
  window.location='index.php'</script>";
}
$listQuery = mysqli_query($connect, $profile);
$result=mysqli_fetch_array($listQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Form</title>
</head>
<body>

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Reservation Form</h4>
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
                            <p><?php echo $result['name'];?></p>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label text-bold">Players</label><br><br>
                            <!-- Players that will be playing in the court -->
                            <?php
                              include 'player_list.php'; 
                            ?>

                            <label for="email" class="form-label text-bold">Goalkeeper</label>
                            <select name="gk" class="form-control" required onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Goalkeeper</option>
                              <?php 
                                while ($GK = mysqli_fetch_array($playerGK)) {
                                  # code...
                              ?>
                              <option value="<?php echo $GK['id'];?>"><?php echo $GK['name'];}?></option>
                            </select>

                            <br><label for="email" class="form-label text-bold">Pivot</label>
                            <select name="pvt" class="form-control" required onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Pivot</option>
                              <?php 
                                while ($PVT = mysqli_fetch_array($playerPVT)) {
                                  # code...
                              ?>
                              <option value="<?php echo $PVT['id'];?>"><?php echo $PVT['name'];}?></option>
                            </select>

                            <br><label for="email" class="form-label text-bold">Left Winger</label>
                            <select name="lw" class="form-control" required onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Left Winger</option>
                              <?php 
                                while ($LW = mysqli_fetch_array($playerLW)) {
                                  # code...
                              ?>
                              <option value="<?php echo $LW['id'];?>"><?php echo $LW['name'];}?></option>
                            </select>

                            <br><label for="email" class="form-label text-bold">Right Winger</label>
                            <select name="rw" class="form-control" required onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Right Winger</option>
                              <?php 
                                while ($RW = mysqli_fetch_array($playerRW)) {
                                  # code...
                              ?>
                              <option value="<?php echo $RW['id'];?>"><?php echo $RW['name'];}?></option>
                            </select>

                            <br><label for="email" class="form-label text-bold">Fixed Defender</label>
                            <select name="fixo" class="form-control" required onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Fixed Defender</option>
                              <?php 
                                while ($FIXO = mysqli_fetch_array($playerFX)) {
                                  # code...
                              ?>
                              <option value="<?php echo $FIXO['id'];?>"><?php echo $FIXO['name'];}?></option>
                            </select>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Team Name</label>
                            <div class="input-group input-group-merge">
                              <p><?php echo $result['team'];?></p>
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
                            <label for="email" class="form-label text-bold">Subsitutes</label><br><br>
                            <!-- Subsitute players -->
                            <?php
                              include 'player_list.php'; 
                            ?>

                            <label for="email" class="form-label text-bold">Subsitute 1</label>
                            <select name="sub1" class="form-control" onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Subsitute 1</option>
                              <?php 
                                while ($sub1 = mysqli_fetch_array($playerSub1)) {
                                  # code...
                              ?>
                              <option value="<?php echo $sub1['id'];?>"><?php echo $sub1['name'];}?></option>
                            </select>

                            <br><label for="email" class="form-label text-bold">Subsitute 2</label>
                            <select name="sub2" class="form-control" onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Subsitute 2</option>
                              <?php 
                                while ($sub2 = mysqli_fetch_array($playerSub2)) {
                                  # code...
                              ?>
                              <option value="<?php echo $sub2['id'];?>"><?php echo $sub2['name'];}?></option>
                            </select>

                            <br><label for="email" class="form-label text-bold">Subsitute 3</label>
                            <select name="sub3" class="form-control" onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Subsitute 3</option>
                              <?php 
                                while ($sub3 = mysqli_fetch_array($playerSub3)) {
                                  # code...
                              ?>
                              <option value="<?php echo $sub3['id'];?>"><?php echo $sub3['name'];}?></option>
                            </select>

                            <br><label for="email" class="form-label text-bold">Subsitute 4</label>
                            <select name="sub4" class="form-control" onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Subsitute 4</option>
                              <?php 
                                while ($sub4 = mysqli_fetch_array($playerSub4)) {
                                  # code...
                              ?>
                              <option value="<?php echo $sub4['id'];?>"><?php echo $sub4['name'];}?></option>
                            </select>

                            <br><label for="email" class="form-label text-bold">Subsitute 5</label>
                            <select name="sub5" class="form-control" onchange="removeSelectedOption(this)">
                              <option value="" hidden>Select Subsitute 5</option>
                              <?php 
                                while ($sub5 = mysqli_fetch_array($playerSub5)) {
                                  # code...
                              ?>
                              <option value="<?php echo $sub5['id'];?>"><?php echo $sub5['name'];}?></option>
                            </select>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Email</label>
                            <div class="input-group input-group-merge">
                              <?php echo $result['email'];?>
                            </div>
                          </div>

                          <div class="mb-3 col-md-6"></div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Date</label>
                            <div class="input-group input-group-merge">
                              <p><input type="date" class="form-control" name="date"></p>
                            </div>
                          </div>
                          
                          <div class="mb-3 col-md-6"></div>
                          
                          <div class="mb-3 col-md-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Time</label>

                            <div class="row mb-3">
                              <div class="col-md-4">
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

                              _<!-- <i class='tf-icons bx bx-minus'></i> -->

                            <div class="col-md-4">
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

                        </div>
                        </div>
                        

                        <div class="row justify-content-end">
                          <div class="demo-inline-spacing">
                            <button type="submit" name="submit" class="btn rounded-pill btn-outline-primary">
                              <span class="tf-icons bx bx-football"></span>&nbsp; Reserve
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

          </div> <!--Do not touch. This is not supposed to be touched -->
          <?php 
          include '../foot.html';
          ?> 
        </div> <!--Do not touch. This is not supposed to be touched -->
      </div> <!--Do not touch. This is not supposed to be touched -->
    </div> <!--Do not touch. This is not supposed to be touched -->
    <script>
function removeSelectedOption(selectElem) {
  // get the selected option value
  var selectedValue = selectElem.value;
  
  // hide the selected option in all other dropdowns
  var selectElems = document.querySelectorAll('select');
  for (var i = 0; i < selectElems.length; i++) {
    if (selectElems[i] != selectElem) {
      var optionElem = selectElems[i].querySelector('option[value="' + selectedValue + '"]');
      if (optionElem) {
        optionElem.style.display = 'none';
      }
    }
  }
  
  // display the selected option in the current dropdown
  var optionElem = selectElem.querySelector('option[value="' + selectedValue + '"]');
  if (optionElem) {
    optionElem.selected = true;
  }
}
</script>
</body>
</html>