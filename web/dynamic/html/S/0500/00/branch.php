<?php

$index = file(__DIR__. "/menu.html")[0]; //ver*のmenu.html内の最初の行のファイルを取得
header("Location: ". $index);

?>