<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<div class="col-md-12">
    		<h1 class="h2">Novo Usuário</h1>
    	</div>
	</div>

    <!--Notificacação-->
    <?php
        $error = $this->session->flashdata('error');
        echo isset($error) ? "<div class='alert alert-danger'" . $error . "</div>" : "";
    ?>

   <div class="col-md-12">
    	<form action="<?= base_url('usuario/cadastrar')?>" method="post">
    		<label for="nome">Nome:</label>
    		<input type="text" name="nome" id="nome" placeholder="Informe o nome" class="form-control" required/>

			<div class="row">
				<div class="col-md-3">
					<label for="cpf">CPF:</label>
    				<input type="text" name="cpf" id="cpf" placeholder="Informe o cpf" class="form-control" required/>
				</div>
				<div class="col-md-7">
					<label for="endereco">Endereço:</label>
    				<input type="text" name="endereco" id="endereco" placeholder="Informe o endereço" class="form-control" required/>
				</div>
				<div class="col-md-2">
    				<label for="nivel">Nível:</label>
    				<select class="custom-select mr-sm-2" id="nivel" name="nivel">
				    	<option selected>Escolher...</option>
				    	<option value="1">Administrador</option>
				    	<option value="0">Usuário</option>
		    		</select>
    			</div>
			</div>

             <div class="row">
                <div class="col-md-5">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="custom-select">
                        <option value="0">Escolher...</option>
                        <!--carregando o select com os dados do BD-->
                        <?php foreach ($estados as $estado) : ?>
                            <option value="<?= $estado['id']?>"><?= $estado['nome'] ?></option>
                        <?php endforeach; ?>                        
                    </select>
                </div>
                <div class="col-md-7"> 
                    <label for="cidade">Cidade:</label>
                    <select name="cidade" id="cidade" class="custom-select">
                        <option value="0">Escolher...</option> 
                        <!--Carregando o select com os dados do BD-->
                        <?php foreach ($cidades as $cidade) : ?>
                            <option value="<?= $cidade['id'] ?>"><?= $cidade['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>                   
                </div>
            </div>

    		<div class="row">
    			<div class="col-md-6">
    				<label for="email">Email:</label>
    				<input type="text" name="email" id="email" placeholder="Informe o email" class="form-control" required/>
    			</div>
    			<div class="col-md-4">
    				<label for="senha">Senha:</label>
    				<input type="password" name="senha" id="senha" placeholder="Informe a senha" class="form-control" required/>
    			</div>
    			<div class="col-md-2">
    				<label for="status">Status:</label>
    				<select class="custom-select mr-sm-2" id="status" name="status">
				    	<option selected>Escolher...</option>
				    	<option value="1">Ativo</option>
				    	<option value="0">Inativo</option>
		    		</select>
    			</div>
    		</div>

           

		    <div class="mt-3 float-right">
		    	<button type="submit" class="btn btn-success">Enviar</button>
		    	<button type="reset" class="btn btn-default">Cancelar</button>
		    </div>

    	</form>
    </div>
</main>
</div>
</div>