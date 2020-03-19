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
				
if (!mysqli_real_connect($con, $database["host"],$database["user"],$database["pass"],"ar_dnd",3306,NULL,MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT)) {
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