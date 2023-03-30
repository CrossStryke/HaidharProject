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

if (isset($_POST['update'])) {
  # code...
  $phone = $_POST['phoneNumber'];
  $email = $_POST['email'];

  $query = "UPDATE profile_user SET no_tel='$phone', email='$email' WHERE username='$_SESSION[username]'";

  $file_name=$_FILES['image']['name'];
  $temp = explode(".", $file_name);
  $newfilename = round(microtime(true)) . '.' . end($temp);
  $imagepath="uploads/".$newfilename;
  move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
  $path = "UPDATE profile_user SET photo='$imagepath' where username='$_SESSION[username]'";
  mysqli_query($connect, $path);
  
  ?>
  <script>
    alert('Rekod berjaya disimpan');
    window.location='index.php'
  </script>
  <?php

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<link  href="../cropperJS/dist/cropper.css" rel="stylesheet">
<script src="../cropperJS/dist/cropper.js"></script>
<body>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="<?php echo $result['photo'];?>"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          name="uploadedAvatar"
                          value=""
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              accept=".png, .jpeg, .jpg"
                              hidden
                              name="image"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                      <form action="" method="post">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Username</label>
                            <p><?php echo $result['username'];?></p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Name</label>
                            <p><?php echo $result['name'];?></p>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">MY (+60)</span>
                              <input type="text" name="phoneNumber" class="form-control" placeholder="202 555 0111" value="<?php echo $result['no_tel'];?>">
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">E-mail</label>
                            <input type="text" class="form-control" name="email" placeholder="" value="<?php echo $result['email'];?>">
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="update" class="btn btn-primary me-2">Save changes</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  </form>
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