<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
    <div class="col-md-2">
      <a href="<?= base_url('produto/cadastro') ?>" class="btn btn-primary btn-block"><span data-feather="plus" class="mr-1"></span>Novo Produto</a>
    </div>
  </div>

  <!--Busca-->
  <div class="col-md-12 mb-3">
    <form action="<?= base_url('produto/pesquisar') ?>" method="post">
      <div class="row">
        <div class="col-md-10">
          <input type="text" name="pesquisar" placeholder="Pesquisar produto..." class="form-control"/>
        </div>
        <div class="col-md-2">
         <button class="btn btn-outline-secondary btn-block"><span data-feather="search" class="mr-1"></span>Pesquisar</button>
        </div>
      </div>
    </form>
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
          <th colspan="3"></th>
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
              <a href="<?= base_url() ?>" class="btn btn-info btn-block"><span data-feather="eye"></span></a>
            </td>
            <td>
              <a href="<?= base_url('produto/atualizar/' . $produto['id']) ?>" class="btn btn-warning btn-block"><span data-feather="edit"></span></a>
            </td>
            <td>
              <a href="<?= base_url('produto/excluir/' . $produto['id']) ?>" class="btn btn-danger btn-block" onclick="return confirm('Você tem certeza?');"><span data-feather="trash"></span></a>
            </td>
          </tr>
        </tbody>
      <?php endforeach; ?>
    </table>
  <?php endif; ?>  


<!--Paginação-->
<div class="paginacao">  
  <?php echo $paginacao_produtos; ?>
</div>
      
  </div>
</main>
</div>
</div>

    