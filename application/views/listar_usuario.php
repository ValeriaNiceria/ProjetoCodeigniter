<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<div class="col-md-10">
    		<h1 class="h2">Usuários</h1>
    	</div>
		<div class="col-md-2">
      		<a href="<?= base_url('usuario/cadastro') ?>" class="btn btn-primary btn-block">Novo Usuário</a>
    	</div>
	</div>

	<!--Notificacação-->
	<?php
		$success = $this->session->flashdata('success');
		$error = $this->session->flashdata('error');
		echo isset($success) ? "<div class='alert alert-success'>" . $success . "</div>" : "";
		echo isset($error) ? "<div class='alert alert-danger'" . $error . "</div>" : "";
	?>


</main>
</div>
</div>