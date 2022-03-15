<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
  $delete_id = delete_by_id('projets',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","projet supprimé.");
      redirect('projets.php');
  } else {
      $session->msg("d","projet non supprimé.");
      redirect('projets.php');
  }
?>
