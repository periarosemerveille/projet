<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);

?>
<?php
 $c_clients   = count_by_id('clients');
 $c_projets   = count_by_id('projets');
 $c_commande         = count_by_id('commande');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5')
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  
	
<a href="clients.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-th-large"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_clients['total']; ?> </h2>
          <p class="text-muted">Clients</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="projets.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue2">
          <i class="glyphicon glyphicon-shopping-cart"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_projets['total']; ?> </h2>
          <p class="text-muted">Projets</p>
        </div>
       </div>
    </div>
	</a>

	<a href="commande.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-usd"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_commande['total']; ?></h2>
          <p class="text-muted">Commandes</p>
        </div>
       </div>
    </div>
	</a>
</div>

<div class="bienvenu">
 <p> Bienvenue à GESPRO</p> 
</div>

<div class="navigue">
<p>Naviguez pour découvrir les pages auxquelles vous pouvez accéder !</p>
</div>

 </div>
</div>
 </div>
  <div class="row">

  </div>



<?php include_once('layouts/footer.php'); ?>
