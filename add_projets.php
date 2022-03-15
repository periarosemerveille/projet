<?php
  $page_title = 'Add projets';
  require_once('includes/load.php');
  // Checkin What level projet has permission to view this page
 //page_require_level(1);
?>
<?php
  if(isset($_POST['add_projets'])){

   $req_fields = array('nom_projet','nom_client','cout_projet','delai_payement','budget_previsionnel','d_debut', 'd_fin','montant_verse','taux_avancement' );
   validate_fields($req_fields);

   if(empty($errors)){
           $nom_projet   = remove_junk($db->escape($_POST['nom_projet']));
           $nom_client   = remove_junk($db->escape($_POST['nom_client']));
       $cout_projet   = remove_junk($db->escape($_POST['cout_projet']));
       $delai_payement   = remove_junk($db->escape($_POST['delai_payement']));
       $budget_previsionnel   = remove_junk($db->escape($_POST['budget_previsionnel']));
       $d_debut   = remove_junk($db->escape($_POST['d_debut']));
       $d_fin   = remove_junk($db->escape($_POST['d_fin']));
       $montant_verse   = remove_junk($db->escape($_POST['montant_verse']));
       $taux_avancement   = remove_junk($db->escape($_POST['taux_avancement']));
      
        $query = "INSERT INTO projets (";
        $query .="nom_projet, nom_client, cout_projet, delai_payement, budget_previsionnel, d_debut, d_fin, montant_verse, taux_avancement";
        $query .=") VALUES (";
        $query .=" '{$nom_projet}', '{$nom_client}', '{$cout_projet}', '{$delai_payement}', '{$budget_previsionnel}', '{$d_debut}', '{$d_fin}', '{$montant_verse}', '{$taux_avancement}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"le projet a été créé! ");
          redirect('add_projets.php', false);
        } else {
          //failed
          $session->msg('d',' le projet n'/'a pas été créé!');
          redirect('add_projets.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_projets.php',false);
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
          <span>Ajouter un projet</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_projets.php">
            <div class="form-group">
                <label for="nom_projet">Nom projet</label>
                <input type="text" class="form-control" name="nom_projet" placeholder="">
            </div>
            <div class="form-group">
                <label for="nom_client">Nom client</label>
                <input type="text" class="form-control" name="nom_client" placeholder="">
            </div>
            <div class="form-group">
                <label for="cout_projet">Cout projet</label>
                <input type="text" class="form-control" name="cout_projet" placeholder="">
            </div>

            <div class="form-group">
                <label for="delai_payement">Delai de payement</label>
                <input type="date" class="form-control" name="delai_payement" placeholder="">
            </div>
            <div class="form-group">
                <label for="budget_previsionnel">budget previsionnel</label>
                <input type="text" class="form-control" name="budget_previsionnel" placeholder="">
            </div>
            <div class="form-group">
                <label for="d_debut">Date debut</label>
                <input type="date" class="form-control" name="d_debut" placeholder="">
            </div>

            <div class="form-group">
                <label for="d_fin">Date fin</label>
                <input type="date" class="form-control" name ="d_fin"  placeholder="">
            </div>
            <div class="form-group">
                <label for="montant_verse">montant versé</label>
                <input type="text" class="form-control" name ="montant_verse"  placeholder="">
            </div>
            <div class="form-group">
                <label for="taux_avancement">taux d'avancement</label>
                <input type="text" class="form-control" name="taux_avancement" placeholder="">
            </div>

            <div class="form-group clearfix">
              <button type="submit" name="add_projets" class="btn btn-primary">Ajouter un projet</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
