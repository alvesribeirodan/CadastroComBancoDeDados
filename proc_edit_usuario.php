<?php
session_start();
include_once('conexao.php');

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$criar_usuario = "UPDATE usuarios SET nome='$nome', email='$email', modified=NOW() WHERE id='$id'";
$usuario_criado = mysqli_query($conn, $criar_usuario);

if (mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style= 'color=green'>Usuário editado com sucesso</p>";
    header("Location: listar.php");
} else {
    $_SESSION['msg'] = "<p style= 'color=red'>Usuário não editado com sucesso</p>";
    header("Location: edit_usuario.php?id=$id");
}