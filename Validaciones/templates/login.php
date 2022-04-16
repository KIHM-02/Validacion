<?php
    require("conexion.php");
    
    $conexion = new Conexion();

    if(isset($_POST["btnIngresar"]))
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
                $conexion->consulta($correo, $contra);  
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