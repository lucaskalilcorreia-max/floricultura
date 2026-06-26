<?php include __DIR__ . '/conexao.php'; ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="navbar">
    <h2>Vendas</h2>
    <a href="index.php">Voltar</a>
</div>

<div class="container">

<div class="card">
<h3>Registrar Venda</h3>

<form method="POST">

<select name="cliente">
<?php
$c=$conn->query("SELECT * FROM clientes");
while($cli=$c->fetch_assoc()){
echo "<option value='{$cli['id']}'>{$cli['nome']}</option>";
}
?>
</select>

<input name="nf" placeholder="Nota Fiscal">
<input type="date" name="data">
<input name="valor" placeholder="Valor total">

<button type="submit">Salvar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$conn->query("INSERT INTO vendas (cliente_id, numero_nf, data_compra, valor_total)
VALUES (
    '{$_POST['cliente']}',
    '{$_POST['nf']}',
    '{$_POST['data']}',
    '{$_POST['valor']}'
)");
echo "Venda registrada!";
}
?>
</div>

<div class="card">
<table>
<tr><th>Cliente</th><th>NF</th><th>Valor</th></tr>

<?php
$sql="SELECT v.*, c.nome FROM vendas v 
JOIN clientes c ON v.cliente_id = c.id";

$r=$conn->query($sql);

while($v=$r->fetch_assoc()){
echo "<tr>
<td>{$v['nome']}</td>
<td>{$v['numero_nf']}</td>
<td>R$ {$v['valor_total']}</td>
</tr>";
}
?>
</table>
</div>

</div>
</body>
</html>