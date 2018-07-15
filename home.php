<?php 
include 'inc/header.php';
include 'lib/config.php' ;
include 'lib/mydatabase.php';
?>

<?php 
$db=new Database();
$query="select * from t_student_info";
$result=$db->getData($query);
 ?>


<div class="container">
	<div class="panel-heder">
	<h1>Student List
		<span class="pull-right"><a href="addstudent.php">Add Student</a></span>
	</h1>
</div>
</div>

<div class="panel-body">
	<div class="container">
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if($result) { ?>
					<?php while ($row=$result->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td>
							<a href="editstudent.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php } ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
</div>
</div>

<?php include 'inc\footer.php' ?>