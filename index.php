<!DOCTYPE html>
<html>
<head>
	<title>New Booking</title>
</head>

<body>
<style>
body {

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
 input {
 	width: 98%;
 }

</style>
<center>
<div>
<form id="form3">

<table>
	<tr style="background-color: green;">
		<th colspan="2"><h4>New Booking</h4></th>  
	</tr>
	<tr>
		<th>Date:</th>
		<th><input type="Date" name="ndate"></th>
	</tr>

	<tr>
		<th>Play Time:</th>
		<th><input type="double" name="ptime"></th>
	</tr>

	 <tr>
		<th>Clients Name:</th>
		<th><input type="text-align" name="cname"></th>
	</tr>
	<tr>
		<th>Phone Number:</th>
		<th><input type="text-align" name="Phone"></th>
	</tr>

	<tr>
	<th>Remark:</th>
		<th><input type="text-align" name="Remark"></th>
	</tr>

    <tr>
    	<th colspan="2">
    		<button type="" style="background-color: green;">Save</button> 
    		<button type="" style="background-color: red;">Cancel</button>
    	</th>
    </tr>
</table>
</form>
</div>
</center>
</body>
</html>