<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
    <div class="col-md-2">
      <a href="" class="btn btn-primary btn-block"><span data-feather="plus" class="mr-1"></span>Novo Produto</a>
    </div>
  </div>

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
            <a href="" class="btn btn-danger"><span data-feather="trash" class="mr-1"></span>Remover</a>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
  


        
  </div>
</main>
</div>
</div>

    