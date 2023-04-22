<?php 
// Main Players
$queryGK = "SELECT * FROM players WHERE id='$resultReserve[gk]'";
$playerGK = mysqli_query($connect, $queryGK);
$GK = mysqli_fetch_array($playerGK);

$queryPVT = "SELECT * FROM players WHERE id='$resultReserve[pvt]'";
$playerPVT = mysqli_query($connect, $queryPVT);
$PVT = mysqli_fetch_array($playerPVT);

$queryLW = "SELECT * FROM players WHERE id='$resultReserve[lw]'";
$playerLW = mysqli_query($connect, $queryLW);
$LW = mysqli_fetch_array($playerLW);

$queryRW = "SELECT * FROM players WHERE id='$resultReserve[rw]'";
$playerRW = mysqli_query($connect, $queryRW);
$RW = mysqli_fetch_array($playerRW);

$queryFX = "SELECT * FROM players WHERE id='$resultReserve[fixo]'";
$playerFX = mysqli_query($connect, $queryFX);
$FIXO = mysqli_fetch_array($playerFX);

// Subsitute

$querySub1 = "SELECT * FROM players WHERE id='$resultReserve[sub1]'";
$playerSub1 = mysqli_query($connect, $querySub1);
$sub1 = mysqli_fetch_array($playerSub1);

$querySub2 = "SELECT * FROM players WHERE id='$resultReserve[sub2]'";
$playerSub2 = mysqli_query($connect, $querySub2);
$sub2 = mysqli_fetch_array($playerSub2);

$querySub3 = "SELECT * FROM players WHERE id='$resultReserve[sub3]'";
$playerSub3 = mysqli_query($connect, $querySub3);
$sub3 = mysqli_fetch_array($playerSub3);

$querySub4 = "SELECT * FROM players WHERE id='$resultReserve[sub4]'";
$playerSub4 = mysqli_query($connect, $querySub4);
$sub4 = mysqli_fetch_array($playerSub4);

$querySub5 = "SELECT * FROM players WHERE id='$resultReserve[sub5]'";
$playerSub5 = mysqli_query($connect, $querySub5);
$sub5 = mysqli_fetch_array($playerSub5);
?>