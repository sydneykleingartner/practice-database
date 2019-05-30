<?php
//initializing the server and the username & passworld that will be used
$servername = "localhost";
$username = "username";
$password = "password";

//create connection between the server and the database
$conn = new mysqli($servername, $username, $password);
//check to make sure that the connection works
if ($conn->connect_error) {
	die("Connection failed: " > $conn->connect_error);
}
echo "Connected successfully";

//create the database
$sql = "CREATE DATABASE test-database";
//verify that the database was created successfully
if ($conn->query($sql) === TRUE) {
	echo "The database was created successfully!";
}
else {
	echo "Error creating database: " . $conn->error;
}

//create a table in the database

//each class added will be given a key to refer to it
//not null = the user must input data
//unsigned = 0 or positive integers
//automatically will increase based on # of classes added to the database
$sql = "CREATE TABLE myClasses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
subjectcode VARCHAR(4) NOT NULL,
classcode VARCHAR(4) NOT NULL UNSIGNED,
classname VARCHAR(50) NOT NULL,
numclasses AUTO_INCREMENT NOT NULL
)";

//insert data into the table
//data to be inserted: CSCI 2113 Software Engineering
$sql = "INSERT INTO myClasses (subjectcode, classcode, classname)
VALUES ('CSCI', '2113', 'Software Engineering') ";

//check whether the data was successfully added to the table
if ($conn->query($sql) === TRUE) {
	echo "The new record was created successfully!";
}
else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

//insert multiple records into the table
$sql = "INSERT INTO myClasses (subjectcode, classcode, classname)
VALUES ('CSCI', '1111', 'Introduction to Software Development') ";
$sql .= "INSERT INTO myClasses (subjectcode, classcode, classname)
VALUES ('CSCI', '1112', 'Algorithms and Data Structures') ";
$sql .= "INSERT INTO myClasses (subjectcode, classcode, classname)
VALUES ('MATH', '1232', 'Single-Variable Calculus II') ";

//check whether all of the records were successfully added to the table
if ($conn->multi_query($sql) === TRUE) {
	echo "The new record was created successfully!";
}
else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

//update data in a table
$sql = "UPDATE myClasses SET classcode='1231' classname = 'Single Variable Calculus I' WHERE id = 4";
//check that the update occurs properly
if ($conn->query($sql) === TRUE) {
	echo "The record was updated successfully!";
}
else {
	echo "Error updating record: " . $conn->error;
}

//delete data from the table
$sql = "DELETE FROM myClasses WHERE id = 2";
//check that the deletion occurs properly
if ($conn->query($sql) === TRUE) {
	echo "The record was deleted successfully!";
}
else {
	echo "Error deleting record: " . $conn->error;
}

//query all of the class names
//SELECT classname FROM myClasses

//close the connection
$conn->close();
?>