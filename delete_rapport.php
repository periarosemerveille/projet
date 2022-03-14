<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('rapport',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Client supprimé.");
      redirect('rapport.php');
  } else {
      $session->msg("d","Client non supprimé.");
      redirect('rapport.php');
  }
?>
