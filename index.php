<!DOCTYPE html>
<html>
<?php 
require_once 'connection.php';

$sql = "SELECT * FROM users";
$users = mysqli_query($conn, $sql);
?>

<head>
	<meta charset="utf-8">
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<section>
	<div class="container">	

		<div class="row">
			<div class="col-lg-8 offset-2 p-0">
				<div class="card">
					<div class="card-header bg-dark text-warning text-center">
						
						<h4>User List</h4>
					</div>

					<div class="card-body">
							<a href="create.php" class="btn btn-sm btn-dark text-warning mb-2 shadow float-right">Create User</a>
						
						<table class="table table-borderless table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								
							<?php
								$i = 1;
								foreach($users as $user){
							?>

							<tr>
								<td><?php echo $i;$i++; ?></td>
								<td><?php echo $user['name']; ?></td>
								<td><?php echo $user['email']; ?></td>
								<td><?php echo $user['phone']; ?></td>
								<td>
									<a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a>
									<a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a>
								</td>
							</tr>

							<?php
								}
							?>
							</tbody>
						</table>
					</div>
					<div class="card-footer">
						<p class="text-center mb-0">Copyright&copy;2021 KBTC University</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



</body>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>