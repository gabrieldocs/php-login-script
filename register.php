<?php

session_start();
require 'previews/head.view.php'; 

if( isset($_SESSION['user_id']) ){
	header("Location: /");
}

require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	// Enter the new user in the database
	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

	if( $stmt->execute() ):
		$message = 'Successfully created new user';
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;

endif;

?>
	<link rel = "stylesheet" type = "text/css" href = "assets/css/main.css">
	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

<section class = "container">
	<div class = "row d-flex justify-content-center">	
		<div class = "col-md-12 mt-5 text-white">
			<center>
				<h1>Ecossistema Aiamis</h1> 
				<div class = "pre bg-white mt-5 mb-5"></div>
			</center>
		</div>
		<div class = "col-md-4"> 
			<div class = "card mt-5 mb-4"> 
				<div class = "card-body">
					<center> 
						<i class  = "fa fa-comment-alt-smile fa-3x mt-3 text-success"></i>
						<h1>Cadastrar</h1>
						<div class = "pre bg-dark mt-3 mb-3">
					</center>
					
					<form action="register.php" method="POST">
						<label>E-mail</label>
						<input class  = "form-control mb-3" type="text" placeholder="Enter your email" name="email">
						<label>Senha</label>
						<input class  = "form-control mb-3" type="password" placeholder="and password" name="password">
						<label>Confirme sua senha</label>
						<input class  = "form-control mb-3" type="password" placeholder="confirm password" name="confirm_password">					
				</div> 
				<div class = "card-footer">
						<input class = "btn btn-block bg-lemon" type="submit" > 
					</form>
				</div>
			</div>
			<div class = "login bg-white p-3" align = "center">				
				<span><a href="login.php">Entrar no Ecossistema Aiamis</a></span>
			</div>
		</div>
	</div>
</section>
<?php require('../workers/previews/views/footer.php'); ?>