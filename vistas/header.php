<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    
    <title>Accidentao' - Proyecto 1ª Evaluación</title>
</head>
<body>
    <div class="header" id="header" align="center">
        <img src="imgs/logo.png" alt="Logo de Accidentao" width="300px" height="100px" class="img_logo">       
<?php
    if (isset($_SESSION['id_user'])) {
        echo '<table id="button">
               <tr>
                <td>Inicio</td>
                <td>Sobre nosotros</td>
                <td>Servicios</td>
                <td>Productos</td>
                <td>contacto</td>
               </tr>
              </table>';
    }
?>                 
        
    </div>
</body>