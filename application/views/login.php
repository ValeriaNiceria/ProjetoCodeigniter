<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Login - Projeto CodeIgniter</title>

    <!-- Bootstrap core CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="<?= base_url('assets/css/signin.css')?>" rel="stylesheet">
</head>

<body class="text-center">

	<form action="<?= base_url('login/logar') ?>" method="post" class="form-signin">
		<h1 class="h1 mb-3 font-weight-normal">Login</h1>
		
		<label for="email" class="sr-only">Email</label>
		<input type="email" name="email" id="email" class="form-control" placeholder="Informe o email" autofocus required>
		
		<label for="senha" class="sr-only">Senha</label>
		<input type="password" name="senha" id="senha" class="form-control mt-4" placeholder="Informe a senha" required>
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>

		<!-- Notificação -->
		<?php
			$error = $this->session->flashdata('error');
			echo isset($error) ? "<div class='text-danger'>" . $error . "</div>" : "";
		?>

	</form>
</body>
</html>



