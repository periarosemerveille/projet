<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('commande',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","commande supprimé.");
      redirect('commande.php');
  } else {
      $session->msg("d","Commande non supprimé.");
      redirect('commande.php');
  }
?>
