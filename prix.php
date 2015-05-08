<?php
	if( isset( $_GET['one'] ) && isset( $_GET['two'] )){
		$retour[0] = 3;
		$retour[1] = 40;
		echo json_encode( $retour );
	} else {
		echo "erreur de params";
	}
