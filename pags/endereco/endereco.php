<?php 
  include_once '../header.php';
  $search = isset($_POST['search']) ? $_POST['search'] : '';
  $connection = Conexao::getInstance();
  $query = $connection->query("SELECT idendereco, nome_endereco, cidade.idcidade, nome_cidade FROM endereco NATURAL JOIN cidade
  WHERE nome_endereco LIKE '%$search%';");
?>
<main class="mb-5 pb-5 mb-md-0">
<div class="container">
<h1 class='mt-5'>Endereços</h1>
<hr>
    <div class='mb-4 col-xl-2'>
        <a href="../product.php" class="text-black">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        </a>
    </div>
        <div class="row">
        <div class="d-flex justify-content-start">
        <div class="col-xl-2 pt-4">
          <a href="cadastro.php" style="color: black">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-map-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.598-.49L10.5.99 5.598.01a.5.5 0 0 0-.196 0l-5 1A.5.5 0 0 0 0 1.5v14a.5.5 0 0 0 .598.49l4.902-.98 4.902.98a.502.502 0 0 0 .196 0l5-1A.5.5 0 0 0 16 14.5V.5zM5 14.09V1.11l.5-.1.5.1v12.98l-.402-.08a.498.498 0 0 0-.196 0L5 14.09zm5 .8V1.91l.402.08a.5.5 0 0 0 .196 0L11 1.91v12.98l-.5.1-.5-.1z"/>
          </svg>
          </a>
        </div>
        </div>
        <form action="" method="post">
        <div class="d-flex justify-content-end">
            <div>
                <input type="search" id="search" name="search" class="form-control">
            </div>
        <div>
            <button type="submit" class="form-control"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
        </div>
        </form>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cidade</th>
          <th>Endereço</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php 
        while($address = $query->fetch(PDO::FETCH_ASSOC)){
          echo "<tr> <td>{$address['idendereco']}</td> <td>{$address['nome_cidade']}</td> <td>{$address['nome_endereco']}</td>
          <td><a class='btn btn-primary btn-sm' href='show.php?code={$address['idendereco']}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-vcard-fill' viewBox='0 0 16 16'>
          <path d='M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z'/>
          </svg></a></td>
          <td><a class='btn btn-warning btn-sm' href='cadastro.php?action=edit&code={$address['idendereco']}'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
          <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
          <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
          </svg></a></td> 
          </tr>";
        }
      ?>
      </tbody>
        </table>
    </div>
  </li>
 </ul>       
    </div>
    </div>
</main>
<?php include_once '../footer.php'; ?>