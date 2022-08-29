<?php

if(str_contains($_SERVER['REQUEST_URI'], 'demo')) 
{ echo 'Dashboard'; } 
else if(str_contains($_SERVER['REQUEST_URI'], 'first')) 
{ echo 'Scenario First'; }
else if(str_contains($_SERVER['REQUEST_URI'], 'second')) 
{ echo 'Scenario Second'; }
else if(str_contains($_SERVER['REQUEST_URI'], 'third')) 
{ echo 'Scenario Third'; }
else if(str_contains($_SERVER['REQUEST_URI'], 'fourth')) 
{ echo 'Scenario Fourth'; }
?>
