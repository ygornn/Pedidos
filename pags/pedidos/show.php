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
            <p class="card-text text">Código do pedido:  <?php echo $data['codigo'] ?></p>
            <p class="card-text">Nome do Cliente:  <?php echo $data['cliente'] ?></p>
            <p class="card-text">Pizza:  <?php echo $data['p_qnt'] .' '. $data['pizza'] ?></p>
            <p class="card-text">Lanche:  <?php echo $data['l_qnt'] .' '. $data['lanche'] ?></p>
            <p class="card-text">Bebida:  <?php echo $data['b_qnt'] .' '. $data['bebida'] ?></p>
            <p class="card-text">Horário:  <?php echo date('d/m/Y h:i', strtotime($data['hora'])) ?></p>
            <p class="card-text">Total:  <?php echo 'R$ ' . $data['total'] ?></p>
            <a class='btn btn-warning btn-sm' href='cadastro.php?action=edit&code=<?= $data['codigo']?>'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                </svg>
            </a>
        </div>
    </div>
    <div class='mt-5 col-xl-2'>
        <a href="cadastro.php" class="text-black">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        </a>
    </div>
    </div>
</div>
</div>
<?php include "../footer.php"; ?>