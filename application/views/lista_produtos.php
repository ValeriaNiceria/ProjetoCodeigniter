<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
    <div class="col-md-2">
      <a href="<?= base_url('produto/cadastro') ?>" class="btn btn-primary btn-block"><span data-feather="plus" class="mr-1"></span>Novo Produto</a>
    </div>
  </div>

  <!--Notifição-->
  <?php
    $error = $this->session->flashdata('error');
    $success = $this->session->flashdata('success');
    echo isset($error) ? "<div class='alert alert-danger'>" . $error . "</div>" : "";
    echo isset($success) ? "<div class='alert alert-success'>" . $success . "</div>" : "";
  ?>

  <!-- lista de produtos-->
  <?php if (empty($produtos)) : ?>
    <div class="alert alert-info">Nenhum registro encontrado.</div>
  <?php else : ?>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th></th>
        </tr>
      </thead>
      <?php foreach ($produtos as $produto) : ?>
        <tbody>
          <tr>
            <td><?= $produto['id'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['descricao'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td>
              <a href="" class="btn btn-info"><span data-feather="edit" class="mr-1"></span>Atualizar</a>
              <a href="<?= base_url('produto/excluir/' . $produto['id']) ?>" class="btn btn-danger" onclick="return confirm('Você tem certeza?');"><span data-feather="trash" class="mr-1"></span>Remover</a>
            </td>
          </tr>
        </tbody>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>  


        
  </div>
</main>
</div>
</div>

    