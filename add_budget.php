<?php
  $page_title = 'Add budget';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 // page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_budget'])){

   $req_fields = array('date_depot','montant','nom_client','motif' );
   validate_fields($req_fields);

   if(empty($errors)){
           $date_depot   = remove_junk($db->escape($_POST['date_depot']));
       $montant   = remove_junk($db->escape($_POST['montant']));
       $nom_client   = remove_junk($db->escape($_POST['nom_client']));
       $motif   = remove_junk($db->escape($_POST['motif']));

//       $telephone= (int)$db->escape($_POST['telephone']);

        $query = "INSERT INTO budget (";
        $query .="date_depot, montant, nom_client, motif";
        $query .=") VALUES (";
        $query .=" '{$date_depot}', '{$montant}', '{$nom_client}', '{$motif}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"le budget a été créé! ");
          redirect('add_budget.php', false);
        } else {
          //failed
          $session->msg('d',' le budget n'/'a pas été créé!');
          redirect('add_budget.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_budget.php',false);
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
          <span>Ajouter un budget</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_budget.php">
            <div class="form-group">
                <label for="date_depot">date depot</label>
                <input type="date" class="form-control" name="date_depot" placeholder="">
            </div>
            <div class="form-group">
                <label for="montant">montant</label>
                <input type="text" class="form-control" name="montant" placeholder="">
            </div>

            <div class="form-group">
                <label for="nom_client">nom client</label>
                <input type="text" class="form-control" name="nom_client" placeholder="">
            </div>

            <div class="form-group">
                <label for="motif">motif</label>
                <input type="text" class="form-control" name="motif" placeholder="">
            </div>
            
            <div class="form-group clearfix">
              <button type="submit" name="add_budget" class="btn btn-primary">Ajouter un budget</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
