<?php
  $page_title = 'Modifier le commande';
  require_once('includes/load.php');
  // Checkin What level commande has permission to view this page
   page_require_level(1);
?>
<?php
  $e_commande = find_by_id('commande',(int)$_GET['id']);
  if(!$e_commande){
    $session->msg("d","id introuvable.");
    redirect('commande.php');
  }
?>

<?php
//Update commande basic info
  if(isset($_POST['update'])) {
    $req_fields = array('nom_projet','nom_client','motif', 'date');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_commande['id'];
           $nom_projet = remove_junk($db->escape($_POST['nom_projet']));
       $nom_client = remove_junk($db->escape($_POST['nom_client']));
       $motif = remove_junk($db->escape($_POST['motif']));
       $date = remove_junk($db->escape($_POST['date']));
    
            $sql = "UPDATE commande SET nom_projet ='{$nom_projet}', nom_client ='{$nom_client}', motif='{$motif}', date='{$date}'  WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"commande modifiée ");
            redirect('edit_commande.php?id='.(int)$e_commande['id'], false);
          } else {
            $session->msg('d',' Aucune modification!');
            redirect('edit_commande.php?id='.(int)$e_commande['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_commande.php?id='.(int)$e_commande['id'],false);
    }
  }
?>

<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-12">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Modifier la commande <?php echo remove_junk(ucwords($e_commande['nom_projet'])); ?> 
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_commande.php?id=<?php echo (int)$e_commande['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="nom_projet" class="control-label">nom_projet</label>
                  <input type="text" class="form-control" name="nom_projet" value="<?php echo remove_junk(ucwords($e_commande['nom_projet'])); ?>">
            </div>
            <div class="form-group">
                  <label for="nom_client" class="control-label">nom_client</label>
                  <input type="text" class="form-control" name="nom_client" value="<?php echo remove_junk(ucwords($e_commande['nom_client'])); ?>">
            </div>
            <div class="form-group">
                  <label for="motif" class="control-label">motif</label>
                  <input type="text" class="form-control" name="motif" value="<?php echo remove_junk(ucwords($e_commande['motif'])); ?>">
            </div>
            <div class="form-group">
                  <label for="date" class="control-label">date</label>
                  <input type="date" class="form-control" name="date" value="<?php echo remove_junk(ucwords($e_commande['date'])); ?>">
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Modifier</button>
            </div>
        </form>
       </div>
     </div>
  </div>
  <!-- Change password form -->


 </div>
<?php include_once('layouts/footer.php'); ?>
