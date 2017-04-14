<?php
header( "refresh:2.5;url=index.php" );
include('config.php' );
if(isset($_POST['nname']))
{
	date_default_timezone_set("Asia/Kolkata");
		$date_time = "Date " . date("Y/m/d") ."time ".date("h:i:sa");
	$flag = 0;
	$mob = $_POST['nmobno'];
	$sql="select * from nonvitian where mobile= '$mob' ";
	$result=$pdo->query($sql);
	while($row=$result->fetch())
	{
	  	$flag = 1;
	}
	if($flag==0){
		$sql= 'insert into nonvitian set name="' .$_POST['nname'] . '",email="' .$_POST['nemail'] . '",mobile="' .$_POST['nmobno'] . '",date= "' .$date_time . '"';
		$pdo->exec($sql);
		echo 'Registered Succesfully';
	}	
	else{
		echo "Already Registered";
	}
}
?>

