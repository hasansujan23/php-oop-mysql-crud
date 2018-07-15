<?php 

	$db=new PDO('mysql:host=localhost;dbname=db_students','root','sujan');
	$str="select * from t_student_info";
	$query=$db->query($str);


	// echo "Fetch data from database using associative array........!";
	// echo "<br>";
	// echo "<br>";
	// while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
	// 	echo "Id: ".$row['id'];
	// 	echo "<br>";
	// 	echo "Name: ".$row['name'];
	// 	echo "<br>";
	// 	echo "Email: ".$row['email'];
	// 	echo "<br>";
	// 	echo "Address: ".$row['address'];
	// 	echo "<br>";
	// 	echo "<br>";
	// }


		echo "Fetch data from database using object........!";
		echo "<br>";
		echo "<br>";

		while ($row=$query->fetch(PDO::FETCH_OBJ)) {
		echo "Id: ".$row->id;
		echo "<br>";
		echo "Name: ".$row->name;
		echo "<br>";
		echo "Email: ".$row->email;
		echo "<br>";
		echo "Address: ".$row->address;
		echo "<br>";
		echo "<br>";
	}

 ?>