<?php
  $page_title = 'Modifier le budget';
  require_once('includes/load.php');
  // Checkin What level budget has permission to view this page
   page_require_level(1);
?>
<?php
  $e_budget = find_by_id('budget',(int)$_GET['id']);
  if(!$e_budget){
    $session->msg("d","id introuvable.");
    redirect('budget.php');
  }
?>

<?php
//Update budget basic info
  if(isset($_POST['update'])) {
    $req_fields = array('date_depot','montant','nom_client', 'motif' );
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_budget['id'];
           $date_depot = remove_junk($db->escape($_POST['date_depot']));
       $montant = remove_junk($db->escape($_POST['montant']));
       $nom_client = remove_junk($db->escape($_POST['nom_client']));
       $motif = remove_junk($db->escape($_POST['motif']));
            $sql = "UPDATE budget SET date_depot ='{$date_depot}', montant ='{$montant}',nom_client='{$nom_client}', motif='{$motif}'  WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"budget modifiée ");
            redirect('edit_budget.php?id='.(int)$e_budget['id'], false);
          } else {
            $session->msg('d',' Aucune modification!');
            redirect('edit_budget.php?id='.(int)$e_budget['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_budget.php?id='.(int)$e_budget['id'],false);
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
          Modifier le budget <?php echo remove_junk(ucwords($e_budget['nom_client'])); ?> 
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_budget.php?id=<?php echo (int)$e_budget['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="date_depot" class="control-label">date depot</label>
                  <input type="date" class="form-control" name="date_depot" value="<?php echo remove_junk(ucwords($e_budget['date_depot'])); ?>">
            </div>
            <div class="form-group">
                  <label for="montant" class="control-label">montant</label>
                  <input type="text" class="form-control" name="montant" value="<?php echo remove_junk(ucwords($e_budget['montant'])); ?>">
            </div>
            <div class="form-group">
                  <label for="nom_client" class="control-label">nom client/entreprise</label>
                  <input type="text" class="form-control" name="nom_client" value="<?php echo remove_junk(ucwords($e_budget['nom_client'])); ?>">
            </div>
            <div class="form-group">
                  <label for="motif" class="control-label">motif</label>
                  <input type="text" class="form-control" name="motif" value="<?php echo remove_junk(ucwords($e_budget['motif'])); ?>">
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
