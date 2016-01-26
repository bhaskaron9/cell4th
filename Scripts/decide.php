<?php
	STATIC $f=0;
	if(isset($_POST["price_array"])&&
		isset($_POST["popularity_array"])&&
		isset($_POST["brand_array"])&&
		isset($_POST["durability_array"])&&
		isset($_POST["looks_array"])&&
		isset($_POST["display_array"])&&
		isset($_POST["sensors_array"])&&
		isset($_POST["battery_array"])&&
		isset($_POST["speed_array"])&&
		isset($_POST["os_array"])&&
		isset($_POST["camera_array"])&&
		isset($_POST["ram_array"])&&
		isset($_POST["sound_array"]))
	{
		$pricev = $_POST["price_array"];
		$popularityv = $_POST["popularity_array"];
		$brandv = $_POST["brand_array"];
		$durabilityv = $_POST["durability_array"];
		$looksv = $_POST["looks_array"];
		$displayv = $_POST["display_array"];
		$sensorsv = $_POST["sensors_array"];
		$batteryv = $_POST["battery_array"];
		$speedv = $_POST["speed_array"];
		$osv = $_POST["os_array"];
		$camerav = $_POST["camera_array"];
		$ramv = $_POST["ram_array"];
		$soundv = $_POST["sound_array"];
		
		if(!empty($pricev)&&
			!empty($popularityv)&&
			!empty($brandv)&&
			!empty($durabilityv)&&
			!empty($looksv)&&
			!empty($displayv)&&
			!empty($sensorsv)&&
			!empty($batteryv)&&
			!empty($speedv)&&
			!empty($osv)&&
			!empty($camerav)&&
			!empty($ramv)&&
			!empty($soundv))
		{
			echo $pricev;
			echo $popularityv;
			echo $brandv;
			echo $durabilityv;
			echo $looksv;
			echo $displayv;
			echo $sensorsv;
			echo $batteryv;
			echo $speedv;
			echo $osv;
			echo $camerav;
			echo $ramv;
			echo $soundv;
			include "mysqlconnect.php";
			$query = "SELECT * FROM Specifications  LEFT JOIN psyCHOder ON Specifications.Cell_id=psyCHOder.Cell_id WHERE psyCHOder.Price='".mysql_real_escape_string($pricev)."'&&
																															psyCHOder.Popularity = '".mysql_real_escape_string($popularityv)."'&&
																															psyCHOder.Brand = '".mysql_real_escape_string($brandv)."'&&
																															psyCHOder.Durability = '".mysql_real_escape_string($durabilityv)."'&&
																															psyCHOder.Looks = '".mysql_real_escape_string($looksv)."'&&
																															psyCHOder.Display = '".mysql_real_escape_string($displayv)."'&&
																															psyCHOder.Sensors = '".mysql_real_escape_string($sensorsv)."'&&
																															psyCHOder.Battery = '".mysql_real_escape_string($batteryv)."'&&
																															psyCHOder.Speed = '".mysql_real_escape_string($speedv)."'&&
																															psyCHOder.Operating_System = '".mysql_real_escape_string($osv)."'&&
																															psyCHOder.Camera = '".mysql_real_escape_string($camerav)."'&&
																															psyCHOder.RAM = '".mysql_real_escape_string($ramv)."'&&
																															psyCHOder.Sound = '".mysql_real_escape_string($soundv)."'";
			if($query_run = mysql_query($query))
			{
				if(mysql_num_rows($query_run)==NULL)
				{
					echo "No match found";
				}
				else
				{
					while ($query_rows = mysql_fetch_assoc($query_run))
					{
						$Cell_Name = $query_rows['Cell_name'];
						$Cell_Desc = $query_rows['Description'];
						echo "$Cell_Name"."-----"."$Cell_Desc";
					}
				}
			}
			else
				echo "Query Failed";
		}
		else 
			echo "Can\'t proceed... Please select all fields...";
	}
	else
		if($f==0)
		{
			echo "Please set Everything well";
			$f=1;
		}
		else
			echo "Fields Missing";
?>
<form action="decide.php" id="decideform" method="POST">
<select name="price_array">  
		<option value="" disabled selected>Price Range</option>
        <option value="1">Very low</option>
        <option value="2">Low</option>
        <option value="3">Fair Enough</option>
        <option value="4">High</option>
        <option value="5">Very High</option>
    </select>
<br><br>
    <select name="popularity_array">
        <option value="" disabled selected>Market Popularity</option>
        <option value="1">Low</option>
        <option value="2">Fair Enough</option>
        <option value="3">High</option>
    </select>
<br><br>
    <select name="brand_array">
        <option value="" disabled selected>Brand</option>
        <option value="1">Low</option>
        <option value="2">Fair Enough</option>
        <option value="3">High</option>
        <option value="4">Very High</option>
    </select>
<br><br>
    <select name="durability_array">
        <option value="" disabled selected>Durability</option>
        <option value="1">Desired</option>
        <option value="2">Compromised</option>
    </select>
<br><br>
    <select name="looks_array">
        <option value="" disabled selected>Looks</option>
        <option value="1">Slim and Light</option>
        <option value="2">Classical</option>
        <option value="3">Fair Enough</option>
        <option value="4">Compromised</option>
    </select>
<br><br>
    <select name="display_array">
        <option value="" disabled selected>Display Properties</option>
        <option value="1">Large Screen,HD, Awesome View</option>
        <option value="2">Fair Screen, Fair Params</option>
        <option value="3">Compromised</option>
    </select>
<br><br>
    <select name="sensors_array">
        <option value="" disabled selected>Touch and Geo-Sensors</option>
        <option value="1">Higher Specs</option>
        <option value="2">Fair Specs</option>
        <option value="3">Compromised</option>
    </select>
<br><br>
    <select name="battery_array">
        <option value="" disabled selected>Battery life</option>
        <option value="1">Long Life</option>
        <option value="2">Fair Life</option>
    </select>
<br><br>
    <select name="speed_array">
        <option value="" disabled selected>Speed</option>
        <option value="1">High</option>
        <option value="2">Fair</option>
        <option value="3">Compromised</option>
    </select>
<br><br>
    <select name="os_array">
        <option value="" disabled selected>Operating System</option>
        <option value="1">Latest</option>
        <option value="2">Fair Enough</option>
        <option value="3">Compromised</option>
    </select>
<br><br>
    <select name="camera_array">
        <option value="" disabled selected>Camera</option>
        <option value="1">I take a lot of Selfies</option>
        <option value="2">Am Photogenic</option>
        <option value="3">Fair Camera Usage</option>
        <option value="4">Rare CAmera Usage</option>
    </select>
<br><br>
    <select name="ram_array">
        <option value="" disabled selected>Tasks you run</option>
        <option value="1">Am a Gamer</option>
        <option value="2">Busy Stud</option>
        <option value="3">Fair Background Tasks</option>
        <option value="4">Compromised</option>
    </select>
<br><br>
    <select name="sound_array">
        <option value="" disabled selected>Sound Quality</option>
        <option value="1">Am Deaf :p</option>
        <option value="2">I can hear ya</option>
        <option value="3">Compromised</option>
    </select>
<br><br>
<input type="submit" value="Decide">
</form>