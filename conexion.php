<?php 

  //Opciones de la conexión
  $opciones = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false);
    try{
        $conexionPDO = new PDO('mysql:host=localhost;dbname=yt_colores','root','',$opciones);
    } catch(PDOException $e){
        echo "ERROR: " . $e->getMessage();
      }

function traerDatos(){
    
    global $conexionPDO;
    $db = $conexionPDO;
    $consulta = "select * from articulos LIMIT 10";
    $mysql = $db->prepare($consulta);
    $mysql->execute(array());
    $resultado = $mysql->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $resultado;
}


?>
