<?php 
// this includes the session _start() to resume the session on this page. it identifies the session that needs to be destroyed.

include_once 'includes/session.php'
?>
<?php 
//session_destroy() destroys the session. then the header function is called redirects to the home page.
session_destroy();
header('Location: index.php');
?>