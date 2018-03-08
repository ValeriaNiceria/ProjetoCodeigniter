<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<div class="col-md-12">
    		<h1 class="h2">Atualizar Usuário</h1>
    	</div>
	</div>

    <!--Notificacação-->
    <?php
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        echo isset($success) ? "<div class='alert alert-success'>" . $success . "</div>" : "";
        echo isset($error) ? "<div class='alert alert-danger'>" . $error . "</div>" : "";
    ?>

   <div class="col-md-12">
    	<form action="<?= base_url('usuario/atualizar')?>" method="post">
             <div class="row">
                <div class="col-md-8">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?= $usuario['nome'] ?>" placeholder="Informe o nome" class="form-control" autofocus required/>
                </div>
                <div class="col-md-4">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" value="<?= $usuario['cpf'] ?>" placeholder="Informe o cpf" class="form-control" required/> 
                </div>
            </div>

            <div class="row">
               <div class="col-md-4">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" id="telefone" value="<?= $usuario['telefone'] ?>" placeholder="Informe o telefone" class="form-control" required/> 
                </div>
                <div class="col-md-5">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="custom-select" required>
                        <option selected disabled>Escolher...</option>
                        <!--carregando o select com os dados do BD-->
                        <?php foreach ($estados as $estado) : ?>
                            <?php if ($estado['id'] == $usuario['estado_id']) : ?>
                                <option value="<?= $estado['id']?>" selected><?= $estado['estado_nome'] ?></option>
                            <?php else : ?>
                                <option value="<?= $estado['id']?>"><?= $estado['estado_nome'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>                        
                    </select>
                </div>
                <div class="col-md-3">
                     <label for="nivel">Nível:</label>
                    <select class="custom-select mr-sm-2" id="nivel" name="nivel" required>
                        <option selected disabled>Escolher...</option>
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
                    <!--botão para ativar o modal-->
                    <input type="button" class="btn btn-default btn-block" value="Atualizar Senha" data-toggle="modal" data-target="#alterarSenhaModal"/>
                </div>
                <div class="col-md-2">
                   <label for="status">Status:</label>
                    <select class="custom-select mr-sm-2" id="status" name="status" required>
                        <option selected disabled>Escolher...</option>
                        <option value="1" <?= ($usuario['status'] == 1) ? 'selected' : ''; ?>> Ativo </option>
                        <option value="0" <?= ($usuario['status'] == 0) ? 'selected' : ''; ?>> Inativo </option>
                    </select>
                </div>
            </div>
    
            <input type="hidden" name="id" value="<?= $usuario['id'] ?>"/>

		    <div class="mt-3 float-right">
		    	<button type="submit" class="btn btn-success"><span data-feather="check" class="mt-1 mr-1"></span>Atualizar</button>
		    	<a href="<?= base_url('usuario/perfil'); ?>"  class="btn btn-secondary"><span data-feather="x" class="mt-1 mr-1"></span>Cancelar</a>
		    </div>

    	</form>
    </div>
</main>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="alterarSenhaModal" tabindex="-1" role="dialog" aria-labelledby="alterarSenhaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!-- formulário para alteração da senha -->
        <form method="post" action="<?= base_url('usuario/salvar_senha')?>">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="alterarSenhaModalLabel">Atualizar Senha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Notificacação-->
                <?php
                    $error = $this->session->flashdata('error');
                    echo isset($error) ? "<div class='alert alert-danger'>" . $error . "</div>" : "";
                ?>

                <!--campos do formulário-->
                <input type="hidden" name="id" value="<?= $usuario['id'] ?>"/>
                <label for="senha_antiga">Senha antiga:</label>
                <input type="password" name="senha_antiga" id="senha_antiga" onkeyup="checarSenha()" class="form-control" required autofocus/>

                <label for="senha_nova">Nova senha:</label>
                <input type="password"  name="senha_nova" id="senha_nova" onkeyup="checarSenha()" class="form-control" min="3" required/>

                <label for="senha_confirmar">Confirmar senha:</label>
                <input type="password"  name="senha_confirmar" id="senha_confirmar" onkeyup="checarSenha()" class="form-control" min="3" required/>

                <!--Mensagem informando se as senhas são iguais ou não-->
                <div class="col-md-12">
                    <div id="divcheck"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="enviarsenha" disabled><span data-feather="save" class="mt-1 mr-1"></span>Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><span data-feather="x" class="mt-1 mr-1"></span>Fechar</button>
            </div>
        </div>
        </form>
    </div>
</div>


<!--script verifica se as senhas são iguais-->
<script>
    $(document).ready(function() {
        $("#senha_antiga").keyup(checarSenha);
        $("#senha_nova").keyup(checarSenha);
        $("#senha_confirmar").keyup(checarSenha);   
    });
    function checarSenha() {
        var password = $("#senha_nova").val();
        var confirmPassword = $("#senha_confirmar").val();
        var passwordBefore = $("#senha_antiga").val();
        
        if (password == passwordBefore){
            $("#divcheck").html("<span style='color: red'>A senha informada é a mesma do campo da senha antiga!</span>");
            document.getElementById("enviarsenha").disabled = true;
        }else if (password == '' || confirmPassword == '') {
            $("#divcheck").html("<span style='color: red'>Campo de senha vazio!</span>");
            document.getElementById("enviarsenha").disabled = true;     
        } else if (password != confirmPassword) {
            $("#divcheck").html("<span style='color: red'>Senha não conferem!</span>");
            document.getElementById("enviarsenha").disabled = true;     
        } else {
            $("#divcheck").html("<span style='color: green'>Senha são iguais!</span>");
            document.getElementById("enviarsenha").disabled = false;
        }   
    }
</script>