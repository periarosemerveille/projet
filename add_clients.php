<?php
  $page_title = 'Add Clients';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 // page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_clients'])){

   $req_fields = array('nom','prenom','email','adresse', 'cni', 'telephone', 'ville' );
   validate_fields($req_fields);

   if(empty($errors)){
           $nom   = remove_junk($db->escape($_POST['nom']));
       $prenom   = remove_junk($db->escape($_POST['prenom']));
       $email   = remove_junk($db->escape($_POST['email']));
       $adresse   = remove_junk($db->escape($_POST['adresse']));
       $cni   = remove_junk($db->escape($_POST['cni']));
       $telephone  = remove_junk($db->escape($_POST['telephone']));
       $ville  = remove_junk($db->escape($_POST['ville']));


//       $telephone= (int)$db->escape($_POST['telephone']);

        $query = "INSERT INTO clients (";
        $query .="nom, prenom, email, adresse, cni, telephone, ville";
        $query .=") VALUES (";
        $query .=" '{$nom}', '{$prenom}', '{$email}', '{$adresse}', '{$cni}', '{$telephone}', '{$ville}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"le client a été créé! ");
          redirect('add_clients.php', false);
        } else {
          //failed
          $session->msg('d',' le client n'/'a pas été créé!');
          redirect('add_clients.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_clients.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Ajouter un client</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_clients.php">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="nom">
            </div>
            <div class="form-group">
                <label for="prenom">prenom</label>
                <input type="text" class="form-control" name="prenom" placeholder="prenom">
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="text" class="form-control" name="email" placeholder="">
            </div>

            <div class="form-group">
                <label for="adresse">adresse</label>
                <input type="text" class="form-control" name="adresse" placeholder="">
            </div>
            <div class="form-group">
                <label for="cni">cni</label>
                <input type="text" class="form-control" name ="cni"  placeholder="">
            </div>

            <div class="form-group">
                <label for="telephone">telephone</label>
                <input type="text" class="form-control" name="telephone" placeholder="">
            </div>

            <div class="form-group">
                <label for="ville">ville</label>
                <input type="text" class="form-control" name="ville" placeholder="">
            </div>

            
            <div class="form-group clearfix">
              <button type="submit" name="add_clients" class="btn btn-primary">Ajouter un client</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
