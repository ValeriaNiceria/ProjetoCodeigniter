<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Página Inicial</h1>
  </div>

  <div class="row">
    <div class="col-md-3">
      <a href="<?= base_url('produto/meus_produtos')?>" class="btn btn-danger btn-block btn-lg mb-2"><img src="<?= base_url('assets/img/list.png')?>" class="pt-4 pb-4"></a>
    </div>
    <div class="col-md-3">
      <a href="<?= base_url('produto/cadastro')?>" class="btn btn-info btn-block btn-lg mb-2"><img src="<?= base_url('assets/img/box.png')?>" class="pt-4 pb-4"></a>
    </div>
    <div class="col-md-3">
      <a href="<?= base_url('produto')?>" class="btn btn-success btn-block btn-lg mb-2"><img src="<?= base_url('assets/img/cart.png')?>" class="pt-4 pb-4"></a>
    </div>
  </div>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom mt-4">
    <h2>Últimos produtos adicionados</h2>
  </div>
    

    <div class="row">
      <?php foreach ($produtos as $produto) : ?>
        <div class="modal-content col-md-5 mx-3 mt-1">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold"><?= $produto['nome']?></h5>
      </div>
      <div class="modal-body">
        <p class="font-italic"><?= $produto['descricao']?></p>
      </div>
      <div class="modal-footer">
        <div class="col-md-8">
          <p class="font-weight-bold text-primary" style="font-size: 22px;">R$ <?= $produto['preco']?></p>
        </div>
        <button type="button" class="btn btn-success"><span data-feather="shopping-cart" class="mx-2"></span>Comprar</button>
      </div>
    </div>
      <?php endforeach; ?>
    </div>


    

        
  </div>
</main>
</div>
</div>

    