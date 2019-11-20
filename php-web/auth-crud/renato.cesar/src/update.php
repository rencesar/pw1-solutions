<?php
require_once("utils/config.php");
require_once("models/products.php");

session_start();
if (!$_SESSION['auth']){
    session_write_close();
    header('location: index.php');
}

if ($_GET['id']) {
    $product = ProductModel::getById($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['produto'] ?? null;
    $qtd = $_POST['qtd'] ?? null;
    $price = $_POST['price'] ?? null;

    if($name && $qtd) {
        $product->$name = $name;
        $product->$qtd = $qtd;
        $product->$price = $price;
        $product->save();
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
        <input type="text" name="produto" id="produtoInput" class="form-control" placeholder="Agua mineral" required="" autofocus="" value="<?php echo $product->name;?>">
        <label for="inputPrice">Price</label>
        <input type="number" name="price" id="inputPrice" class="form-control" placeholder="2" required="" step="0.01" value="<?php echo $product->price;?>">
        <label for="inputQtd">Qtd</label>
        <input type="number" name="qtd" id="inputqtd" class="form-control" placeholder="5" required="" value="<?php echo $product->qtd;?>">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Atualizar</button>
    </form>
</div>

<?php include('templates/footer.php') ?>