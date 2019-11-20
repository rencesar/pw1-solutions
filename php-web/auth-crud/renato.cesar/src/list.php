<?php
require_once("utils/config.php");
require_once("models/products.php");

session_start();
if (!$_SESSION['auth']){
   session_write_close();
   header('location: index.php');
}

?>

<?php include('templates/header.php') ?>
<?php include('templates/navegation.php') ?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Qtd</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">Tools</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $allProducts = ProductModel::readAll();

        foreach($allProducts as $product){
            echo "
            <tr>
                <td>".$product['name']."</td>
                <td>".$product['qtd']."</td>
                <td>".$product['price']."</td>
                <td>".$product['qtd']*$product['price']."</td>
                <td><a href='delete.php/?id=".$product['id']."'>Deletar</a> <a href='update.php/?id=".$product['id']."'>Atualizar</a></td>
            </tr>";
        }
    ?>
  </tbody>
</table>

<?php include('templates/footer.php') ?>