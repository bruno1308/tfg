<?php
//provide your hostname, username and dbname
$host="127.0.0.1"; 
$username="root";  
$password="";
$db_name="tfg"; 
//$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
$con=mysql_connect("$host", "$username", "$password");
mysql_select_db("$db_name");
$sql = "select * from config";
$result = mysql_query($sql);
$i = 0;
while($row=mysql_fetch_array($result)){
	$id = $row['id_config'];
	$status = $row['value'];
	$name = $row['name'];
	$response[$i]['id_config'] = $id;
	$response[$i]['value'] = $status;
	$response[$i]['name'] = $name;
	$data['posts'][$i] = $response[$i];
	$i = $i+1;


	//$posts[] = array('id' => $id, 'status'=>$status,'name'=>$name);
}
$json_string = json_encode($data['posts']);
$file = 'bootstrap_fill.json';
file_put_contents($file, $json_string);
@header('Location:index.html');

?>

