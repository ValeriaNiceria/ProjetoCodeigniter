<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
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
   <div class="row ml-2">
      <?php foreach ($produtos as $produto) : ?>
        <div class="modal-content col-md-5 mx-3 mt-3">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold"><?= $produto['produto_nome']?></h5>
          </div>
          <div class="modal-body">
            <p class="font-italic"><?= $produto['descricao']?></p>
          </div>
          <div class="modal-footer">
            <div class="col-md-8">
              <p class="font-weight-bold text-primary" style="font-size: 22px;">R$ <?= $produto['preco']?></p>
            </div>
            <a href="<?= base_url('compra/'. $produto['id'])?>" onclick="return confirm('Você deseja realizar está compra?');" class="btn btn-success"><span data-feather="shopping-cart" class="mx-2"></span>Comprar</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>  


<!--Paginação-->
<div class="paginacao mt-5 mb-5">  
  <?php echo isset($paginacao_produtos) ? $paginacao_produtos : ''; ?>
</div>
      
  </div>
</main>
</div>
</div>

    