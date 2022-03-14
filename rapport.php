<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_rapport = find_all_rapport();
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
          <span>rapport</span>
       </strong>
         <a href="add_rapport.php" class="btn btn-info pull-right">Ajouter un nouveau rapport</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>date depot </th>
            <th>montant</th>
            <th>nom client</th>
            <th>motif</th>
            <th class="text-center" style="width: 100px;">Actions</th>
            <!--<th class="text-center" style="width: 100px;">Actions</th>-->
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_rapport as $a_rapport): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_rapport['date_depot']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_rapport['montant']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_rapport['nom_client']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_rapport['motif']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_rapport.php?id=<?php echo (int)$a_rapport['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Modifier">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_rapport.php?id=<?php echo (int)$a_rapport['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Supprimer">
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
