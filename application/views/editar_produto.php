<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Atualizar Produto</h1>
  </div>
  
  <div class="col-md-12">
    <form action="<?= base_url('produto/atualizar') ?>" method="post" class="form">
      <label for="nome">Nome:</label>
      <input type="text" name="nome" id="nome" value="<?= $produto['nome'] ?>" class="form-control" autofocus required/>

      <label for="descricao">Descrição</label>
      <textarea name="descricao" id="descricao" class="form-control"><?= $produto['descricao'] ?></textarea>

      <label for="preco">Preço:</label>
      <input type="text" name="preco" id="preco" value="<?= $produto['preco'] ?>" class="form-control" required/>

      <input type="hidden" name="id" value="<?= $produto['id'] ?>"/>

      <div class="float-right mt-4">
        <button class="btn btn-success"><span data-feather="check" class="mr-1"></span>Atualizar</button>
        <a href="<?= base_url('produto') ?>" class="btn btn-secondary"><span data-feather="x" class="mr-1"></span>Cancelar</a>
      </div>
    </form>
  </div>

  </div>
</main>
</div>
</div>
