<?php require_once "pdo.php";
$name=array();
$total_tweets=array();
$screens=array();
$sentiment=array();
$release=array();
$hashtag=array();
$opening=array();
$collection=array();
$stmt = $pdo->prepare("select * from data_training");
$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
array_push($name , $row["Name"]);
array_push($release , $row["Rel_Date (dd-mm-yyyy)"]);
array_push($total_tweets , (int)$row["Total_Tweets"]);
array_push($screens , (int)$row["Theatre_Screens"]);
array_push($sentiment , (double)$row["Sentiment_Score"]);
array_push($hashtag , $row["Hashtag"]);
array_push($collection , $row["Opening Weekend"]);
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
<p><h2>Box-Office Opening Weekend Predictor | Training Data</h2> <br></p>
<table>
<tr>
<th>Name</th><th>Hashtag</th><th>Relese Date</th><th>Total
Tweets</th><th>Theatre Count</th><th>Avg. Sentiment</th><th>Opening
Weekend</th>
</tr>
<?php for($x = 0; $x < count($name); $x++) { ?>
<tr>
<td><?php echo $name[$x]; ?> </td>
<td><a href=<?php echo
"/Project/source/tweets/".str_replace("#","%23",$hashtag[$x]).".txt";?>
target='_blank'><?php echo $hashtag[$x]; ?></a></td>
<td><?php echo $release[$x]; ?> </td>
<td><?php echo $total_tweets[$x]; ?> </td>
<td><?php echo $screens[$x]; ?> </td>
<td><?php echo $sentiment[$x]; ?> </td>
<td><?php echo $collection[$x]; ?> </td>
<?php
}
?>
</table>
<br>
<a href="index.php"> Back </a>
<br>
<br>
</div>
</body>
</html>