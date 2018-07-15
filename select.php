<?php 

	$db=new PDO('mysql:host=localhost;dbname=db_students','root','sujan');
	//$str="select * from t_student_info";
	//$query=$db->query($str);
	$statement=$db->prepare("select * from t_student_info where id=?");
	//$statement->bind_param("s",$id);
	$id="03";
	$statement->execute([$id]);


	echo "Fetch data from database using prepare........!";
	echo "<br>";
	echo "<br>";
	while ($row=$statement->fetch(PDO::FETCH_ASSOC)) {
		echo "Id: ".$row['id'];
		echo "<br>";
		echo "Name: ".$row['name'];
		echo "<br>";
		echo "Email: ".$row['email'];
		echo "<br>";
		echo "Address: ".$row['address'];
		echo "<br>";
		echo "<br>";
	}

 ?>