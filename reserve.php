<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
<a href="index.php"><img id="icon" src="img/logo.jpg" height=100></a>
<ul id="liulan">
  <li><a href="index.php">Home</a></li>
  <li><a href="reserve.php">Reservation</a></li>
  <li><a href="about.php">About us</a></li>
  <li><a href="admin.php">Admin</a></li>
</ul>
<div id="label"><text></br><font color="red">This hotel owns 8 superior room, 8 deluxe room, and 8 suites</font></text></div>

	<form action="confirm.php" method="post">
	        <table id="lodging" align="center">
	            <tr>
	        		<td>
						<select name="guestnum">
						    <option>please select</option>
  							<option value="1">1</option>
  							<option value="2">2</option>
  							<option value="3">3</option>
  							<option value="4">4</option>
						</select>
					</td>
					<td>
						<select name="typeofroom">
						    <option>please select room</option>
  							<option value="superior">superior</option>
  							<option value="deluxe">deluxe</option>
  							<option value="suite">suite</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label>number of guests</label>
					</td>
					<td>
						<label>select number of guests</label>
					</td>
				</tr>
	        	<tr>
	        		<td>
						<input type="date" name="checkin">
					</td>
					<td>
						<input type="date" name="checkout">
					</td>
				</tr>
				<tr>
					<td>
						<label>check-in date</label>
					</td>
					<td>
						<label>check-out date</label>
					</td>
				</tr>
	        	<tr>
	        		<td colspan="2">
	        			<h4>Full Name</h4>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
						<input type="text" name="firstname">
					</td>
					<td>
						<input type="text" name="lastname">
					</td>
				</tr>
				<tr>
					<td>
						<label>First Name</label>
					</td>
					<td>
						<label>Last Name</label>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h4>Address</h4>	
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="text" name="addressone">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label>Street Address</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="addresstwo">
					</td>
					<td>
						<input type="text" name="zip" placeholder="11111">
					</td>
				</tr>
				<tr>
					<td>
						<label>Street Address 2</label>
					</td>
					<td>
						<label>zip code</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="city">
					</td>
					<td>
						<select name="state">
							<label>Select a State</label>
								<?php $states=array("Please Select","AL","AK","AZ","AR","CA","CO","CT","DE","FL","GA","HI","ID","IL","IN","IA","KS","KY","LA","ME","MD","MA","MI","MN","MS","MO","MT","NE","NV","NH","NJ","NM","NY","NC","ND","OH","OK","OR","PA","RI","SC","SD","TN","TX","UT","VT","VA","WA","WV","WI","WY"); 
		          					for($i=0;$i<count($states);$i++)
		    						{
		    							echo "<option value='".$states[$i]."'>".$states[$i]."</option>";  
		    						}		
								?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label>City</label>
					</td>
					<td>
						<label>select your state</label>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h4>Email Address</h4>
					</td>
				</tr>	
				<tr>
					<td colspan="2">
						<input type="email" name="email" placeholder="test@example.com">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h4>Phone(10 digits)</h4>
					</td>
				</tr>	
				<tr>
					<td colspan="2">
						<input type="tel" name="phone" placeholder="xxxxxxxxxx">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h4>Breakfast(student only)</h4>
					</td>
				</tr>
				<tr>
					<td>
						<select name="breakfast">
						   <option value="no">no</option>
						   <option value="yes">yes</option>
						</select>
					</td>
					<td>
						<input type="text" name="loyalty">
					</td>
				</tr>
				<tr>
					<td>
						<label>breakfast needed?</label>
					</td>
					<td>
						<label>loyalty number</label>
					</td>
				</tr></br>
				<tr>
					<td colspan="2">
						<h4>Shuttle Service(student only)</h4>
					</td>
				</tr>
				<tr>
					<td>
						<select name="shuttle">
						   <option value="no">no</option>
						   <option value="yes">yes</option>
						</select>
					</td>
					<td>
						<input type="text" name="loyalty">
					</td>
				</tr>
				<tr>
					<td>
						<label>Shuttle Bus?</label>
					</td>
					<td>
						<label>Bus Promo number</label>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="submit" style="width:100%;height:50px;color:white;background-color:black">
					</td>
				</tr>	
	</form>
</table>
<footer>
	
	<ul id="footer">
  		<li><a>@2019 Copyright Live&Play Group</a></li>
  		<li><a>41st Street, New York, NY 10125</a></li>
  		
  		<li><a href="http://maps.google.com/?q=West 41st Street, New York, NY" target="_blank">Map</a></li>
  		<li style="float:right"><a class="active" href="#">social</a></li>
	</ul>
</footer>
</html>