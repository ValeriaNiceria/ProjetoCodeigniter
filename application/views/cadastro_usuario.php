<!-- Modal -->
<div class="container mt-4">
    
     <!--Notificacação-->
    <?php
        $error = $this->session->flashdata('error');
        echo isset($error) ? "<div class='alert alert-danger mt-2'>" . $error . "</div>" : "";
    ?>

    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title text-light" id="exampleModalLabel">Novo Usuário</h5>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <form action="<?= base_url('usuario/cadastrar')?>" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Informe o nome" class="form-control" autofocus required/>

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
                    <select class="custom-select mr-sm-2" id="nivel" name="nivel" required>
                        <option selected disabled>Escolher...</option>
                        <option value="1">Administrador</option>
                        <option value="0">Usuário</option>
                    </select>
                </div>
            </div>

             <div class="row">
                <div class="col-md-5">
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado" class="custom-select" required>
                        <option selected disabled>Escolher...</option>
                        <!--carregando o select com os dados do BD-->
                        <?php foreach ($estados as $estado) : ?>
                            <option value="<?= $estado['id']?>"><?= $estado['estado_nome'] ?></option>
                        <?php endforeach; ?>                        
                    </select>
                </div>
                <div class="col-md-7"> 
                    <label for="cidade">Cidade:</label>
                    <select name="cidade" id="cidade" class="custom-select" required>
                        <option selected disabled>Escolher...</option> 
                        <!--Carregando o select com os dados do BD-->
                        <?php foreach ($cidades as $cidade) : ?>
                            <option value="<?= $cidade['id'] ?>"><?= $cidade['cidade_nome'] ?></option>
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
                    <select class="custom-select mr-sm-2" id="status" name="status" required>
                        <option selected disabled>Escolher...</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer mt-5">
            <a href="<?= base_url('login') ?>" class="btn btn-secondary"><span data-feather="x" class="mt-1 mr-1"></span>Fechar</a>
            <button type="submit" class="btn btn-primary"><span data-feather="save" class="mt-1 mr-1"></span>Salvar</button>
        </div>
        </form>
    </div>
</div>