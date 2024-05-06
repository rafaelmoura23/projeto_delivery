<?php
session_start();

$endereco = 'localhost';
$banco = 'postgres';
$adm = 'postgres';
$senha = 'postgres';

try {
    $pdo = new PDO(
        "pgsql:host=$endereco;port=5432;dbname=$banco",
        $adm,
        $senha,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo "Falha ao conectar ao banco de dados. <br/>";
    die($e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM cliente WHERE cpf = :cpf";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':cpf', $cpf);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cliente && password_verify($senha, $cliente['senha'])) {
        $_SESSION["cliente"] = $cliente;
        header("Location: interna.php");
        exit();
    } else {
        $erro = "CPF ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($erro)) : ?>
        <p><?php echo $erro; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
