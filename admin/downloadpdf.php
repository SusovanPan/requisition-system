<?php
$file=$_GET['file'];
$filename=$_GET['file'];
header('Content-type:application.pdf');
header('Content-Disposition: inline; filename"' . $filename .'"');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
@readfile($file);
?>