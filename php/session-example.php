<?php
session_start();
$old_sessionid = session_id();
session_regenerate_id();
$new_sessionid = session_id();
$_SESSION['destroyed'] = time();
echo "Old SessionID: $old_sessionid<br />";
echo "New SessionID: $new_sessionid<br />";
echo"<pre>";
print_r($_SESSION);
echo"</pre>";
?>