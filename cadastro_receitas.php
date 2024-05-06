<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaria</title>
    <link rel="stylesheet" href="style/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'html/header.html'; ?>
    <div class="container">
        <form action="cadastro_pizzas.php" method="post">
            <div class="col-4">
                <h2>Cadastro de Prato</h2>
                <label for="sabor">Sabor do Prato</label>
                <input type="text" name="sabor_pizza" id="sabor_pizza" class="form-control">
            </div>
            <div class="col-4">
                <label for="preco">Tamanho do Prato</label>
                <select name="tamanho_pizza" id="tamanho_pizza" name="tamanho_pizza">
                    <option value="P">P</option>
                    <option value="M">M</option>
                    <option value="G">G</option>
                </select>
            </div>
            <div class="col-4">
                <label for="preco">Preço do Prato</label>
                <input type="text" name="preco_pizza" id="preco_pizza" class="form-control">
            </div>
            <div class="col-4">
                <label for="descricao">Descrição do Prato</label>
                <input type="text" name="descricao_pizza" id="descricao_pizza" class="form-control">
            </div>
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem_pizza" id="imagem_pizza"><br><br>
                <input type="submit" value="Cadastrar">
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
    <!-- <?php include 'html/footer.html'; ?> -->
</body>

</html>