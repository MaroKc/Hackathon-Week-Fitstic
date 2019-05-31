
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Find_FIX";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_REQUEST['id']))
    $sql = "SELECT * FROM ricerche WHERE id = ".$_REQUEST['id'];
else
    $sql = "SELECT * FROM ricerche";

$result = $conn->query($sql);

$ris = array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if(!isset($_REQUEST['id']))
            $ris[] = $row['id'];
        else
            $ris[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

echo json_encode($ris);



