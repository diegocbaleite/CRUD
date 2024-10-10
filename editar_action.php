<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $name && $email) {

   // UPDATE usuarios SET name = 'Diego', email = 'di@gmail.com' Where id =2
   $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, email = :email WHERE id = :id");
   $sql->bindValue(':id', $id);
   $sql->bindValue(':name', $name);
   $sql->bindValue(':email', $email);
   $sql->execute();

   header("Location: index.php");
   exit;

   
} else {
   header("Location: adicionar.php");
   exit;
}