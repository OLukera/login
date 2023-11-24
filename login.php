<?php

require('conexao.php');



if(isset($_POST['acao'])){

    if(isset($_POST['email']) && isset($_POST['senha'])){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuarios = $mysqli->query("SELECT * FROM dados WHERE email = '$email' LIMIT 1");
        $usuario = $usuarios->fetch_assoc();
        

        if(isset($usuario) && $email == $usuario['email'] && $senha == $usuario['senha']){
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            header("Location: index.php");
        }else{
            echo "Dados incorretos";
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    
    <h1>Log in</h1>

    <form action="" method="post">

        <label for="">E-mail</label>
        <br>
        <input type="email" name="email" id="">
        <br><br>
        <label for="">Senha</label>
        <br>
        <input type="password" name="senha" id="">
        <br>
        <p>Não possui conta? <a href="registro.php">Cadastre-se</a></p>
        
        <input type="submit" value="Log in" name="acao">
    </form>

</body>
</html>