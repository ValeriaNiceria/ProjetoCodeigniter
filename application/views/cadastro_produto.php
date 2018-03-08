<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Novo Produto</h1>
  </div>
  
  <div class="col-md-12">
    <form action="<?= base_url('produto/cadastrar') ?>" method="post" class="form">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" class="form-control" autofocus required/>
      <?= form_error('nome')?>

      <label for="descricao">Descrição</label>
      <textarea name="descricao" id="descricao" class="form-control" required></textarea>
      <?= form_error('descricao')?>

      <label for="preco">Preço:</label>
      <input type="text" name="preco" id="preco" class="form-control" required/>
      <?= form_error('preco')?>

      <div class="float-right mt-4">
        <button class="btn btn-success"><span data-feather="save" class="mr-1"></span>Salvar</button>
        <a href="<?= base_url('produto/meus_produtos') ?>" class="btn btn-secondary"><span data-feather="x" class="mr-1"></span>Cancelar</a>
      </div>
    </form>
  </div>

  </div>
</main>
</div>
</div>
