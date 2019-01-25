<?php

function generarCodigo($longitud)
{
    $key     = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max     = strlen($pattern) - 1;
    for ($i = 0; $i < $longitud; $i++)
        $key .= $pattern{mt_rand(0, $max)};
    return $key;
}


function registerToCourse($name_first, $name_last, $email, $course)
{
    $usuario     = "root";
    $contrasena  = "root";
    $servidor    = "localhost";
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
        $code = "C01" . generarCodigo(6);
        
        $registerStudentCoruse = "INSERT INTO REGISTERS_COURSE (name_first, name_last, email, status, code, course) 
        VALUES (
                '$name_first', 
                '$name_last', 
                '$email', 
                '1', 
                '$code', 
                '$course')";
        
        $register = mysqli_query($conexion, $registerStudentCoruse) or die("Algo ha ido mal en la consulta a la base de datos consulta email");
        
        sendEmail($email, $name_first);
        
        return true;
    }
}

function registerAssitence($code)
{
    
    $usuario     = "root";
    $contrasena  = "root";
    $servidor    = "localhost";
    $basededatos = "logincloud";
    $conexion = mysqli_connect($servidor, $usuario, $contrasena) or die("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
    
    $consultaCode = "SELECT * FROM `REGISTERS_COURSE` WHERE `code` = '" . $code . "'";
    $resultadoConsultaCode = mysqli_query($conexion, $consultaCode) or die("Algo ha ido mal en la consulta a la base de datos consulta email");
    
    while ($columnaConsultaCode = mysqli_fetch_array($resultadoConsultaCode)) {
        $statusCode = $columnaConsultaCode[code];
    }
    
    if ($statusCode) {
        $updateStatusAssitence = "UPDATE `REGISTERS_COURSE` SET `assistence` = '2' WHERE `code` = '$code'";
        $resultadoUpdate = mysqli_query($conexion, $updateStatusAssitence) or die("Algo ha ido mal en la consulta a la base de datos consulta email");
        
        if ($resultadoUpdate) {
            echo "se actualizo exitosamente";
        } else {
            echo "no se actualizo";
        }
    } else {
        echo "Este codigo no existe.";
    }
}
function changeStatus($id, $status)
{
    
    $usuario     = "root";
    $contrasena  = "root";
    $servidor    = "localhost";
    $basededatos = "logincloud";
    $conexion = mysqli_connect($servidor, $usuario, $contrasena) or die("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
    
    $ChangeStatus = "SELECT * FROM `REGISTERS_COURSE` WHERE `id` = '" . $id . "'";
    $resultadoChangeStatus = mysqli_query($conexion, $ChangeStatus) or die("Algo ha ido mal en la consulta a la base de datos consulta email");
    
    while ($columnaChangeStatus = mysqli_fetch_array($resultadoChangeStatus)) {
        $statusConsulta = $columnaChangeStatus[id];
    }
    
    if ($statusConsulta) {
        $updateStatus = "UPDATE `REGISTERS_COURSE` SET `status` = '$status' WHERE `id` = '$id'";
        echo $updateStatus;

        $resultadoUpdate = mysqli_query($conexion, $updateStatus) or die("Algo ha ido mal en la consulta a la base de datos consulta email");
        
        if ($resultadoUpdate) {
            echo "200";
        } else {
            echo "500";
        }
    } else {
        echo "Este codigo no existe.";
    }
}

function selectContacts()
{
    $usuario     = "root";
    $contrasena  = "root";
    $servidor    = "localhost";
    $basededatos = "logincloud";
    $conexion = mysqli_connect($servidor, $usuario, $contrasena) or die("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
    
    $consultaRegisters = "SELECT * FROM `REGISTERS_COURSE`";
    $resultadoConsultaRegisters = mysqli_query($conexion, $consultaRegisters) or die("Algo ha ido mal en la consulta a la base de datos consulta email");
    

    echo "<table>
            <tr>
                <th>Nombre</th>
                <th>email</th>
                <th>Status</th>
                <th>Cambiar Status</th>
            </tr>";
    // output data of each row
    while($row = $resultadoConsultaRegisters->fetch_assoc()) {
        if($row["status"] == 1){
            $bg = "red";
            $changeStatus = 0;
        }
        else{
            $bg = "green";
            $changeStatus = 1;
        }

        echo "<tr>
                <td>" . $row["name_first"]. "</td>
                <td>" . $row["email"]. "</td>
                <td id='ST".$row["id"]."' style='background-color:" . $bg . "'>" . $row["status"]. "</td>
                <td><button onclick='changeStatus(".$row["id"].",".$changeStatus.")'>Cambiar</button></td>
            </tr>";
    }
    echo "</table>";
}

function sendEmail($email, $name_first)
{
    // Envio de email
    require 'phpmailer/PHPMailerAutoload.php';
    require 'phpmailer/class.phpmailer.php';
    require 'phpmailer/class.smtp.php';
    
    $template1 = file_get_contents('mail.html');
    $template1 = str_replace('%nombre%', $name_first, $template1);
    $template1 = str_replace('%email%', $email, $template1);
    $template1 = str_replace('%tipo%', $code, $template1);
    $template1 = str_replace('%problema%', $course, $template1);
    
    $mail1 = new PHPMailer;
    $mail1->isSMTP();
    $mail1->Host     = 'smtp.gmail.com'; // <---- Servidor proveedor del servicio de emails
    $mail1->SMTPAuth = true;
    
    $mail1->Username   = 'xxxxxxxx@gmail.com'; // <---- Email del cliente
    $mail1->Password   = 'xxxxxx'; // <---- Contraseña del email del cliente
    $mail1->Port       = 587; // <---- Puerto del servidor del servicio de emails
    $mail1->SMTPSecure = 'tls'; // <---- Tipo de seguridad
    $mail1->From       = 'xxxxxxxx@gmail.com'; // <---- Email del cliente
    $mail1->FromName   = 'Login - Cloud'; // <---- Cambiar el nombre del cliente
    $mail1->addAddress($email);
    $mail1->isHTML(true);
    $mail1->CharSet = 'UTF-8';
    $mail1->Subject = 'Confirmación de registro';
    $mail1->Body    = $template1;
    
    
    if (!$mail1->Send()) {
        echo "500";
    } else {
        echo "200";
    }
}

?>