<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('creancier',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","creance supprimé.");
      redirect('creancier.php');
  } else {
      $session->msg("d","creance non supprimé.");
      redirect('creancier.php');
  }
?>
