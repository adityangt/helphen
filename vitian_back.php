<?php
header( "refresh:2.5;url=index.php" );
include('config.php' );
if(isset($_POST['vname']))
{
	date_default_timezone_set("Asia/Kolkata");
		$date_time = "Date " . date("Y/m/d") ."time ".date("h:i:sa");
	$flag = 0;
	$reg = $_POST['vreg'];
        $mob = $_POST['vmobno'];
	$sql="select * from vitian where reg= '$reg' or mobile = '$mob' ";
	$result=$pdo->query($sql);
	while($row=$result->fetch())
	{
	  	$flag = 1;
	}
	if($flag==0){
		$sql= 'insert into vitian set name="' .$_POST['vname'] . '",reg="' .$_POST['vreg'] . '",email="' .$_POST['vemail'] . '",mobile="' .$_POST['vmobno'] . '",date= "' .$date_time . '"';
				$pdo->exec($sql);
		echo 'Registered Succesfully';
	}	
	else{
		echo "Already Registered";
	}
}
?>

