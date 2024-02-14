<?php 
$article=true;
include_once("header.php");
include_once("main.php");

if(!empty($_POST["inputdesc"])&&!empty($_POST["inputpu"])){
    $query="insert into article(description,prix_unitaire) values (:desc,:pu)";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["desc"=>$_POST["inputdesc"],"pu"=>$_POST["inputpu"]]);
    $pdostmt->closeCursor();//liberer le pdostmnt de la zone memoire
    header("Location:article.php");
}
?>

<h1 class="mt-5"> Ajouter un article</h1>

<form class="row g-3" method="POST">
  <div class="col-md-6">
  <label for="inputdesc">Description</label>
  <textarea class="form-control" placeholder="mettre la description" id="inputdesc" name="inputdesc" required></textarea>
 
  
</div>

  <div class="col-md-6">
    <label for="inputpu" class="form-label">PU</label>
    <input type="text" class="form-control" id="inputpu" name="inputpu" required>
  </div>
  
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Ajouter</button>
  </div>
</form>

</div>
</main>



<?php
include_once("footer.php");
?>