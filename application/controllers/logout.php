<?php
session_start();
if(!empty($_SESSION['login_user']))
{
$_SESSION['login_user']='';
session_destroy();
}
?>
<script>
     window.location.href = '' + base_url + '';
</script>
<?php

?>