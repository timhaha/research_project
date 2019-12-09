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
<?php
	
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	function pre_test($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
	
	$errors=array();
	
	/**
		first time validation
	*/
		if(empty($_POST["firstname"])) {
    		//echo "First name is required</br>";
    		array_push($errors,"<font size='3' color='red'>First name is required</font></br>");
  		}else {
    		$name =pre_test($_POST["firstname"]);
    		if (!preg_match("/^[a-zA-Z ]*$/",$_POST["firstname"])) {
      			//echo "First name can only be letters</br>"; 
      			array_push($errors,"<font size='3' color='red'>First name can only be letters</font></br>");
    		}
  		}
  	
  		if(empty($_POST["lastname"])) {
    		//echo "Last name is required</br>";
    		array_push($errors,"<font size='3' color='red'>Last name is required!</font></br>");
  		}else {
    		$name =pre_test($_POST["lastname"]);
    		if (!preg_match("/^[a-zA-Z ]*$/",$_POST["lastname"])) {
      			//echo "Last name can only be letters</br>"; 
      			array_push($errors,"<font size='3' color='red'>Last name can only be letters</font></br>");
    		}
  		}
  	
  	/**
  		zipcode validation
  	*/
  		if(empty($_POST["zip"])) {
    		
    		array_push($errors,"<font size='3' color='red'>zipcode is required!</font></br>");
  		}else {
    		$name =pre_test($_POST["zip"]);
    		if (!preg_match('#[0-9]{5}#', $_POST["zip"])) {
      			
      			array_push($errors,"<font size='3' color='red'>zipcode can only be 5 digits!</font></br>");
    		}
  		}
  		
  	/**
  		state validation
  	*/
  		if($_POST["state"]=="Please Select") {
    		//echo "state is required</br>";
    		//echo "2222".$_POST["state"]."2222";
    		array_push($errors,"<font size='3' color='red'>state is required, Please select one!</font></br>");
  		}
  	
        
  	/*email address
  	  formatting
  	*/
  		if(empty($_POST["email"])) {
    		//echo "<font size='3' color='red'>Wrong! Email is required</font></br>";
    		array_push($errors,"<font size='3' color='red'>Wrong! Email is required</font></br>");
  		}else {
    		$email = pre_test($_POST["email"]);
    		// check if e-mail address is well-formed
    			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			//$emailErr = "<font size='3' color='red'>Invalid email format</font></br>"; 
      			array_push($errors,"<font size='3' color='red'>Invalid email format</font></br>");
    		}
  		}
  	
  	
  	/**
  	 phone validation
  	*/ 	
  		if(empty($_POST["phone"])) {
    		//echo "<font size='3' color='red'>Wrong! Email is required</font></br>";
    		array_push($errors,"<font size='3' color='red'>Wrong! Phone is required</font></br>");
  		}else {
    		$phone = pre_test($_POST["phone"]);
    		// check if e-mail address is well-formed
    	    if(!preg_match('/^[0-9]{10}+$/', $phone)) {
      			//$emailErr = "<font size='3' color='red'>Invalid email format</font></br>"; 
      			array_push($errors,"<font size='3' color='red'>Invalid Phone number,only ten digits allowed!!</font></br>");
    		}
  		}
  		 	    
  	
  	
	/*compare checkin and
	  checkout time
	*/		
		//current date
   		$currentTimeinSeconds = time();  
  		// converts the time in seconds to current date  
		$currentDate = date('Y-m-d', $currentTimeinSeconds); 
  		// prints the current date 
		//echo ($currentDate);
		if($_POST["typeofroom"]=="please select room"){
		   array_push($errors,"<font size='3' color='red'>please select your room type!</font></br>");		
   		
		}
		
		if($_POST["guestnum"]=="please select"){
		   array_push($errors,"<font size='3' color='red'>please select number of guests!</font></br>");
		}
   		if($_POST["checkin"]>$_POST["checkout"])
   		{
   			array_push($errors,"<font size='3' color='red'>Check in date can not be after check out date!</font></br>");
   		}elseif($_POST["checkin"]<$currentDate){
   			array_push($errors,"<font size='3' color='red'>Check in date must be after today's date!</font></br>");		
   		}else{
   			
			if (!$conn) {
    			echo "<font size='3' color='red'>Can not connect to the database!!</font></br>";
			} 
            //check is the matched room is booked out, cuz we only get 4 superior room, 4 deluxe room, and 4 suites
			
	       $sql = "SELECT * 
					FROM tian
					WHERE ((checkin between '".$_POST["checkin"]."' AND '".$_POST["checkout"]."') OR (checkout between '".$_POST["checkin"]."' AND '".$_POST["checkout"]."')) AND (typeofroom = '".$_POST["typeofroom"]."')";
			
	       
			$result = $conn->query($sql);
            
			if ($result->num_rows >=4) {
    			array_push($errors, "<font size='3' color='red'>Sorry, no room available or matches your criteria at this moment</font>");
			} 
   		}
   	     if($_POST['breakfast']=="yes"){
   	    	$breakfast="yes";
   	    }else{
   	        $breakfast="no";
   	    } 
   	    if($_POST['loyalty']=="1992" ||$_POST['breakfast']=="yes"){
   	    	$b_free="free breakfast!";
   	    }elseif($_POST['loyalty']!="1992" ||$_POST['breakfast']=="yes"){
   	        $b_free="please pay $20 breakfast fee before check in cuz incorrect loyalty number";
   	    }elseif($_POST['loyalty']=="" ||$_POST['breakfast']=="yes"){
   	        $b_free="please pay $20 breakfast fee";
   	    }
   	    
   	    
   	    
   	    
   	    
   	    if($_POST['shuttle']=="yes"){
   	    	$breakfast="yes";
   	    }else{
   	    	$breakfast="no";
   	    }
   	    if($_POST['shuttle']=="2019" ||$_POST['shuttle']=="yes"){
   	    	$b_free="free shuttle!";
   	    }elseif($_POST['shuttle']!="2019" ||$_POST['shuttle']=="yes"){
   	    	$b_free="Sorry, shuttle service is for student only";
   	    }elseif($_POST['loyalty']=="" ||$_POST['breakfast']=="yes"){
   	    	$b_free="Sorry, shuttle service is for student only";
   	    }
   	
   	
   	
   		/*final*/
   		if(count($errors)>0){
   		    echo '<table id="errors" align="center">';
   			for($i=0;$i<count($errors);$i++)
   			{
   				echo "<tr><td>".$errors[$i]."</td></tr>";
   			}
   			echo "<tr><td></br><a href='#'>click the brwoser's back button to go back to the reservation page please</a></td></tr></table>";
   		}
   		else {
   		        echo '<table id="errors" align="center">';
   		        echo "<tr><td><img src='img/confirm.png' height=300 width=300></td></tr>";
    			echo "<tr><td>yes your reservation made</td></tr></table>";
    			
    			echo $sql = "INSERT INTO
					   tian(firstname, lastname, zip,guestnum,typeofroom,address,city,guest_phone,state,email,checkin,checkout,breakfast)
						VALUES('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["zip"]."','".$_POST["guestnum"]."','".$_POST["typeofroom"]."','"."22"."','HU','".$_POST["phone"]."','".$_POST["state"]."','".$_POST["email"]."','".$_POST["checkin"]."','".$_POST["checkout"]."','".$_POST["breakfast"]."')";
		
			$result = $conn->query($sql);
   		}
   		
   
?>

<footer>
	<ul id="footer">
  		<li><a>@2019 Copyright Live&Play Group</a></li>
  		<li><a>41st Street, New York, NY 10125</a></li>
  		
  		<li><a href="http://maps.google.com/?q=West 41st Street, New York, NY" target="_blank">Map</a></li>
  		<li style="float:right"><a class="active" href="#">Social</a></li>
	</ul>
</footer>