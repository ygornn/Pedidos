<?php 
    include_once "../header.php";
    include "acao.php";

    $code = isset($_GET['code']) ? $_GET['code'] : 0;
    $data = findById($code);
?>
<div class="container">
<div class="row justify-content-center mt-5">
    <div class="col-xl-6">
    <div class="card bg-light">
        <div class="card-header text-center">
            <h5 class="card-title">Detalhes</h5>
        </div>
        <div class="card-body">
            <p class="card-text text">Código:  <?php echo $data['codigo'] ?></p>
            <p class="card-text">Imagem:</p>
            <div class="d-flex justify-content-center mb-3">
                <img id='showImage' class="img-fluid" src="<?php echo '../../assets/img/' . $data['imagem'] ?>">
            </div>
            <p class="card-text">Nome do lanche:  <?php echo $data['sabor'] ?></p>
            <p class="card-text">Valor:  <?php echo $data['valor'] ?></p>
            <p class="card-text">Descrição:  <?php echo $data['descricao'] ?></p>
            <a class='btn btn-warning btn-sm' href='cadastro.php?action=edit&code=<?= $data['codigo']?>'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                </svg>
            </a>
            <a class='btn btn-danger btn-sm'  name='action' id='remove' href='acao.php?action=remove&code=<?= $data['codigo']?>'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/></svg>
            </a>
        </div>
    </div>
    <div class='mt-5 col-xl-2'>
        <a href="lanche.php" class="text-black">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        </a>
    </div>
    </div>
</div>
</div>
<?php include "../footer.php"; ?>