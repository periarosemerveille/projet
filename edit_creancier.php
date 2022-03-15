<?php
  $page_title = 'Modifier le creancier';
  require_once('includes/load.php');
  // Checkin What level creancier has permission to view this page
   page_require_level(1);
?>
<?php
  $e_creancier = find_by_id('creancier',(int)$_GET['id']);
  if(!$e_creancier){
    $session->msg("d","id introuvable.");
    redirect('creancier.php');
  }
?>

<?php
//Update creancier basic info
  if(isset($_POST['update'])) {
    $req_fields = array('nom','montant','statut', 'date', 'interet');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_creancier['id'];
           $nom = remove_junk($db->escape($_POST['nom']));
       $montant = remove_junk($db->escape($_POST['montant']));
       $statut = remove_junk($db->escape($_POST['statut']));
       $date = remove_junk($db->escape($_POST['date']));
       $interet = remove_junk($db->escape($_POST['interet']));
       
            $sql = "UPDATE creancier SET nom ='{$nom}', montant ='{$montant}',statut='{$statut}', date='{$date}', interet='{$interet}'  WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"creancier modifiée ");
            redirect('edit_creancier.php?id='.(int)$e_creancier['id'], false);
          } else {
            $session->msg('d',' Aucune modification!');
            redirect('edit_creancier.php?id='.(int)$e_creancier['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_creancier.php?id='.(int)$e_creancier['id'],false);
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
          Modifier le creancier <?php echo remove_junk(ucwords($e_creancier['nom'])); ?> 
        </strong>
       </div>
       <div class="panel-body">
       <form method="post" action="edit_creancier.php?id=<?php echo (int)$e_creancier['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="nom" class="control-label">nom</label>
                  <input type="name" class="form-control" name="nom" value="<?php echo remove_junk(ucwords($e_creancier['nom'])); ?>">
            </div>
            <div class="form-group">
                  <label for="montant" class="control-label">montant</label>
                  <input type="text" class="form-control" name="montant" value="<?php echo remove_junk(ucwords($e_creancier['montant'])); ?>">
            </div>
            <div class="form-group">
                  <label for="statut" class="control-label">statut</label>
                  <input type="text" class="form-control" name="statut" value="<?php echo remove_junk(ucwords($e_creancier['statut'])); ?>">
            </div>
            <div class="form-group">
                  <label for="date" class="control-label">date</label>
                  <input type="text" class="form-control" name="date" value="<?php echo remove_junk(ucwords($e_creancier['date'])); ?>">
            </div>
            <div class="form-group">
                  <label for="interet" class="control-label">interet</label>
                  <input type="text" class="form-control" name="interet" value="<?php echo remove_junk(ucwords($e_creancier['interet'])); ?>">
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
