<?php
ini_set('session.save_path', '/home/storage/0/2a/3a/mcq2/public_html/sessions');
session_start();
$_SESSION['test'] = 'Session test';
echo 'Session test saved';
?>
