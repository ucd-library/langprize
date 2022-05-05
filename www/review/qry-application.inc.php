<?php

require_once('/var/www/include/db-langprize.inc.php');

$sql = "SELECT * FROM applications WHERE passcode='".$passcode."'";

include('/var/www/include/base-query.inc.php');


if(isset($qry_application['project_category']) and $qry_application['project_category']=='sci')
	{$qry_application['project_category']='Science, Engineering, &amp; Math'; }
elseif(isset($qry_application['project_category']) and $qry_application['project_category']=='ahs')
	{$qry_application['project_category']='Arts, Humainties, &amp; Social Sciences'; }

?>
