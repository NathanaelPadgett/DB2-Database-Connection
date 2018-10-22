define('DB_DRIVER',			'{IBM i Access ODBC DRIVER}');
define('DB_DATABASE',		'LIBRARY_NAME');
define('DB_SYSTEM',		'SERVER_NAME');
define('DB_PORT',			'446');
define('DB_PROTOCOL',		'TCPIP');
define('DB_USERNAME',		'xxxx');
define('DB_PASSWORD',		'xxxx');

define('DATABASE', "DRIVER=".DB_DRIVER.";DATABASE=".DB_DATABASE.";SYSTEM=DB_SYSTEM;PORT=".DB_PORT.";PROTOCOL=".DB_PROTOCOL);
$conn = odbc_connect(DATABASE,DB_USERNAME,DB_PASSWORD);
if(!$conn){die("Database connection error.");}

$q1 = "SELECT * FROM LIBRARY.TABLE";
$rs1 = odbc_prepare($conn, $q1);
odbc_execute($rs1);
while(odbc_fetch_row($rs1)){
	$fieldname = odbc_result($rs1, "FIELDNAME");
  print $fieldname."<br>";
}
