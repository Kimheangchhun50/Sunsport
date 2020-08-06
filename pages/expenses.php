<!DOCTYPE html>
<html>
<head>
<style>
body {
	background-color: #275A27;
	color: white;
	text-align: center;
}

.container {
    margin: 0 auto;
    width: 1100px;
}
.heading2 {
	color: #275A27;
	text-align: left;
}

table {
  border-collapse: collapse;
  margin: 0 auto;
  margin-top: 15px;
}

table, td,th {
  border: 2px solid white;
  padding: 5px;
}
 th {
 	width: 150px;
 	height: 20px;
 }
th:last-child {
	width: 165px;
}

a {
	padding: 5px;
	font-weight: 100;
}
 input.data {
 	width: calc(100% - 10px);
 	height: 100%;
 	text-align: center;
 }

 input[type=date] {
 	padding: 5px;
 }

.div-btn {
 	margin: 15px 0px 15px 0px;
 	text-align: left;
 }

 .btn {
 	padding: 7px;
 }

h1, .header {
 	text-align: left;
 }

h2 {
	text-align: center;

}
 .header {
 	display: flex;
 }

 .sub-header {
 	margin: 10px 10px 10px 0px;

 }

 button.btn.report {
 	border: 2px solid;
 	background-color: #2196f3;
 	color: white;
 }


 button.btn.report:hover {
    border-color: black;
    color: black;
}

 button.btn.add-col {
 	border-radius: 2px;
 	border: 2px solid;
 	background-color: #2196f3;
 	color: white;
 }
 button.btn.add-col:hover {
    border-color: black;
    color: black;
}

.form-popup {
	width: 300px;
	height: 400px;
	margin: 0 auto;
	display: none;
	position: relative;
	bottom: 0;
	right: 15px;
	border: 2px solid #f1f1f1;
	z-index: 9;
	background-color: white;
}

.choose-report {
	margin: 15px 50px 15px;
	text-align: left;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 80px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  height: 80%;
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

#monthly {
	border: 2px solid white;
	background-color: #2196f3;
	color: #fff;
	padding: 15px;
	width: 125px;
}

 button#monthly:hover {
    border-color: black;
    color: black;
}

#yearly {
	border: 2px solid white;
	background-color: #ffc000;
	color: #fff;
	padding: 15px;
	width: 125px;
}

 button#yearly:hover {
    border-color: black;
    color: black;
}

#myBtn {
 	border: 2px solid;
 	background-color: #2196f3;
 	color: white;
 }

#myBtn:hover {
    border-color: black;
    color: black;
}

</style>
</head>
<body>
<div class="container">
<h1>Expenses</h1>
<div class="header">
	<div  class="sub-header"><button class="btn report" id="myBtn">Expenses Report</button></div>
</div>

<table>
	  <tr>
	  	<th>No</th>
	  	<th>Date</th>
	    <th>Item</th>
	    <th>Unit Price</th>
	    <th>Quantity</th>
	    <th>Sub Total</th>
	    <th>Action</th>
	  </tr>
	  <tr>
		 <th>S001</th>
		 <th>08-03-20</th>
		 <th>Electricity</th>
		 <th>58.25$</th>
		 <th>1</th>
		 <th>58.25$</th>
		 <th>
			<a href="" style="color: yellow;">Edit</a>
			<a href="" style="color: #ff1d1d;">Delete</a>
		 </th>
		</tr>

		 <tr>
		 <th>S002</th>
		 <th>08-04-20</th>
		 <th>Water Supply</th>
		 <th>45.15$</th>
		 <th>1</th>
		 <th>45.15$</th>
		 <th>
			<a href="" style="color: yellow;">Edit</a>
			<a href="" style="color: #ff1d1d;">Delete</a>
		 </th>
		</tr>

		 <tr>
		 <th>S003</th>
		 <th>08-05-20</th>
		 <th>Ball</th>
		 <th>9.25$</th>
		 <th>5</th>
		 <th>46.25$</th>
		 <th>
			<a href="" style="color: yellow;">Edit</a>
			<a href="" style="color: #ff1d1d;">Delete</a>
		 </th>
		</tr>

		 <tr>
		 <th>S004</th>
		 <th>08-05-20</th>
		 <th>Mineral Water</th>
		 <th>1.50$</th>
		 <th>50</th>
		 <th>75.00$</th>
		 <th>
			<a href="" style="color: yellow;">Edit</a>
			<a href="" style="color: #ff1d1d;">Delete</a>
		 </th>
		</tr>
	  <tr>
		 <th>S005</th>
		 <th><input type="date" name=""></th>
		 <th><input class="data" type="name" name="" placeholder="empty"></th>
		 <th><input class="data" type="" name="" placeholder="0.00$"></th>
		 <th><input class="data" type="number" name="" placeholder="empty"></th>
		 <th><input class="data" type="" placeholder="0.00$" ></th>
		 <th>
			<a href="" style="color: #2dec2d;">Save</a>
			<a href="" style="color: #ff1d1d;">Delete</a>
		 </th>
		</tr>
</table>

<div class="div-btn">
	<button class="btn add-col">Add Expense</button>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="choose-report">
    	<h2 class="heading2">Choose your reports option</h2>
	    	<button id="monthly">Monthly</button> 
	    	<button id="yearly">Yearly</button> 
	</div>
  </div>

</div>

</div>
</body>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</html>