<?php
$userinfo = $this->session->userdata('userinfo');
// var_dump($schedule);
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></link>

	<style type="text/css">
form{
	margin-left: 150px;
	margin-top: 150px;
	}
#in {
	width: 300px;
	margin-bottom: 15px;
}
button{
	width:20px;
}
</style>
</head>
<body>
<div id="container">
<form action="/maincontrol/update" method="POST">
		<label for="task">Task</label>
		<input id="in" type="text" name="task"/>
		</br>
		<label for="status">Status</label>
		<select>
  		<option value="done">Done</option>
  		<option value="pending">Pending</option>
  		<option value="missed">Missed</option>		
  		</select>
  		<br>
		<label for="date">Date</label>
  		<input id="in" type="date" name="day" mix="2016-04-29"><br>
		</br>
		<label for="time">Time</label>
		<input id="in" type="time" name="time" class="time-mm-hh" min="6:00" max="23:00" step="1800" />
		<br>
		<input id="button" type="submit" value="Update">
		</form>
</div>
</body>
</html>