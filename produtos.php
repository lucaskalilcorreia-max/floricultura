<?php include __DIR__ . '/conexao.php'; ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./css/estilo.css">
</head>
<body>

<div class="navbar">
    <h2>Produtos</h2>
    <a href="./index.html">Voltar</a>
</div>

<div class="container">

<div class="card">
<h3>Novo Produto</h3>

<form method="POST">
<input name="codigo" placeholder="Código">
<input name="nome" placeholder="Nome">
<input name="tipo" placeholder="Tipo">
<input name="preco" placeholder="Preço">
<input name="estoque" placeholder="Estoque">
<button type="submit">Salvar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$conn->query("INSERT INTO produtos (codigo, nome, tipo, preco, estoque)
VALUES (
    '{$_POST['codigo']}',
    '{$_POST['nome']}',
    '{$_POST['tipo']}',
    '{$_POST['preco']}',
    '{$_POST['estoque']}'
)");
echo "Produto cadastrado!";
}
?>
</div>

<div class="card">
<table>
<tr><th>Nome</th><th>Preço</th><th>Estoque</th></tr>

<?php
$r=$conn->query("SELECT * FROM produtos");
while($p=$r->fetch_assoc()){
echo "<tr>
<td>{$p['nome']}</td>
<td>R$ {$p['preco']}</td>
<td>{$p['estoque']}</td>
</tr>";
}
?>
</table>
</div>

</div>
</body>
</html>
