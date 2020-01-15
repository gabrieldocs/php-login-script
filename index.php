<?php
	
	session_start();
	
	require 'database.php';
	#pdo added recently	

	require 'previews/head.view.php';

	if( isset($_SESSION['user_id']) ) {

		$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
		$records->bindParam(':id', $_SESSION['user_id']);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		$user = NULL;

		if( count($results) > 0){
			$user = $results;
		}

	}

?>

<link rel = "stylesheet" type = "text/css" href = "assets/css/main.css">
<section class = "container text-dark ">
	<div class = "row mb-5 d-flex justify-content-center">
		<div class = "col-md-12 mt-5 text-white">
			<center>
				<h1>Ecossistema de Aprendizagem</h1> 
				<div class = "pre bg-white mt-5 mb-3"></div>
			</center>
		</div>
		<?php if( !empty($user) ): ?>
		
		<div class = "float">
			<a class = "btn btn-lg bg-lemon-lte"><i class = "fa fa-user-circle"></i> Editar perfil</a>
		</div>
		<div class = "col-md-4">
			<div class = "card mt-5 mb-3">
				<div class = "card-body">			
					
						<center>
							<i class = "fad fa-user-circle fa-4x mt-3 mb-3"></i>
							<h5><?= $user['email']; ?></h5> 
							<code>Adminstrador, LLC</code>
						</center>
						<br /><br />Sessão numero #AA2202 no Ecossistema de Aprendizagem
						<br /><br />
				</div>
				<div class = "card-footer"> 
					<a class = "btn btn-block bg-lemon" href="/ini/log/logout.php">Sair do Ecossistema</a>
				</div>
			</div>
		</div>		
		
		<div class = "col-md-4">
			<div class = "card mt-5 mb-3">
				<div class = "card-body">
					<center>
					<i class = "fad fa-computer-classic fa-4x mt-3 mb-3"></i>
					<h3>Acessar Ecossistema Aiamis</h3>
					<div class = "pre bg-dark mt-5 mb-5"></div>
					</center>			
				</div>
				<div class = "card-footer">
				<a class = "btn btn-block bg-lemon" href = "../workers/previews/index.php">Acessar</a>
				</div>
			</div>
		</div>

		<div class = "col-md-4">
			<div class = "card  mt-5 mb-3">
				<div class = "card-body  ">
					<center>
					<i class = "fad fa-book-reader fa-4x mt-3 mb-3"></i>
					<h3>Catálogo de Materiais Didáticos</h3>
					<div class = "pre bg-dark mt-5 mb-5"></div>
					</center>			
				</div>
				<div class = "card-footer">
				<a class = "btn btn-block bg-lemon" href = "../workers/previews/index.php">Acessar</a>
				</div>
			</div>
		</div>


		<?php else: ?>
		<div class = "col-md-4">
			<div class = "card mt-5 mb-5">
				<div class = "card-body">		
					<center class = "mt-3 mb-3">
						<h1>Aiamis</h1>
					</center>
						<p align = "justify">Esta página foi criada para a equipe de Desenvolvimento e encontra-se em visualização prévia. Para fazer login no Ecossistema de Aprendizagem Aiamis & Central de Comunicação Interna</p>
					<center>
						<a href="register.php">Criar nova conta</a>
					</center>
				</div>
				<div class = "card-footer">
					<center>	
						<a class = "btn bg-lemon btn-block"href="login.php"><i class = "fa fa-user-lock"></i> Área Restrita</a>
					</center>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</section>
<center>
	<div class = "pre bg-white mt-5 mb-5"></div>
</center>

<?php 

	require('../workers/previews/views/footer.php');
?>