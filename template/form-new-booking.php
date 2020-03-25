<!DOCTYPE html>
<html>
<head>
	<title>New Booking</title>
</head>

<body>
<style>
body {
  background-color: green;
  color: white;
  font-family: sans-serif;
}

h1 {
font-size: 50px;
}
form.form1{
  font-size: 18px;
}
input {
  border-collapse:collapse;
}

 table{
  width: 100%;
 }

table, td, tr, th{
  border: 2px double black;
  width: 30%;
  height: 100%;
  text-align: left;
 }
</style>

<form id="form3">

<table>
	<tr>
		<th colspan="2"><h4>New Booking</h4></th>  
	</tr>
	<tr>
		<th>Date:</th>
		<th></th>
	</tr>

	<tr>
		<th>Play Time:</th>
		<th></th>
	</tr>

	 <tr>
		<th>Clients Name:</th>
		<th></th>
	</tr>
	<tr>
		<th>Phone Number1:</th>
		<th></th>
	</tr>
	   <tr>
	<th>Remark:</th>
		<th></th>
	</tr>

    <tr>
    	<th><button type="" name="bsave">Save</button></th>
    	<th><button type="" name="bcancel" style="background-color: red;">Cancel</button></th>
  </tr>
</table>
</form>
</body>
</html>