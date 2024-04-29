<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="login.css">
</head>

<body>
	<div class="login-container">
		<h2>Login</h2>
		<form action="login.php" method="post" autocomplete="off">
			<?php if (isset($_GET['error'])) { ?>
				<div class="error"><?php echo $_GET['error']; ?></div>
			<?php } ?>
			<div class="input-group">
				<label for="username">Username:</label>
				<input type="text" id="username" name="uname" required>
			</div>
			<div class="input-group">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required>
			</div>
			<div class="input-group">
				<button type="submit">Login</button>
				<a href="../index.php" class="btn btn-user btn-block bg-light">
					Go back
				</a>
			</div>
		</form>
	</div>
</body>

</html>