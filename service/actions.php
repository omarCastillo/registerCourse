<?php

require("queries.php");

$action = $_POST["action"];

switch ($action){
    case 1:
        $name_first = $_POST["name_first"];
        $name_last = $_POST["name_last"];
        $email = $_POST["email"];
        $course = $_POST["course"];

        registerToCourse($name_first, $name_last, $email, $course);
        break;
    case 2:
        $code = $_POST["code"];
        
        registerAssitence($code);
        break;
    case 3:
        
        selectContacts($code);
        break;
    case 4:
        $id = $_POST["id"];
        $status = $_POST["status"];
        changeStatus($id, $status);
        break;
}

?>