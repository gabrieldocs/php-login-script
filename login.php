<?php
	session_start();
	//require '../workers/previews/views/head.php';
	require 'database.php';
	require 'previews/head.view.php';


	if (isset($_SESSION['user_id'])) {
		exit(header("Location: login.php"));

	}
	

	if(!empty($_POST['email']) && !empty($_POST['password'])):
		
		$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
		$records->bindParam(':email', $_POST['email']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$message = '';

		if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
			$_SESSION['user_id'] = $results['id'];
			#header('Location: ../workers/previews/index.php');
			exit(header('Location: index.php'));
			

		} else {
			$message = 'Desculpe, credenciais não encontradas!';
		}
	endif;

?>			
	<link rel = "stylesheet" type = "text/css" href = "assets/css/main.css">
	<?php if(!empty($message)): ?>
		<div class="p-3 alert alert-success alert-dismissible fade show" role="alert">
			<?=$message?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
	
	<section class = "container">
		<div class = "row d-flex justify-content-center"> 
			<div class = "col-md-12 mt-5 text-white">
				<center>
					<h1>Ecossistema Aiamis</h1>
					<div class = "pre bg-white mt-5 mb-3"></div>
				</center>
			</div>
			<div class = "col-md-4">
				<div class = "card mt-5 mb-3"> 
					<div class = "card-body"> 
						<center> 
							<i class = "fad fa-computer-classic fa-3x mt-3 mb-1"></i>
							<h1 class = "mb-3">Credenciais</h1>
							<div class = "pre bg-dark mt-3 mb-3">
						</center>
						<form action="login.php" method="POST">
							<label>E-mail ou Nome de usuário</label>					
							<input class = "form-control mb-3" type="text" placeholder="Entre com seu e-mail" name="email">
							<label>Senha</label>					
							<input class = "form-control mb-3" type="password" placeholder="Senha" name="password">
						</div>
					<div class = "card-footer">
							<button type="submit" class = "btn btn-primary btn-block">Entrar</button>
						</form>
					</div>
				</div>
				<div class = "login bg-white p-3" align = "center">
					<span><a href="register.php">Criar nova conta</a></span>
				
				</div>
			</div>
		</div>
	</section>

	<?php require '../workers/previews/views/footer.php'; ?>