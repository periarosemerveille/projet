<?php
  $page_title = 'Add projets';
  require_once('includes/load.php');
  // Checkin What level projet has permission to view this page
 //page_require_level(1);
?>
<?php
  if(isset($_POST['add_projets'])){

   $req_fields = array('name','cout','delai_payement','d_debut', 'd_fin' );
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['name']));
       $cout   = remove_junk($db->escape($_POST['cout']));
       $delai_payement   = remove_junk($db->escape($_POST['delai_payement']));
       $d_debut   = remove_junk($db->escape($_POST['d_debut']));
       $d_fin   = remove_junk($db->escape($_POST['d_fin']));
      
        $query = "INSERT INTO projets (";
        $query .="name, cout, delai_payement, d_debut, d_fin";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$cout}', '{$delai_payement}', '{$d_debut}', '{$d_fin}' ";
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
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="">
            </div>
            <div class="form-group">
                <label for="cout">Cout</label>
                <input type="text" class="form-control" name="cout" placeholder="">
            </div>

            <div class="form-group">
                <label for="delai_payement">Delai de payement</label>
                <input type="date" class="form-control" name="delai_payement" placeholder="">
            </div>

            <div class="form-group">
                <label for="d_debut">Date debut</label>
                <input type="date" class="form-control" name="d_debut" placeholder="">
            </div>

            <div class="form-group">
                <label for="d_fin">Date fin</label>
                <input type="date" class="form-control" name ="d_fin"  placeholder="">
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
