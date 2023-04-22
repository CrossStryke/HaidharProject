<?php 
// Roles
$queryRoles = "SELECT * FROM position";
$positionList = mysqli_query($connect, $queryRoles);
$position = mysqli_fetch_array($positionList);

// Main Players
$queryGK = "SELECT * FROM players WHERE team='$result[team]' AND pos='1'";
$playerGK = mysqli_query($connect, $queryGK);


$queryPVT = "SELECT * FROM players WHERE team='$result[team]' AND pos=2";
$playerPVT = mysqli_query($connect, $queryPVT);


$queryLW = "SELECT * FROM players WHERE team='$result[team]' AND pos=3";
$playerLW = mysqli_query($connect, $queryLW);


$queryRW = "SELECT * FROM players WHERE team='$result[team]' AND pos=3";
$playerRW = mysqli_query($connect, $queryRW);


$queryFX = "SELECT * FROM players WHERE team='$result[team]' AND pos=4";
$playerFX = mysqli_query($connect, $queryFX);


// Subsitute

$querySub1 = "SELECT * FROM players WHERE team='$result[team]'";
$playerSub1 = mysqli_query($connect, $querySub1);


$querySub2 = "SELECT * FROM players WHERE team='$result[team]'";
$playerSub2 = mysqli_query($connect, $querySub2);


$querySub3 = "SELECT * FROM players WHERE team='$result[team]'";
$playerSub3 = mysqli_query($connect, $querySub3);


$querySub4 = "SELECT * FROM players WHERE team='$result[team]'";
$playerSub4 = mysqli_query($connect, $querySub4);


$querySub5 = "SELECT * FROM players WHERE team='$result[team]'";
$playerSub5 = mysqli_query($connect, $querySub5);

?>