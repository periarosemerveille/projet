<?php
  $page_title = 'Modifier le client';
  require_once('includes/load.php');
  // Checkin What level client has permission to view this page
   page_require_level(1);
?>
<?php
  $e_projets = find_by_id('projets',(int)$_GET['id']);
  if(!$e_projets){
    $session->msg("d","id introuvable.");
    redirect('projets.php');
  }
?>

<?php
//Update client basic info
  if(isset($_POST['update'])) {
    $req_fields = array('nom_projet','nom_client','cout_projet','delai_payement', 'budget_previsionnel', 'd_debut', 'd_fin', 'montant_verse', 'taux_avancement');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_projets['id'];
           $nom_projet = remove_junk($db->escape($_POST['nom_projet']));
           $nom_client = remove_junk($db->escape($_POST['nom_client']));
       $cout_projet = remove_junk($db->escape($_POST['cout_projet']));
       $delai_payement = remove_junk($db->escape($_POST['delai_payement']));
       $budget_previsionnel = remove_junk($db->escape($_POST['budget_previsionnel']));
       $d_debut = remove_junk($db->escape($_POST['d_debut']));
       $d_fin= remove_junk($db->escape($_POST['d_fin']));
       $montant_verse = remove_junk($db->escape($_POST['montant_verse']));
       $taux_avancement = remove_junk($db->escape($_POST['taux_avancement']));
            $sql = "UPDATE projets SET nom_projet ='{$nom_projet}', nom_client ='{$nom_client}',cout_projet='{$cout_projet}', delai_payement='{$delai_payement}', budget_previsionnel='{$budget_previsionnel}', d_debut='{$d_debut}', d_fin='{$d_fin}', montant_verse='{$montant_verse}', taux_avancement='{$taux_avancement}'  WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"projet modifiée ");
            redirect('edit_projets.php?id='.(int)$e_projets['id'], false);
          } else {
            $session->msg('d',' Aucune modification!');
            redirect('edit_projets.php?id='.(int)$e_projets['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_projets.php?id='.(int)$e_projets['id'],false);
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
          Modifier le client <?php echo remove_junk(ucwords($e_projets['nom_projet'])); ?> 
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_projets.php?id=<?php echo (int)$e_projets['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="nom_projet" class="control-label">nom projet</label>
                  <input type="name" class="form-control" name="nom_projet" value="<?php echo remove_junk(ucwords($e_projets['nom_projet'])); ?>">
            </div>
            <div class="form-group">
                  <label for="nom_client" class="control-label">nom client</label>
                  <input type="text" class="form-control" name="nom_client" value="<?php echo remove_junk(ucwords($e_projets['nom_client'])); ?>">
            </div>
            <div class="form-group">
                  <label for="cout_projet" class="control-label">cout projet</label>
                  <input type="text" class="form-control" name="cout_projet" value="<?php echo remove_junk(ucwords($e_projets['cout_projet'])); ?>">
            </div>
            <div class="form-group">
                  <label for="delai_payement" class="control-label">delai payement</label>
                  <input type="date" class="form-control" name="delai_payement" value="<?php echo remove_junk(ucwords($e_projets['delai_payement'])); ?>">
            </div>
            <div class="form-group">
                  <label for="budget_previsionnel" class="control-label">budget_previsionnel</label>
                  <input type="text" class="form-control" name="budget_previsionnel" value="<?php echo remove_junk(ucwords($e_projets['budget_previsionnel'])); ?>">
            </div>
            <div class="form-group">
                  <label for="d_debut" class="control-label">date debut</label>
                  <input type="date" class="form-control" name="d_debut" value="<?php echo remove_junk(ucwords($e_projets['d_debut'])); ?>">
            </div>
            <div class="form-group">
                  <label for="d_fin" class="control-label">date fin</label>
                  <input type="date" class="form-control" name="d_fin" value="<?php echo remove_junk(ucwords($e_projets['d_fin'])); ?>">
            </div>
            <div class="form-group">
                  <label for="montant_verse" class="control-label">montant_versé</label>
                  <input type="text" class="form-control" name="montant_verse" value="<?php echo remove_junk(ucwords($e_projets['montant_verse'])); ?>">
            </div>
            <div class="form-group">
                  <label for="taux_avancement" class="control-label">taux d'avancement</label>
                  <input type="text" class="form-control" name="taux_avancement" value="<?php echo remove_junk(ucwords($e_projets['taux_avancement'])); ?>">
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
