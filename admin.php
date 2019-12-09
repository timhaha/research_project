
<?php
$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	
	//current date
   		$currentTimeinSeconds = time(); 
  		// converts the time in seconds to current date  
		$currentDate = date('Y-m-d', $currentTimeinSeconds); 
		
		//echo "check is this within a week".$within_week=$tomorrow6=date("Y-m-d", strtotime("+6 day"));
		
		
  		// prints the current date 
		
		$tomorrow=date("Y-m-d", strtotime("+1 day"));
		$tomorrow2=date("Y-m-d", strtotime("+2 day"));
		$tomorrow3=date("Y-m-d", strtotime("+3 day"));
		$tomorrow4=date("Y-m-d", strtotime("+4 day"));
		$tomorrow5=date("Y-m-d", strtotime("+5 day"));
		$tomorrow6=date("Y-m-d", strtotime("+6 day"));
		
		$ava=array();
		$dater=array($tomorrow,$tomorrow2,$tomorrow3,$tomorrow4,$tomorrow5,$tomorrow6);
		//sql to choose related data must!
		//$sql='SELECT * FROM tian WHERE ((checkin BETWEEN "'.$currentDate.'" AND "'.$tomorrow6.'" ) OR (checkout BETWEEN "'.$currentDate.'" AND "'.$tomorrow6.'")) AND (typeofroom="superior")';
			
     //  echo $sql;
        for($i=0;$i<count($dater);$i++){
        	$sql='SELECT * FROM tian WHERE ((checkin <= "'.$dater[$i].'" AND checkout >= "'.$dater[$i].'" ) OR (checkout BETWEEN "'.$dater[$i].'" AND "'.$tomorrow6.'")) AND (typeofroom="superior")';
        	
			if ($result=mysqli_query($conn,$sql))
  			{
  				// Return the number of rows in result set
  				//$sql='SELECT * FROM tian WHERE ((checkin BETWEEN "'.$dater[$i].'" AND "'.$tomorrow6.'" ) OR (checkout BETWEEN "'.$dater[$i].'" AND "'.$tomorrow6.'")) AND (typeofroom="superior")';
  				
  				$rowcount=8-mysqli_num_rows($result);
  				array_push($ava,"superior".$dater[$i]." has ".$rowcount." room available");
            	
  			}
  		}
  		
  			// original $sql='SELECT * FROM tian WHERE (checkin >="'.$currentDate.'") AND (checkout<="'.$tomorrow6.'") AND (typeofroom="deluxe")';
  			
        for($i=0;$i<count($dater);$i++){
        	$sql='SELECT * FROM tian WHERE ((checkin <= "'.$dater[$i].'" AND checkout >="'.$dater[$i].'" ) OR (checkout BETWEEN "'.$currentDate.'" AND "'.$tomorrow6.'")) AND (typeofroom="deluxe")';
        		
			if ($result=mysqli_query($conn,$sql))
  			{
  				// Return the number of rows in result set
  				$rowcount=8-mysqli_num_rows($result);
  				array_push($ava,"deluxe ".$dater[$i]." has ".$rowcount." room available");
            	
  			}
  		}
  		
  		
        for($i=0;$i<count($dater);$i++){
        	
        	$sql='SELECT * FROM tian WHERE ((checkin <= "'.$currentDate.'" AND checkout >="'.$dater[$i].'" ) OR (checkout BETWEEN "'.$currentDate.'" AND "'.$tomorrow6.'")) AND (typeofroom="suite")';
        	
        	
			if ($result=mysqli_query($conn,$sql))
  			{
  				// Return the number of rows in result set
  				$rowcount=8-mysqli_num_rows($result);
  				array_push($ava,"suite ".$dater[$i]." has ".$rowcount." room available");
            	
  			}
  		}
  		echo '<table id="zong" align="center" style="text-align:center">';
  		for($i=0;$i<count($ava);$i++)
  		{
  				echo "<tr>
  					<td>".$ava[$i]."</td></tr>";
  		    $sql="insert into play_records(records) values('".$ava[$i]."')";
  			$result=mysqli_query($conn,$sql);
  		}
  		echo '</table>';
  		
  ?>
		