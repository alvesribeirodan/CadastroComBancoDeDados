<?php

session_start();
include_once('conexao.php');

//$result_usuario = "DELETE FROM usuarios WHERE id = '$id'";
//$resultado_usuario = mysqli_query($conexao, $result_usuario);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    $result_usuario = "DELETE FROM usuarios WHERE id = '$id'";
    $resultado_usuario  = mysqli_query($conn, $result_usuario);

    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<p style= 'color=green'>Usuário apagado com sucesso</p>";
        header("Location: listar.php");
    } else {
        $_SESSION['msg'] = "<p style= 'color=red'>Usuário não apagado</p>";
        header("Location: listar.php");
    }
}
