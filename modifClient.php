<?php 
$client=true;
include_once("header.php");
include_once("main.php");
if(!empty($_POST)){
    $query="update  client set nom=:nom, ville=:ville, telephone=:tel where idclient=:id";
    $pdostmt=$pdo->prepare($query);
   // $pdostmt->execute(["id"=>$_GET["id"]]);
    $pdostmt->execute(["nom"=>$_POST["inputnom"],"ville"=>$_POST["inputville"],"tel"=>$_POST["inputtel"],"id"=>$_POST["myid"]]);
    header("Location:client.php");
    }
if(!empty($_GET["id"])){
    $query="select * from client where idclient=:id";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["id"=>$_GET["id"]]);
    while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
    

?>

<h1 class="mt-5"> Modifier un client</h1>

<form class="row g-3" method="POST">
<input type="hidden" name="myid" value="<?php echo $row["idclient"]?>"/>
  
  <div class="col-md-6">
    <label for="inputnom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="inputnom" name="inputnom" value="<?php echo $row["nom"]?>" required>
  </div>

  <div class="col-md-6">
    <label for="inputville" class="form-label">Ville</label>
    <input type="text" class="form-control" id="inputville" name="inputville" value="<?php echo $row["ville"]?>" required>
  </div>
  
  <div class="col-12">
    <label for="inputtel" class="form-label">Telephone</label>
    <input type="text" class="form-control" id="inputtel" name="inputtel" value="<?php echo $row["telephone"]?>"  required>
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Modifier</button>
  </div>
</form>

</div>
</main>

<?php
endwhile;
$pdostmt->closeCursor();//liberer le pdostmnt de la zone memoire
   
}

    
?>


<?php
include_once("footer.php");
?>