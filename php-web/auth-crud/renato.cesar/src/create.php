<?php
require_once("utils/config.php");
require_once("models/products.php");

session_start();
if (!$_SESSION['auth']){
   session_write_close();
   header('location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $name = $_POST['produto'] ?? null;
   $qtd = $_POST['qtd'] ?? null;
   $price = $_POST['price'] ?? null;
   
   if($name && $qtd) {
      $result = ProductModel::create($name, $qtd, $price);
      session_write_close();
      header('location: list.php');
   }
}

?>

<?php include('templates/header.php') ?>
<?php include('templates/navegation.php') ?>

<div class="content">
    <form class="form-signin" method="POST">
        <label for="produtoInput">Produto</label>
        <input type="text" name="produto" id="produtoInput" class="form-control" placeholder="Agua mineral" required="" autofocus="">
        <label for="inputPrice">Price</label>
        <input type="number" name="price" id="inputPrice" class="form-control" placeholder="2" required="" step="0.01">
        <label for="inputQtd">Qtd</label>
        <input type="number" name="qtd" id="inputqtd" class="form-control" placeholder="5" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Cadastrar</button>
    </form>
</div>

<?php include('templates/footer.php') ?>