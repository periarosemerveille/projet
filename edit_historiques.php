<?php
  $page_title = 'Modifier le client';
  require_once('includes/load.php');
  // Checkin What level client has permission to view this page
   page_require_level(1);
?>
<?php
  $e_historiques = find_by_id('historiques',(int)$_GET['id']);
  if(!$e_historiques){
    $session->msg("d","id introuvable.");
    redirect('historiques.php');
  }
?>

<?php
//Update client basic info
  if(isset($_POST['update'])) {
    $req_fields = array('activites','motif','montant', 'date');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_historiques['id'];
           $activites = remove_junk($db->escape($_POST['activites']));
       $motif = remove_junk($db->escape($_POST['motif']));
       $montant = remove_junk($db->escape($_POST['montant']));
       $date = remove_junk($db->escape($_POST['date']));
       
            $sql = "UPDATE historiques SET activites ='{$activites}', motif ='{$motif}',montant='{$montant}', date='{$date}'  WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Client modifiée ");
            redirect('historiques.php?id='.(int)$e_historiques['id'], false);
          } else {
            $session->msg('d',' Aucune modification!');
            redirect('historiques.php?id='.(int)$e_historiques['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('historiques.php?id='.(int)$e_historiques['id'],false);
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
          Modifier l'activité <?php echo remove_junk(ucwords($e_historiques['activites'])); ?> 
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_historiques.php?id=<?php echo (int)$e_historiques['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="activites" class="control-label">activites</label>
                  <input type="text" class="form-control" name="activites" value="<?php echo remove_junk(ucwords($e_historiques['activites'])); ?>">
            </div>
            <div class="form-group">
                  <label for="motif" class="control-label">motif</label>
                  <input type="text" class="form-control" name="motif" value="<?php echo remove_junk(ucwords($e_historiques['motif'])); ?>">
            </div>
            <div class="form-group">
                  <label for="montant" class="control-label">montant</label>
                  <input type="number" class="form-control" name="montant" value="<?php echo remove_junk(ucwords($e_historiques['montant'])); ?>">
            </div>
            <div class="form-group">
                  <label for="date" class="control-label">date</label>
                  <input type="date" class="form-control" name="date" value="<?php echo remove_junk(ucwords($e_historiques['date'])); ?>">
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
