<?php 
$commande=true;
include_once("header.php");
include_once("main.php");
$query="select  idclient from client";
$objstmt= $pdo->prepare($query);
$objstmt->execute();
if(!empty($_POST)){
    $query="update  commande set idclient=:idcl, date=:date where idcommande=:id";
    $pdostmt=$pdo->prepare($query);
   // $pdostmt->execute(["id"=>$_GET["id"]]);
    $pdostmt->execute(["idcl"=>$_POST["inputidcl"],"date"=>$_POST["inputdate"],"id"=>$_POST["myid"]]);
    header("Location:commande.php");
    }
if(!empty($_GET["id"])){
    $query="select * from commande where idcommande=:id";
    $pdostmt=$pdo->prepare($query);
    $pdostmt->execute(["id"=>$_GET["id"]]);
    while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
    

?>

<h1 class="mt-5"> Modifier une commande</h1>

<form class="row g-3" method="POST">
<input type="hidden" name="myid" value="<?php echo $row["idcommande"]?>"/>
  
  <div class="col-md-6">
  <label for="inputidcl" class="form-label">ID client</label>
    <select class="form-control" name="inputidcl" required>
     <?php
    
       foreach($objstmt->fetchAll(PDO::FETCH_ASSOC) as $tab){
        foreach($tab as $elmt){
            if( $row["idclient"]==$elmt){
                $selected="selected";
            }else{
                $selected= "";
            }
          echo "<option value=".$elmt." " .$selected.">".$elmt."</option>";
        }
      }
     ?>

    </select>
  </div>

  <div class="col-md-6">
    <label for="inputdate" class="form-label">Date</label>
    <input type="date" class="form-control" id="inputdate" name="inputdate" value="<?php echo $row["date"]?>" required>
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