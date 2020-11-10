<?php
//logout page
@session_start();
@session_destroy();
?>
/*<script>
    window.history.back();
</script> */

<title>Logged Out</title>
<h2 align="center">You have successfully Logged out now</h2>
<h4 align="center"><a href="index.php">Home</a></h4>
