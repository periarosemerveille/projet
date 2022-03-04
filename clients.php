<?php
  $page_title = 'All User';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_clients = find_all_clients();
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
          <span>Clients</span>
       </strong>
         <a href="add_clients.php" class="btn btn-info pull-right">Ajouter un nouveau client</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Nom </th>
            <th>Prénom</th>
            <th>Email</th>
            <th>adresse</th>
            <th>cni</th>
            <th>telephone</th>
            <th>ville</th>
            <th class="text-center" style="width: 100px;">Actions</th>
            <!--<th class="text-center" style="width: 100px;">Actions</th>-->
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_clients as $a_client): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_client['nom']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_client['prenom']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_client['email']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_client['adresse']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_client['cni']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_client['telephone']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_client['ville']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_clients.php?id=<?php echo (int)$a_client['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_user.php?id=<?php echo (int)$a_client['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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
