<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<div class="col-md-12">
    		<h1 class="h2">Atualizar Usuário</h1>
    	</div>
	</div>

   <div class="col-md-12">
    	<form action="<?= base_url('usuario/atualizar')?>" method="post">
    		<label for="nome">Nome:</label>
    		<input type="text" name="nome" id="nome" value="<?= $usuario['nome'] ?>" placeholder="Informe o nome" class="form-control" required/>

			<div class="row">
				<div class="col-md-3">
					<label for="cpf">CPF:</label>
    				<input type="text" name="cpf" id="cpf" value="<?= $usuario['cpf'] ?>" placeholder="Informe o cpf" class="form-control" required/>
				</div>
				<div class="col-md-7">
					<label for="endereco">Endereço:</label>
    				<input type="text" name="endereco" id="endereco" value="<?= $usuario['endereco'] ?>" placeholder="Informe o endereço" class="form-control" required/>
				</div>
				<div class="col-md-2">
    				<label for="nivel">Nível:</label>
    				<select class="custom-select mr-sm-2" id="nivel" name="nivel">
                        <option selected>Escolher...</option>
				    	<option value="1" <?= ($usuario['nivel'] == 1) ? 'selected' : ''; ?>> Administrador </option>
				    	<option value="0" <?= ($usuario['nivel'] == 0) ? 'selected' : ''; ?>> Usuário </option>
		    		</select>
    			</div>
			</div>

    		<div class="row">
    			<div class="col-md-6">
    				<label for="email">Email:</label>
    				<input type="text" name="email" id="email" value="<?= $usuario['email'] ?>" placeholder="Informe o email" class="form-control" required/>
    			</div>
    			<div class="col-md-4">
    				<label for="senha">Senha:</label>
                    <button class="btn btn-default btn-block" disabled>Atualizar Senha</button>
    			</div>
    			<div class="col-md-2">
    				<label for="status">Status:</label>
    				<select class="custom-select mr-sm-2" id="status" name="status">
                        <option selected>Escolher...</option>
				    	<option value="1" <?= ($usuario['status'] == 1) ? 'selected' : ''; ?>> Ativo </option>
                        <option value="0" <?= ($usuario['status'] == 0) ? 'selected' : ''; ?>> Inativo </option>
		    		</select>
    			</div>
    		</div>

            <input type="hidden" name="id" value="<?= $usuario['id'] ?>"/>

		    <div class="mt-3 float-right">
		    	<button type="submit" class="btn btn-success">Atualizar</button>
		    	<a href="<?= base_url('usuario'); ?>"  class="btn btn-secondary">Cancelar</a>
		    </div>

    	</form>
    </div>
</main>
</div>
</div>