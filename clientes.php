<?php include __DIR__ . '/conexao.php'; ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="navbar">
    <h2>Clientes</h2>
    <a href="index.php">Voltar</a>
</div>

<div class="container">

<div class="card">
<h3>Novo Cliente</h3>

<form method="POST">
<input name="cpf" placeholder="CPF" required>
<input name="rg" placeholder="RG">
<input name="nome" placeholder="Nome" required>
<input name="telefone" placeholder="Telefone">
<input name="endereco" placeholder="Endereço">
<button type="submit">Salvar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn->query("INSERT INTO clientes (cpf, rg, nome, telefone, endereco)
    VALUES (
        '{$_POST['cpf']}',
        '{$_POST['rg']}',
        '{$_POST['nome']}',
        '{$_POST['telefone']}',
        '{$_POST['endereco']}'
    )");
    echo "Cliente cadastrado!";
}
?>
</div>

<div class="card">
<h3>Lista</h3>

<table>
<tr><th>Nome</th><th>CPF</th><th>Telefone</th></tr>

<?php
$res = $conn->query("SELECT * FROM clientes");
while($c = $res->fetch_assoc()){
    echo "<tr>
        <td>{$c['nome']}</td>
        <td>{$c['cpf']}</td>
        <td>{$c['telefone']}</td>
    </tr>";
}
?>
</table>
</div>

</div>
</body>
</html>