<?php
header("Content-type: text/xml");
require("phpsqlajax_dbinfo.php");

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server

$connection=mysqli_connect("localhost","id2356929_steve","lalala");
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Set the active MySQL database

$db_selected = mysqli_select_db($connection,$database );
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table

$query = "SELECT * FROM objetosperdidos WHERE 1";
$result = mysqli_query($connection,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}



// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("name",$row['nombre']);
  $newnode->setAttribute("address", $row['lugar']);
  $newnode->setAttribute("lat", $row['latitud']);
  $newnode->setAttribute("lng", $row['longitud']);
  $newnode->setAttribute("type", $row['categoria']);
}

echo $dom->saveXML();
?>