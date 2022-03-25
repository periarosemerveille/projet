<?php
  $page_title = 'All commande';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $commandes = join_commande_table();
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
          <span>Commandes</span>
       </strong>
         <a href="add_creancier.php" class="btn btn-info pull-right">Ajouter une nouvelle commande</a>
      </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> facture</th>
                <th> nom projet </th>
                <th class="text-center" style="width: 10%;"> nom client </th>
                <th class="text-center" style="width: 10%;"> motif</th>
                <th class="text-center" style="width: 10%;"> prix </th>
                <th class="text-center" style="width: 10%;"> date </th>
                <th class="text-center" style="width: 100px;"> Actions </th>
              </tr>
            </thead>
            
            <tbody>
              <?php foreach ($commandes as $commande):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td>
                  <?php if($commande['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.png" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $commande['media_id']; ?>" alt="">
                <?php endif; ?>
                </td>
                <td> <?php echo remove_junk($commande['nom_projet']); ?></td>
                <td class="text-center"> <?php echo remove_junk($commande['nom_client']); ?></td>
                <td class="text-center"> <?php echo remove_junk($commande['motif']); ?></td>
                <td class="text-center"> <?php echo remove_junk($commande['prix']); ?></td>
                <td class="text-center"> <?php echo read_date($commande['date']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_commande.php?id=<?php echo (int)$commande['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_commande.php?id=<?php echo (int)$commande['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
