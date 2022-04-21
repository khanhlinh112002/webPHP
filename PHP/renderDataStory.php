<?php

    include_once("./connect.php");

    paginate::renderData(paginate::getData($GLOBALS['DB_con']), $_REQUEST['head'], $_REQUEST['tail']);

?>