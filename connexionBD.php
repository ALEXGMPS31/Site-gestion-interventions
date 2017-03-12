<?php

 // CONNEXION EN LOCAL
 
 $bd = new PDO('mysql:host=localhost;dbname=commentry3_my', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // ?a a l'air good !!
 $bd -> exec("set character set utf8");

 
 // TODO: CONNEXION AVEC LA BD: @IP_SERVEUR_NOMBD
 
 // $bd = new PDO('mysql:host=localhost;dbname=m2l_basket1', 'm2l_basket1', 'm2l_basket1', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); commentry3_my !!! commentry
 ?>
 
 
