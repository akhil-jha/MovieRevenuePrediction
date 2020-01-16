<?php require_once "pdo.php";
session_start();
if(isset($_POST['cancel']))
{
header("location:index.php");
return;
}
if(isset($_POST["hashtag"]) && isset($_POST["met"]) &&
isset($_POST["sent"]) )
{
$intercept=1;
$tweet_coeff=2;
$screen_coeff=3;
$sentiment_coeff=4;
$movie =$_POST["hashtag"];
$stmt =$pdo->prepare("select * from main_test");
$stmt->execute();
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
if($row["Hashtag"]==$movie)
{
$_SESSION["name"]=$row["Name"];
$_SESSION["release"]=$row["Rel_Date (dd-mm-yyyy)"];
$_SESSION["tweets"]=(int)$row["Total_Tweets"];
$_SESSION["screens"]=(int)$row["Theatre_Screens"];
$_SESSION["sentiment"]=(double)$row["Sentiment_Score"];
$_SESSION["hashtag"]=$movie;
if($_POST["sent"]==1)
{
switch($_POST["met"])
{
case 3: $intercept=-64581520.16653682;
$tweet_coeff=199.800737;
$screen_coeff=35285.6149;
$sentiment_coeff=-101915263;
$_SESSION["opening"] = $intercept + $tweet_coeff *
$_SESSION["tweets"] + $screen_coeff * $_SESSION["screens"]
+ $sentiment_coeff * $_SESSION["sentiment"];
break;
case 2: $intercept=66343671.000773445;
$tweet_coeff=258.345503;
$sentiment_coeff=-124089186;
$_SESSION["opening"] = $intercept + $tweet_coeff *
$_SESSION["tweets"] + $sentiment_coeff *
$_SESSION["sentiment"];
break;
case 1: $intercept=-95560523.26433763;
$screen_coeff=47048.3891;
$sentiment_coeff=-111743134;
$_SESSION["opening"] = $intercept + $screen_coeff *
$_SESSION["screens"] + $sentiment_coeff *
$_SESSION["sentiment"];
break;
}
}
else {
switch($_POST["met"])
{
case 3: $intercept=-87810678.47940847;
$tweet_coeff=203.81222231;
$screen_coeff=37104.10086653;
$_SESSION["opening"] = $intercept + $tweet_coeff *
$_SESSION["tweets"] + $screen_coeff * $_SESSION["screens"];
break;
case 2: $intercept=46048354.29233156;
$tweet_coeff=267.00044922;
SESSION["opening"] = $intercept + $tweet_coeff *
$_SESSION["tweets"];
break;
case 1: $intercept=-121762397.66348612;
$screen_coeff=49305.54520271;
$_SESSION["opening"] = $intercept + $screen_coeff *
$_SESSION["screens"];
break;
}
}
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Apratim Tripathi</title>
<?php require_once "bootstrap.php"; ?>
<style>
td{
width:300px;
}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}
th {
background-color: #4CAF50;
color: white;
}
</style>
</head>
<body>
<div class="container">
<br>
<p><h2>Box-Office Opening Weekend Predictor | <?php echo
$_SESSION["name"]; ?> </h2> <br></p>
<br>
<table>
<tr><th><?php echo $_SESSION['name']; ?></th> <th></th></tr>
<tr>
<td>Name </td>
<td><?php echo $_SESSION["name"]?></td>
</tr>
<tr>
<td>Release Date </td>
<td><?php echo $_SESSION["release"]?></td>
</tr>
<tr>
<td>Hashtag </td>
<td><?php echo $_SESSION["hashtag"]?></td>
</tr>
<tr>
<td>Total Tweets Collected </td>
<td><?php echo $_SESSION["tweets"]?></td>
</tr>
<tr>
<td>Theatre Count </td>
<td><?php echo $_SESSION["screens"]?></td>
</tr>
<tr>
<td>Avg. Sentiment Score </td>
<td><?php echo $_SESSION["sentiment"]?></td>
</tr>
<tr>
<td>Opening Weekend Collection </td>
<td style="weight:bold"><?php echo $_SESSION["opening"]?></td>
</tr>
</table>
<br>
<a href="index.php"> Back </a>
</div>
</body>
</html>