<?php
  $page_title = 'Modifier le client';
  require_once('includes/load.php');
  // Checkin What level client has permission to view this page
   page_require_level(1);
?>
<?php
  $e_clients = find_by_id('clients',(int)$_GET['id']);
  if(!$e_clients){
    $session->msg("d","id introuvable.");
    redirect('clients.php');
  }
?>

<?php
//Update client basic info
  if(isset($_POST['update'])) {
    $req_fields = array('nom','prenom','email', 'adresse', 'cni', 'telephone', 'ville');
    validate_fields($req_fields);
    if(empty($errors)){
             $id = (int)$e_clients['id'];
           $nom = remove_junk($db->escape($_POST['nom']));
       $prenom = remove_junk($db->escape($_POST['prenom']));
       $email = remove_junk($db->escape($_POST['email']));
       $adresse = remove_junk($db->escape($_POST['adresse']));
       $cni = remove_junk($db->escape($_POST['cni']));
       $telephone= remove_junk($db->escape($_POST['telephone']));
       $ville = remove_junk($db->escape($_POST['ville']));
            $sql = "UPDATE clients SET nom ='{$nom}', prenom ='{$prenom}',email='{$email}', adresse='{$adresse}', cni='{$cni}', telephone='{$telephone}', ville='{$ville}'  WHERE id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Client modifiée ");
            redirect('edit_clients.php?id='.(int)$e_clients['id'], false);
          } else {
            $session->msg('d',' Aucune modification!');
            redirect('edit_clients.php?id='.(int)$e_clients['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('edit_clients.php?id='.(int)$e_clients['id'],false);
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
          Modifier le client <?php echo remove_junk(ucwords($e_clients['nom'])); ?> 
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="edit_clients.php?id=<?php echo (int)$e_clients['id'];?>" class="clearfix">
            <div class="form-group">
                  <label for="nom" class="control-label">nom</label>
                  <input type="name" class="form-control" name="nom" value="<?php echo remove_junk(ucwords($e_clients['nom'])); ?>">
            </div>
            <div class="form-group">
                  <label for="prenom" class="control-label">prenom</label>
                  <input type="text" class="form-control" name="prenom" value="<?php echo remove_junk(ucwords($e_clients['prenom'])); ?>">
            </div>
            <div class="form-group">
                  <label for="email" class="control-label">email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo remove_junk(ucwords($e_clients['email'])); ?>">
            </div>
            <div class="form-group">
                  <label for="adresse" class="control-label">adresse</label>
                  <input type="text" class="form-control" name="adresse" value="<?php echo remove_junk(ucwords($e_clients['adresse'])); ?>">
            </div>
            <div class="form-group">
                  <label for="cni" class="control-label">cni</label>
                  <input type="text" class="form-control" name="cni" value="<?php echo remove_junk(ucwords($e_clients['cni'])); ?>">
            </div>
            <div class="form-group">
                  <label for="telephone" class="control-label">telephone</label>
                  <input type="text" class="form-control" name="telephone" value="<?php echo remove_junk(ucwords($e_clients['telephone'])); ?>">
            </div>
            <div class="form-group">
                  <label for="ville" class="control-label">ville</label>
                  <input type="text" class="form-control" name="ville" value="<?php echo remove_junk(ucwords($e_clients['ville'])); ?>">
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
