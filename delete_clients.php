<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('clients',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Client supprimé.");
      redirect('clients.php');
  } else {
      $session->msg("d","Clien non supprimé.");
      redirect('clients.php');
  }
?>
