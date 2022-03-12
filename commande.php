<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_commande = find_all_commande();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>commande</span>
       </strong>
         <a href="add_commande.php" class="btn btn-info pull-right">Ajouter une commande</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Nom_projet </th>
            <th>nom_client</th>
            <th>motif</th>
            <th>date</th>
            <th class="text-center" style="width: 100px;">Actions</th>
            <!--<th class="text-center" style="width: 100px;">Actions</th>-->
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_commande as $a_commande): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_commande['nom_projet']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_commande['nom_client']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_commande['motif']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_commande['date']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_commande.php?id=<?php echo (int)$a_commande['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Modifier">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_commande.php?id=<?php echo (int)$a_commande['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Supprimer">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
