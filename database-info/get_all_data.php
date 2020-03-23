<?php
$database = include("config.ini");
$ID = $_POST["id"];
//$database = include("D:\Programs\XAMPP\htdocs\php\config.ini");

$con = mysqli_init();
if (!$con) {
  die("mysqli_init failed");
}

// Specify connection timeout
//mysqli_options($con, MYSQLI_OPT_CONNECT_TIMEOUT, 10);
mysqli_ssl_set($con,
                NULL,//'/etc/mysql/ssl/client-key.pem',
                NULL,//'/etc/mysql/ssl/server-cert.pem',
                NULL,//'ssl/ca-cert.pem',
				'/etc/mysql/ssl/',//NULL,
				NULL);
				
if (!mysqli_real_connect($con, $d<?php

$database = include("config.php");
$ID = $_POST["id"];

$con = mysqli_init();
if (!$con) {
  die("mysqli_init failed");
}

if (!mysqli_real_connect($con, $database["host"],$database["user"],$database["pass"],"ar_dnd",3306,NULL)) {
  die("Connect Error: " . mysqli_connect_error());
}

$info = "SELECT * FROM ar_dnd.char_info  WHERE id = $ID";
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

$stats = "SELECT * FROM ar_dnd.char_stats WHERE id = $ID";
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

$conditions = "SELECT * FROM ar_dnd.conditions WHERE id = $ID";
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
  
mysqli_close($con);

?>  atabase["host"],$database["user"],$database["pass"],"ar_dnd",3306,NULL,MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT)) {
  die("Connect Error: " . mysqli_connect_error());
}

$sql = "SELECT name FROM ar_dnd.char_info where id = $ID";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name  : ". $row["name"]. " <br/>";
    }
}
$sql = "SELECT current_hp,max_hp, speed, armor from ar_dnd.char_stats where id = $ID";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "Health: ". $row["current_hp"] ."/". $row["max_hp"]. "<br/>".
			 "armor : ". $row["armor"]. "<br/>".
			 "Speed : ". $row["speed"]. "<br/><br/>";
    }
}

$sql = "SELECT * FROM ar_dnd.char_stats where id = $ID";
$result = mysqli_query($con, $sql);
echo "  <table>
		<tr>
		<td>str</td>
		<td>dex</td>
		<td>con</td>
		<td>int</td>
		<td>wis</td>
		<td>cha</td>
		</tr>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['str'] . "</td>"
				."<td>" . $row['dex'] . "</td>"
				."<td>" . $row['con'] . "</td>"
				."<td>" . $row['intel'] . "</td>"
				."<td>" . $row['wis'] . "</td>"
				."<td>" . $row['cha'] . "</td></tr>";
    }
}
echo "</table>";
mysqli_close($con);
?>