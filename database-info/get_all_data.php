<?php

$database = include("config.php");				//get sensative info from config file
$ID = $_POST["id"];						//get ID from post request

$con = mysqli_init();						//initialise mysql
if (!$con) {
  die("mysqli_init failed");
}

								//try connecting to the database
if (!mysqli_real_connect($con, $database["host"],$database["user"],$database["pass"],"ar_dnd",3306,NULL)) {
  die("Connect Error: " . mysqli_connect_error());
}

$info = "SELECT * FROM ar_dnd.char_info  WHERE id = $ID";	//query the char_info table
$result = mysqli_query($con, $info);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		echo $row["name"]. "<br \>".
			 $row["model"]. "<br \>".
			 $row["race"]. "<br \>".
			 $row["class"]. "<br \>".
			 "--- <br \>";
	}
}
mysqli_free_result($result);

$stats = "SELECT * FROM ar_dnd.char_stats WHERE id = $ID";	//query the char_stats table
$result = mysqli_query($con, $stats);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		echo $row["str"]. "<br \>".
			 $row["dex"]. "<br \>".
			 $row["con"]. "<br \>".
			 $row["intel"]. "<br \>".
			 $row["wis"]. "<br \>".
			 $row["cha"]. "<br \>".
			 $row["current_hp"]. "<br \>".
			 $row["max_hp"]. "<br \>".
			 $row["armor"]. "<br \>".
			 $row["speed"]. "<br \>".
			 "--- <br \>";
	}
}
mysqli_free_result($result);

$conditions = "SELECT * FROM ar_dnd.conditions WHERE id = $ID";	//query the conditions table
$result = mysqli_query($con, $conditions);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)){
		echo $row["charm"]. "<br \>".
			 $row["deafen"]. "<br \>".
			 $row["fatigue"]. "<br \>".
			 $row["fright"]. "<br \>".
			 $row["grappled"]. "<br \>".
			 $row["incapacitated"]. "<br \>".
			 $row["invisible"]. "<br \>".
			 $row["paralyzed"]. "<br \>".
			 $row["petrified"]. "<br \>".
			 $row["poison"]. "<br \>".
			 $row["prone"]. "<br \>".
			 $row["restained"]. "<br \>".
			 $row["stun"]. "<br \>".
			 $row["unconcious"]. "<br \>".
			 $row["exhaustion"]. "<br \>".
			 "--- <br \>";
	}
}
mysqli_free_result($result);
mysqli_close($con);						//close the connection

?>
