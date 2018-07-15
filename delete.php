<?php 
include 'lib/config.php' ;
include 'lib/mydatabase.php';
?>


<?php 

$id=$_GET['id'];
$db=new Database();
$row=$db->deleteData($id);
if($row){
	header("Location: home.php");
}else{
	echo "Can't delete!!!";
}

?>