<?php
// Conecte-se ao banco de dados
$servername = "localhost";
$usuario = " ";
$senha = " ";
$dbname = "contasdev";

$conn = new mysqli($servername, $usuario, $senha, $dbname);

// Verifique se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtenha os valores enviados pelo formulário
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Consulta SQL para verificar se o usuário já existe
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuário já existe
    echo "Usuário já registrado. Tente novamente com um nome de usuário diferente.";
} else {
    // Insira o novo usuário no banco de dados
    $sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$senha')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro bem-sucedido!";
    } else {
        echo "Erro ao registrar o usuário: " . $conn->error;
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
