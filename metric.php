<!DOCTYPE html>
<html>
<head>
<title> Box-Office Opening Weekend Prediction using Twitter Data </title>
<?php require_once "bootstrap.php"; ?>
<style>
td{
width:300px;
}
tr:hover {background-color: #f1f1f1;}
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
<p><h2>Box-Office Opening Weekend Predictor </h2> <br></p>
<table>
<tr><th>Upcoming Releases </th><th></th></tr>
<form method="post" action="predict.php">
<tr>
<td> Select Movie </td>
<td>
<select name="hashtag">
<option value="#Shazam">Shazam!</option>
<option value="#Dumbo">Dumbo</option>
<option value="#Split">Split</option>
<option value="#After">After</option>
<option value="#Hellboy">Hellboy</option>
</select>
</td>
</tr>
<tr>
<td>Metrics:</td>
<td></td>
</tr>
<tr>
<td>Number of Screens </td>
<td><input type="radio" name="met" value="1"></td>
</tr>
<tr>
<td>Number of Tweets </td>
<td> <input type="radio" name="met" value="2"></td>
</tr>
<tr>
<td>Both
</td>
<td><input type="radio" name="met" value="3" checked></td>
</tr>
<tr>
<td>Include Sentiment </td>
<td> Yes: <input type="radio" name="sent" value="1" checked >
No: <input type="radio" name="sent" value="0"> </td>
<tr>
<tr>
<td><input type="submit" value="Predict"> </td>
<td><input type ="submit" name="cancel" value="Cancel"></td>
</tr>
</table>
</form>
</div>
</body>
</html>