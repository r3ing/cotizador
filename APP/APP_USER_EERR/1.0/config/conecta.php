<?php
/*
* Specify the server and connection string attributes.

$serverName = "192.168.51.127\piloto_bi";
$uid = "management";
$pwd = "cms.CV*0512";
$database = "management";
try {
$conn = new PDO("sqlsrv:server=$serverName;database=$database", $uid, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//$conn->setAttribute(PDO::SQLSRV_ATTR_DIRECT_QUERY => true);
echo "Connected to SQL Server<br /><br />\n";
echo "Customers with a CustomerID less than 10<br />\n";
$sql = 'select * from SalesLT.Customer where CustomerID<10';
$results = $conn->query( $sql );
outputRows($results);
echo "<br /><br />Customers with the title Mr. and a CustomerId less than 10<br />\n";
$sql = 'SELECT * FROM users';
$query = $conn->prepare($sql);
$title = 'Mr.';
$query->execute(array(':title'=>$title));
outputRows($query);
// Free statement and connection resources.
$stmt = null;
$conn = null;
} catch( PDOException $e ) {
echo "<h1>Error connecting to SQL Server</h1><pre>";
echo $e->getMEssage();
exit();
}
function outputRows($results)
{
echo "<table border='1'>\n";
while ( $row = $results->fetch( PDO::FETCH_ASSOC ) ){
echo "<tr><td>{$row['Title']}</td><td>{$row['FirstName']}</
td><td>{$row['MiddleName']}</td><td>{$row['LastName']}</td>\n";
}
echo "</table>\n";
return;
}
*/ 
?>