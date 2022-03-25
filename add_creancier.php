<?php
  $page_title = 'Add creancier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 // page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_creancier'])){

   $req_fields = array('nom','montant','statut','date', 'interet');
   validate_fields($req_fields);

   if(empty($errors)){
           $nom   = remove_junk($db->escape($_POST['nom']));
       $montant   = remove_junk($db->escape($_POST['montant']));
       $statut   = remove_junk($db->escape($_POST['statut']));
       $date   = remove_junk($db->escape($_POST['date']));
       $interet   = remove_junk($db->escape($_POST['interet']));
       


//       $telephone= (int)$db->escape($_POST['telephone']);

        $query = "INSERT INTO creancier (";
        $query .="nom, montant, statut, date, interet";
        $query .=") VALUES (";
        $query .=" '{$nom}', '{$montant}', '{$statut}', '{$date}', '{$interet}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"le creancier a été créé! ");
          redirect('add_creancier.php', false);
        } else {
          //failed
          $session->msg('d',' le creancier n'/'a pas été créé!');
          redirect('add_creancier.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_creancier.php',false);
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
          <span>Ajouter une créance</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_creancier.php">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="">
            </div>
            <div class="form-group">
                <label for="montant">montant</label>
                <input type="text" class="form-control" name="montant" placeholder="">
            </div>

            <div class="form-group">
                <label for="statut">statut</label>
                <input type="text" class="form-control" name="statut" placeholder="">
            </div>

            <div class="form-group">
                <label for="date">date</label>
                <input type="date" class="form-control" name="date" placeholder="">
            </div>
            <div class="form-group">
                <label for="interet">interet</label>
                <input type="text" class="form-control" name ="interet"  placeholder="">
            </div>
            
            <div class="form-group clearfix">
              <button type="submit" name="add_creancier" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
