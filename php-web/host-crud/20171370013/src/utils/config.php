<?php
	define('SECRET_KEY', getenv('SECRET_KEY'));


	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/index.php":
			$CURRENT_PAGE = "Home"; 
			$PAGE_TITLE = "Home Page";
			break;
        case "/create.php":
            $CURRENT_PAGE = "Create"; 
            $PAGE_TITLE = "Create Item";
            break;
        case "/login.php":
            $CURRENT_PAGE = "Login"; 
            $PAGE_TITLE = "Login Page";
            break;
		default:
			$CURRENT_PAGE = "not_found";
			$PAGE_TITLE = "Not Found";
	}

?>