<?php

    class Conexion
    { 

        public $server = 'localhost';
        public $bd = 'a18300722';
        public $usuario = 'root';
        public $pwd = "";

        public function consulta($correo, $contra)
        {
            $conn = mysqli_connect($this->server, $this->usuario, $this->pwd, $this->bd);

            if(!$conn)
            {
                die("Hubo un error en la conexion: ".mysqli_connect_error());
            }
            else
            {
                echo "----Se ha realizado la conexion a la base de datos-----\n";
                
            }

            $consulta = "SELECT * FROM login WHERE correo = '$correo' and contrasenia = '$contra';";
            $resultado = mysqli_query($conn, $consulta);

            if($filas = mysqli_fetch_row($resultado) > 0)
            {
                echo "<br>";
                echo "\n...Operacion realizada con exito!..."."<br>"."----Bienvenido al sistema $correo----";
                mysqli_close($conn);
            }
            else
            {
                echo "<br>";
                echo "!!!!!Ocurrio un error en la consulta!!!!!!!";
                mysqli_close($conn);   
            }
        }

        public function noConsulta($correo, $contrasenia)
        {

            $conn = mysqli_connect($this->server, $this->usuario, $this->pwd, $this->bd);

            if(!$conn)
            {
                die("Hubo un error en la conexion: ".mysqli_connect_error());
            }
            else
            {
                echo "----Se ha realizado la conexion a la base de datos-----\n";
                
            }

            $noConsulta = "INSERT INTO login (correo, contrasenia) VALUES ('$correo', '$contrasenia');";
            $resultado = mysqli_query($conn, $noConsulta);

            if(!$resultado)
            {
                echo "<br>";
                echo "!!!!!Ocurrio un error en la consulta!!!!!!!\n";
            }
            else
            {
                echo "<br>";
                echo "\n...Operacion realizada con exito!.."."<br>"."Se ha registrado con exito su correo $correo";
            }

        }
    }

?>