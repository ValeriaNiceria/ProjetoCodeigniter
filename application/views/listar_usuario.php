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

	<!-- Listagem dos dados MySQL -->
	<?php if (empty($usuarios)) : ?>
		<div class="alert alert-info">
			Nenhum registro foi encontrado.
		</div>
	<?php else: ?>
		<div class="col-md-12">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Nível</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<?php foreach ($usuarios as $usuario) : ?>
				<tbody>
					<tr>
						<td><?= $usuario['nome'] ?></td>
						<td><?= $usuario['email'] ?></td>
						<td><?= ($usuario['nivel']) ? "Administrador" : "Usuário"; ?></td>
						<td><?= ($usuario['status']) ? "Ativo" : "Inativo"; ?></td>
						<td>
							<a href="<?= base_url('usuario/atualizar/' . $usuario['id']) ?>" class="btn btn-primary">Editar</a>
							<a href="<?= base_url('usuario/excluir/' . $usuario['id']) ?>" class="btn btn-danger">Excluir</a>
						</td>
					</tr>
				</tbody>
				<?php endforeach; ?>

			</table>
		</div>
	<?php endif; ?>


</main>
</div>
</div>