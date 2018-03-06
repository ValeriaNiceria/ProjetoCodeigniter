<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Login - Projeto CodeIgniter</title>

    <!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
</head>
<body>

	<div class="container">
		<!--Notificacação-->
		<?php
			$success = $this->session->flashdata('success');
			echo isset($success) ? "<div class='alert alert-success mt-2'>" . $success . "</div>" : "";
		?>
	</div>
	
	<div class="row">
		<div class="col-sm"></div>
		<div class="col-sm">	
			<div class="jumbotron mt-4">
				<h1><center>LOGIN</center></h1>
				<form method="POST" action="<?= base_url('login/logar') ?>"" class="form">
					<input type="email" name="email" id="email" class="form-control mt-4" placeholder="Informe o email" />

					<input type="password" name="senha" id="senha" class="form-control mt-4" placeholder="Senha"/>

					<button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Logar</button>

					<a href="<?= base_url('usuario/cadastro')?>" data-toggle="modal" data-target="#exampleModal" class="btn mt-4">Novo usuário</a>

					<!-- Notificação -->
					<?php
						$error = $this->session->flashdata('error');
						echo isset($error) ? "<div class='text-danger text-center font-weight-bold'>" . $error . "</div>" : "";
					?>
				</form>
			</div>
  		</div>
		<div class="col-sm"></div>
	</div>
</body>
</html>