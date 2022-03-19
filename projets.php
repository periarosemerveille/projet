<?php
  $page_title = 'All Projet';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_projets = find_all_projets();
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
          <span>Projets</span>
       </strong>
         <a href="add_projets.php" class="btn btn-info pull-right">Ajouter un nouveau projet</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Nom projet </th>
            <th>Nom client </th>
            <th>Cout projet</th>
            <th>Delai de payement</th>
            <th>budget previsionnel</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>montant versé</th>
            <th class="text-center" style="width: 100px;">Actions</th>
            <!--<th class="text-center" style="width: 100px;">Actions</th>-->
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_projets as $a_projet): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_projet['nom_projet']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_projet['nom_client']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_projet['cout_projet']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_projet['delai_payement']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_projet['budget_previsionnel']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_projet['d_debut']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_projet['d_fin']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_projet['montant_verse']))?></td>
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_projets.php?id=<?php echo (int)$a_projet['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_projets.php?id=<?php echo (int)$a_projet['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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
