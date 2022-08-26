<?php
$dest = 'C: wamp64 www project upload uploaded_files';
$oo = '\\';
$pattern = "/ /";
$dest = preg_split($pattern, $dest);
print_r($dest);
echo $oo;
$dest1 = implode("\\",$dest);
echo $dest1;
?>