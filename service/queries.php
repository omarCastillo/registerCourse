<?php
function registerToCourse($name_first, $name_last, $email, $course){
    $usuario = "root";
    $contrasena = "root";
    $servidor = "localhost";
    $basededatos = "logincloud";
    $conexion = mysqli_connect($servidor, $usuario, $contrasena) or die("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
    
    $consultaEmail = "SELECT * FROM `REGISTERS_COURSE` WHERE `email` = '" . $email . "'";
    $resultadoConsultaEmail = mysqli_query($conexion, $consultaEmail) or die("Algo ha ido mal en la consulta a la base de datos consulta email");

    while ($columnaConsultaEmail = mysqli_fetch_array($resultadoConsultaEmail)) {
        $statusEmail = $columnaConsultaEmail[email];
    }

    if ($statusEmail == $email) {
        $error_message = "Este correo ya esta registrado.";
        echo $error_message;
    } else {
        $registerStudentCoruse = "INSERT INTO REGISTERS_COURSE (name_first, name_last, email, status, course) 
        VALUES (
                '$name_first', 
                '$name_last', 
                '$email', 
                '1', 
                '$course')";
        $register = mysqli_query($conexion, $registerStudentCoruse) or die("Algo ha ido mal en la consulta a la base de datos consulta email");
        return true;
    }
}







?>