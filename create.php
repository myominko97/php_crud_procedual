<?php

	$errors = ['name'=>null,'email'=>null,'phone'=>null,'any'=>null];
	$success = true;
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])){
	require_once 'connection.php';
	
	unset($_POST['create']);

	foreach($_POST as $key=>$val){
				if(empty($val)){
				$errors[$key] = "$key is empty";
				$success = false;
		}

		if($key == 'email'){
			if(!filter_var($val,FILTER_VALIDATE_EMAIL)){
				$errors[$key] = "Invalid Email";
				$success = false;
			}
		}
	}
	if($success){
	$name = mysqli_real_escape_string($conn,filter_var($_POST['name'],FILTER_SANITIZE_STRING));
	$email = mysqli_real_escape_string($conn,filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));
	$phone = mysqli_real_escape_string($conn,filter_var($_POST['phone'],FILTER_SANITIZE_STRING));

	$sql = "INSERT INTO users(name,email,phone) VALUES('$name','$email','$phone')";

		if(mysqli_query($conn,$sql)){
			header('Location:index.php');
		}else{
			$errors['any'] = 'Failed to create user';
		}
	}

}

?>

<!DOCTYPE html>
<html>
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
			<div class="col-lg-6 offset-3 p-0">
				<div class="card">
					<div class="card-header bg-dark text-warning text-center d-flex align-items-center">
						
						<a href="index.php" class="font-weight-bold text-warning" style="text-decoration: none;"><-</a>
						<h4 class="w-100">New User</h4>
					</div>
					<div class="card-body">
						<p class="text-danger text-center">
							<?php echo $errors['any']; ?>
						</p>
						<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>">
							<div class="form-group">
								<label for="name">Enter User Name</label>
								<input type="text" name="name" id="name" class="form-control form-control-sm">
								<span class="text-danger"><?php echo $errors['name']; ?></span>
							</div>

							<div class="form-group">
								<label for="email">Enter User Email</label>
								<input type="text" name="email" id="email" class="form-control form-control-sm">
								<span class="text-danger"><?php echo $errors['email']; ?></span>
							</div>

							<div class="form-group">
								<label for="phone">Enter User Phone</label>
								<input type="text" name="phone" id="phone" class="form-control form-control-sm">
								<span class="text-danger"><?php echo $errors['phone']; ?></span>
							</div>

							<div class="form-group">
								<button class="btn btn-sm btn-dark text-warning px-5 float-right" name="create">Create</button>
							</div>
						</form>
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