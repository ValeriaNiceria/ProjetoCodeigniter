<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Perfil</h1>
    <div class="row">
      <div class="col-md-6">
      <button class="btn btn-outline-info btn-block"><span data-feather="package" class="mr-2"></span>Produtos vendidos</button>
    </div>
    <div class="col-md-6">
      <button class="btn btn-outline-info btn-block"><span data-feather="package" class="mr-2"></span>Produtos comprados</button>
    </div>
    </div>
  </div>

   <!--Notificacação-->
    <?php
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        echo isset($success) ? "<div class='alert alert-success'>" . $success . "</div>" : "";
        echo isset($error) ? "<div class='alert alert-danger'>" . $error . "</div>" : "";
    ?>

  <!-- Modal -->
  <div class="modal-content">
    <div class="modal-header bg-dark">
      <h5 class="modal-title text-light" id="exampleModalLabel">Informações</h5>
    </div>
    <div class="modal-body">
      <div class="col-md-10">
        <h3><?= $usuario['nome']?></h3>
      </div>

      <div class="col-md-10">
        <span class="font-weight-bold">CPF:</span> <?= $usuario['cpf']?>
      </div>

      <div class="col-md-10">
        <span class="font-weight-bold">Telefone:</span> <?= $usuario['telefone']?>
      </div>

      <div class="col-md-10">
        <span class="font-weight-bold">Status:</span> <?= ($usuario['status']) ? 'Ativo' : 'Inativo';?>
      </div>
      
      <div class="col-md-10">
        <span class="font-weight-bold">Estado:</span> <?= $estado['estado_nome']?>
      </div>

      <div class="col-md-10">
        <span data-feather="mail"></span> <?= $usuario['email']?>
      </div>


     
  
    </div>
    <div class="modal-footer">
      <a href="<?= base_url('usuario/atualizar/'. $usuario['id']) ?>" class="btn btn-primary">
        <span data-feather="edit-2"></span>
        Atualizar
      </a>

      <a href="<?= base_url('usuario/excluir') ?>" onclick = "return confirm('Você tem certeza que deseja excluir essa conta?');" class="btn btn-danger">
        <span data-feather="x"></span>
        Excluir minha conta
      </a>
    </div>
  </div>
      

        
  </div>
</main>
</div>
</div>

    