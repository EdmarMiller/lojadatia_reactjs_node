<?php

    header("Access-Control-Allow-Origin:*");

    require_once "conexao.php";

    if($_SERVER['REQUEST_METHOD'] === 'GET'){

        $sql = "SELECT * FROM comentarios;";
        $resultado = query($sql);
        $comentarios = [];

        while($row = mysqli_fetch_assoc($resultado)){
            $comentarios[] = $row;
        }

        echo json_encode($comentarios); 

    } else if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $nome = $_POST['nome'];
        $msg = $_POST['msg'];

        $sql = "INSERT INTO comentarios (nome, msg) VALUES ('$nome', '$msg');
        nonquery($sql);
    }


?>