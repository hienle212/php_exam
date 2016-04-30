<?php
$userinfo = $this->session->userdata('userinfo');
// var_dump($schedule);
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Users page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"></link>

</head>
<body>
<div id="container">
<span><a href="/logout">Logout</a></span>
<h1> Hello, <?=  $userinfo['name'] ?>!</h1>
<p>Here are your appointments for today, <?= $date_on_page ?></p>
<table class="table">
		<thead>
			<th>Tasks</th>
			<th>Time</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
	 <?php
			for ( $i = 0; $i < count($schedule); $i++) { 
			?>
	<tr>
 			<td><?= $schedule[$i]['tasks'] ?></td>
			<td><?= $schedule[$i]['time'] ?></td>
			<td><?= $schedule [$i]['status'] ?></td>
			<td> <a href="/editapp/<?= $userinfo['id']?>/<?= $schedule[$i]['appointments_id']?>">Edit</a> |  <a href="/removelist/<?= $schedule[$i]['appointments_id']?>">Delete</a></td>	
	</tr>
	 <?php } 
	?> 					
		</tbody>
	</table>
<p> Your Other appointments: </p>
<table class="table">
		<thead>
			<th>Tasks</th>
			<th>Date</th>
			<th>Time</th>
		</thead>
		<tbody>
	<tr>
 			<td></td>
			<td></td>
			<td></td>
		
	</tr>						
	</tbody>
	</table>
<p>Add Appointment</p>
<form id="form1" action="/main/addMore" method="post">
  Date:
  <input type="text" name="date"><br>
  Task:
  <input type="text" name="task">
  <br>
  Time:
<input type="time" name="time" class="time-mm-hh" min="6:00" max="23:00" step="1800" />

<br>
  <input type="submit" name="add" value="add">
</form>

</div>

</body>
</html>