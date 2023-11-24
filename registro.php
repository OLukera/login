<?php

require('conexao.php');

if(isset($_POST['acao'])){

    if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome'])){

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $mysqli->prepare("INSERT INTO dados (nome,email,senha) VALUES (?,?,?)");
        $stmt->execute([$nome,$email,$senha]);
        $stmt->close();
        echo "Cadastro realizado com sucesso <a href='login.php'>Log in</a> <br><br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    
    <h1>Cadastre-se</h1>

    <form action="" method="post">
        <label for="">Nome</label>
        <br>
        <input type="text" name="nome" id="">
        <br><br>
        <label for="">E-mail</label>
        <br>
        <input type="email" name="email" id="">
        <br><br>
        <label for="">Senha</label>
        <br>
        <input type="password" name="senha" id="">
        <br><br>
        <input type="submit" value="Cadastrar" name="acao">
    </form>

</body>
</html>