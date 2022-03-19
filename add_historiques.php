<?php
  $page_title = 'Add Historiques';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
 // page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_historiques'])){

   $req_fields = array('activites','motif','montant','date' );
   validate_fields($req_fields);

   if(empty($errors)){
           $activites   = remove_junk($db->escape($_POST['activites']));
       $motif   = remove_junk($db->escape($_POST['motif']));
       $montant   = remove_junk($db->escape($_POST['montant']));
       $date   = remove_junk($db->escape($_POST['date']));


//       $telephone= (int)$db->escape($_POST['telephone']);

        $query = "INSERT INTO historiques (";
        $query .="activites, motif, montant, date";
        $query .=") VALUES (";
        $query .=" '{$activites}', '{$motif}', '{$montant}', '{$date}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"le historique a été créé! ");
          redirect('historiques.php', false);
        } else {
          //failed
          $session->msg('d',' le historique n'/'a pas été créé!');
          redirect('historiques.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('historiques.php',false);
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
          <span>Ajouter un historique</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_historiques.php">
            <div class="form-group">
                <label for="activites">Activites</label>
                <input type="text" class="form-control" name="activites" placeholder="">
            </div>
            <div class="form-group">
                <label for="motif">Motif</label>
                <input type="text" class="form-control" name="motif" placeholder="">
            </div>

            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" class="form-control" name="montant" placeholder="">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" placeholder="">
            </div>
            
            <div class="form-group clearfix">
              <button type="submit" name="add_historiques" class="btn btn-primary">Ajouter un historique</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
