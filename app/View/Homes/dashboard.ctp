<?php
	$dine_table = @explode(",", $tables['Admin']['table_size']);
    $dine_table_order = @$tables['Admin']['table_order']?@json_decode($tables['Admin']['table_order'], true):array();

    echo $tables['Admin']['no_of_tables'];
 
	echo " ;";
 
	for($i = 1; $i <= $tables['Admin']['no_of_tables']; $i++) {

		echo @$dine_table_order[$i-1];

	}

	for($i = 1; $i <= $tables['Admin']['no_of_tables']; $i++) {
		//echo $i;
		//echo " ";
		echo @$dinein_tables_status[$i];
		echo " ";
	}

	echo "/";

	for($i = 1; $i <= $tables['Admin']['no_of_tables']; $i++) {
		//echo $i;
		echo '$' . @round($orders_total[$orders_no[$i]['D']], 2);
		echo " ";
	}

	echo "/";

	for($i = 1; $i <= $tables['Admin']['no_of_tables']; $i++) {
		//echo $i;
		//echo " ";
		echo @$orders_time[$i]['D']?date("H:i", strtotime(@$orders_time[$i]['D'])):"";
		echo " ";
	}


	//echo '{"no_of_tables":"' + $tables['Admin']['no_of_tables'] + '", ';

?>