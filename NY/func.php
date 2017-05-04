<? 
function redirect($url, $wait){ // lager en redirect function
		header("Refresh: $wait; url=$url");
	}

function db_connect() {
	static $connection;
		
		if(!isset($connection)) {
        		$connection = mysqli_connect('norsa.no.mysql','norsa_no_vulkan','vulkan123','norsa_no_vulkan');
    	}

    		if($connection === false) {
        	return mysqli_connect_error(); 
    	}
    		return $connection;
	
	} // slutt på database connect

function db_query($query) { // gjør det mulig å bruke db_query for å hente spørringer fra databasen
	$connection = db_connect();
   	$result 	= mysqli_query($connection,$query);
		
		return $result;
		
	}