<?php
//////////////////////////////////////////////////////////////
// SQL PDO Interface Function | Nick Elder | June 12th 2015 //
//////////////////////////////////////////////////////////////
/* Use of PDO over mysqli allows for prepared statements    */

//User database credentials
$host = "localhost";
$user = "root";
$pass = "yourp@ssw0rd";
$db = "db_name";

//Initialize database connection
$connection = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', ''.$user.'', ''.$pass.'');

//sqlQuery function accepts the connection, the sql query (using ? for variables), an array of the variables to be filled in (where ? are)
function sqlQuery($connection, $query, $args = array()){

	//Prepare and execute statement (avoids sql injection by validating the expected input)
	$stmt = $connection->prepare($query);
	$stmt->execute($args);

	//Output the results as an associative array for use in PHP script
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

//Sample Use:
//$return = sqlQuery($connection, "SELECT * FROM my_table;");
//$returntwo = sqlQuery($connection, "SELECT * FROM prepared WHERE name = ?;", array("nick"));
//sqlQuery($connection, "INSERT INTO prepared (name,age) VALUES (?,?)", array("Jane", 18));
?>