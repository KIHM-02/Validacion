<?php

    require("conexion.php");
    
    $conexion = new Conexion();

    if(isset($_POST["btnRegistrar"]))
    {
        $correo = $_POST["txtCorreo"];
        $contra = $_POST["txtPwd"];

        if(trim($correo) != '' && trim($contra) != '')
        {   
            if(strstr($correo, " ' ") || strstr($correo, " #") || strstr($correo, " = ") && strstr($contra, " ' ") || strstr($contra, " #") || strstr($contra, " = "))
            {
                echo '
                <script language="javascript">
                    alert("Usuario no valido");
                    window.location.href = "../index.html"
                </script>';    
            }
            else
            {
                $conexion->noConsulta($correo, $contra);
            }
        }
        else
        {
            echo '
            <script language="javascript">
                alert("Usuario no valido");
                window.location.href = "../index.html"
            </script>';
        }
    }
    
?>