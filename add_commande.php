<?php
  $page_title = 'Add commande';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 // page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_commande'])){

   $req_fields = array('nom_projet','nom_client','motif','prix', 'date' );
   validate_fields($req_fields);

   if(empty($errors)){
           $nom_projet   = remove_junk($db->escape($_POST['nom_projet']));
       $nom_client   = remove_junk($db->escape($_POST['nom_client']));
       $motif   = remove_junk($db->escape($_POST['motif']));
       $prix   = remove_junk($db->escape($_POST['prix']));
       $date   = remove_junk($db->escape($_POST['date']));
       
//       $telephone= (int)$db->escape($_POST['telephone']);

        $query = "INSERT INTO commande (";
        $query .="nom_projet, nom_client, motif,prix, date";
        $query .=") VALUES (";
        $query .=" '{$nom_projet}', '{$nom_client}', '{$motif}','{$prix}', '{$date}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"le commande a été créé! ");
          redirect('add_commande.php', false);
        } else {
          //failed
          $session->msg('d',' le commande n'/'a pas été créé!');
          redirect('add_commande.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_commande.php',false);
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
          <span>Ajouter une commande</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_commande.php">
            <div class="form-group">
                <label for="nom_projet">Nom_projet</label>
                <input type="text" class="form-control" name="nom_projet" placeholder="">
            </div>
            <div class="form-group">
                <label for="nom_client">nom_client</label>
                <input type="text" class="form-control" name="nom_client" placeholder="">
            </div>

            <div class="form-group">
                <label for="motif">motif</label>
                <input type="text" class="form-control" name="motif" placeholder="">
            </div>
            <div class="form-group">
                <label for="prix">prix</label>
                <input type="text" class="form-control" name="prix" placeholder="">
            </div>

            <div class="form-group">
                <label for="date">date</label>
                <input type="date" class="form-control" name="date" placeholder="">
            </div>
            
            <div class="form-group clearfix">
              <button type="submit" name="add_commande" class="btn btn-primary">Ajouter une commande</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
