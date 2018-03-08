<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Perfil</h1>
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
      <h5 class="modal-title text-light">Informações</h5>
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


  <!-- Produtos Comprados -->
  <div class="modal-content mt-3">
    <div class="modal-header bg-dark">
      <h5 class="modal-title text-light">Produtos Comprados</h5>
    </div>
    <div class="modal-body">
      <?php if (empty($produtos_comprados)) : ?>
        <div class="alert alert-info">Nenhum registro encontrado.</div>
          <?php else : ?>
            <table class="table">
              <thead >
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Preço</th>
                </tr>
              </thead>
              <?php foreach ($produtos_comprados as $produto) : ?>
                <tbody>
                  <tr>
                    <td><?= $produto['id'] ?></td>
                    <td><?= $produto['produto_nome'] ?></td>
                    <td><?= $produto['descricao'] ?></td>
                    <td><?= $produto['preco'] ?></td>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>
      <?php endif; ?>  
    </div>
  </div>

    <!-- Produtos Vendidos -->
  <div class="modal-content mt-3">
    <div class="modal-header bg-dark">
      <h5 class="modal-title text-light">Produtos Vendidos</h5>
    </div>
    <div class="modal-body">
      <?php if (empty($produtos_vendidos)) : ?>
        <div class="alert alert-info">Nenhum registro encontrado.</div>
          <?php else : ?>
            <table class="table">
              <thead >
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Preço</th>
                </tr>
              </thead>
              <?php foreach ($produtos_vendidos as $produto) : ?>
                <tbody>
                  <tr>
                    <td><?= $produto['id'] ?></td>
                    <td><?= $produto['produto_nome'] ?></td>
                    <td><?= $produto['descricao'] ?></td>
                    <td><?= $produto['preco'] ?></td>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>
      <?php endif; ?>  
    </div>
  </div>

  </div>
</main>
</div>
</div>

    