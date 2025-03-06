<?php

    $server = 'localhost:3307'; //Deben ingresar su puerto de Mysql de ustedes
    $username = 'root';
    $password = '';
    $database ='agencia'; //Ingresen su base de datos, que crearon en el phpMyAdmin

    try{
        $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        //echo"conexion exitosa";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //$nombre1 = $_POST["nombre"];
            //$pwd1 = $_POST["pwd"];
            $origen1 = $_POST['origen1'];
            $destino1 = $_POST['destino1'];
            $fecha1 = $_POST['fecha1'];
            $plazasDisponibles1 = $_POST['plazas_disponibles1'];
            $precio1 = $_POST['precio1'];
        
            // Preparar la consulta SQL para insertar los datos en la tabla
            //$sql = "INSERT INTO vuelos (name, password) VALUES (:nombre, :pwd)";
            $sql = "INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) VALUES (:origen1, :destino1, :fecha1, :plazas_disponibles1, :precio1)";

            // Preparar la sentencia
            $stmt = $con->prepare($sql);
            
            // Asignar valores a los parámetros
            //$stmt->bindParam(':nombre', $nombre1);
            //$stmt->bindParam(':pwd', $pwd1);
            $stmt->bindParam(':origen1', $origen1);
            $stmt->bindParam(':destino1', $destino1);
            $stmt->bindParam(':fecha1', $fecha1);
            $stmt->bindParam(':plazas_disponibles1', $plazasDisponibles1);
            $stmt->bindParam(':precio1', $precio1);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Datos almacenados correctamente en la base de datos.";
            } else {
                echo "Error al almacenar los datos en la base de datos.";
            }
        }

    }catch(PDOException $e){
        die('conexion de error:' . $e->getMessage());
    }

?>