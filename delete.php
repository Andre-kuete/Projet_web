<?php
include_once("connexion.php");
include_once("main.php");

if(!empty($_GET["id"])){
    $query="delete from client where idclient=:id";
    $objstmt=$pdo->prepare($query);
    $objstmt->execute(["id"=>$_GET["id"]]);
    $objstmt->closeCursor();
    header("Location:client.php");
}

if(!empty($_GET["idarticle"])){
    $query="delete from article where idarticle=:id";
    $objstmt=$pdo->prepare($query);
    $objstmt->execute(["id"=>$_GET["idarticle"]]);
    $objstmt->closeCursor();
    header("Location:article.php");
}
if(!empty($_GET["idcmd"])){
    $query="delete from commande where idcommande=:id";
    $objstmt=$pdo->prepare($query);
    $objstmt->execute(["id"=>$_GET["idcmd"]]);
    $objstmt->closeCursor();
    header("Location:commande.php");
}



