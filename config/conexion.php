<?php session_start();

    class Conectar // Creamos la clase Conectar.
    {
        protected $dbh; // Significa Database Host.

        protected function Conexion() // Creamos el metodo de conexion dentro de la clase Conectar.
        {
            $database = "si_piscicultura";
            $username = "root";
            $password = "";

            try
            {
                // Esta dentro de un Try por si hay algun error, esta es la cadena de conexion.
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=$database", "$username", "$password");

                // Hosting
                //$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=qvwjuxcx_piscicultura", "qvwjuxcx_piscicultura", "kJ#[OcoD=Sxq");
                return $conectar;
            } catch (Exception $e) {
                // En caso de algun error lo mostrara en pantalla.
                print 'Error BD! ' . $e->getMessage() . '<br/>';
                die();
            }
        }

        // Creamos esta funcion para no tener problemas con ñ o tildes.
        protected function setNames()
        {
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        // Validamos la ruta donde tenemos guardado nuestro proyecto
        public static function ruta()
        {
            return "http://localhost/PisciculturaProject";
        }
    }

?>