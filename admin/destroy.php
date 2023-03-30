<?php 
include '../connect.php';
$profile = "SELECT * FROM profile_user WHERE id='$_GET[id]'";
$query = mysqli_query($connect, $profile);
$result=mysqli_fetch_array($query);
// Delete data from the main table
$queryMain = "DELETE FROM main WHERE team='$result[team]'";
mysqli_query($connect, $queryMain);
// Obtain data from user login
$queryLogin = "DELETE FROM login_user WHERE id='$result[id]'";
mysqli_query($connect, $queryLogin);
// Obtain data from players
$queryPlayers = "DELETE FROM players WHERE team='$result[id]'";
mysqli_query($connect, $queryPlayers);
// Obtain data from team
$queryTeam = "DELETE FROM team WHERE team='$result[team]'";
mysqli_query($connect, $queryTeam);
// Delete data from user profile
$queryProfile = "DELETE FROM profile_user WHERE id='$_GET[id]'";
mysqli_query($connect, $queryProfile);

echo "<script>alert('Manager has been eliminated');
window.location='manager.php'</script>";
?>