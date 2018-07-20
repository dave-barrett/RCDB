<?php

echo "techNET Portal :: Error<br/>";

switch ($_GET['err']) {
    case 400:
        echo "The server did not understand the syntax for the request.";
        break;
    case 401:
        echo "Server: Unauthorisde access request.";
        break;
    case 403:
        echo "The server understood the request but was unable to execute it. This could be due to an incorrect username and/or password or the server requires different input.";
        break;
    case 404:
        echo "The server cannot find a page at requested URL - " . $_SERVER['REQUEST_URI'];
        break;
    case 500:
        echo "The server encountered an unexpected condition which prevented it from fulfilling the request.";
        break;
	default:
        header ('../tnindex.php');
}

echo "<br/><a href='../indextn.php'>RETURN TO INDEX PAGE</a>";

?>