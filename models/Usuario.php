<?php

    // Se crea la clase usuario y usamos un extends para la clase de Conexion.
    class Usuario extends Conectar
    {
        // Aqui manejamos la validacion para el inicio de sesion
        public function login()
        {
            // Se conecta con la base de datos gracias al extends.
            $conectar = parent::Conexion();
            parent::setNames();

            if(isset($_POST["enviar"])) // Si se enviaron los datos en el login.
            {
                $documento_usu = $_POST["documento_usu"]; // Se reciben los datos.
                $pass_usu = $_POST["pass_usu"];

                if (empty($documento_usu) || empty($pass_usu)) // Se valida que no estan vacios.
                {
                    header("Location: login?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM usuario WHERE documento_usu=? AND pass_usu=? AND est=1";
                    $statement = $conectar->prepare($sql);
                    $statement->bindValue(1, $documento_usu);
                    $statement->bindValue(2, hash('sha512', $pass_usu));
                    $statement->execute();
                    $resultado = $statement->fetch();

                    // Se valida que las credenciales esten en la base de datos
                    if (is_array($resultado) and count($resultado) > 0)
                    {
                        // Se crean las variables de sesion, en este caso con ID, Nombre y Apellidos
                        $_SESSION["id_usu"] = $resultado["id_usu"];
                        $_SESSION["nombre_usu"] = $resultado["nombre_usu"];
                        $_SESSION["apellido_usu"] = $resultado["apellido_usu"];
                        $_SESSION["id_rol"] = $resultado["id_rol"];

                        header("Location: inicio"); // Se retorna a la vista del Home
                        exit();
                    }else {
                        header("Location: login?m=1");
                        exit();
                    }
                }
            }
        }


        // Selecciona los datos del usuario que se llamo por el documento para restablecer la clave
        public function seletUserReset($documento_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM usuario WHERE documento_usu=? AND est=1';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $documento_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Se envia el EMAIL con el enlace y codigo para restablecer la clave
        public function sendMail($id_usu, $nombre_usu, $apellido_usu, $correo_usu)
        {
            $destinatario = $correo_usu;
            $asunto = 'RESTABLECER CONTRASEÑA - PISCICULTURA';
            $token = random_bytes(100);
            $token_final = bin2hex($token);
            $codigo = rand(1000, 9999);

            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'INSERT INTO password_rest(id_pass, id_usu, token, codigo, fecha) VALUES (NULL, ?, ?, ?, now());';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usu);
            $sql->bindValue(2, $token_final);
            $sql->bindValue(3, $codigo);
            $sql->execute();

            $mensaje = "<html>
                            <head>
                                <title>Restablece tu Contraseña</title>
                            </head>
                            <body>
                                <h1>Proyectos Colombianos del Campo Bolivar</h1>
                                <p>Hola $nombre_usu $apellido_usu</p>
                                <div style'text-align: center; background-color: #ccc;'>
                                    <p>Restablecer clave</p>
                                    <h3>$codigo</h3>
                                    <p>Para crear tu nueva clave da <a href='http://localhost/Piscicultura/cod-reset?token=$token_final&user=$id_usu'>click aqui</a></p>
                                    <p><small>Si usted no solicito este codigo por favor omitir...</small></p>
                                </div>
                            </body>
                        </html>";

            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($destinatario, $asunto, $mensaje, $cabeceras);

            return $resultado = $sql->fetchAll();
        }

        // Se verifica que el token de la persona sea el mismo que esta en la base de datos para realizar el cambio
        public function verifyToken($id_usu, $codigo, $token)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM password_rest WHERE id_usu=? AND codigo=? AND token=?;';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usu);
            $sql->bindValue(2, $codigo);
            $sql->bindValue(3, $token);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Se ejecuta la actualizacion de la contraseña en la base de datos
        public function restPassword($id_usu, $pass_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "UPDATE usuario SET pass_usu=? WHERE id_usu=?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, hash('sha512', $pass_usu));
            $sql->bindValue(2, $id_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }




        // Aqui se realizara el registro para un nuevo usuario
        public function createUser($id_rol, $nombre_usu, $apellido_usu, $direccion_usu, $telefono_usu, $documento_usu, $correo_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $destinatario = $correo_usu;
            $asunto = 'BIENVENIDO A PROYECTOS COLOMBIANOS DEL CAMPO BOLIVAR';
            $password = hash('sha512', rand(1000, 9999));

            $sql = "INSERT INTO usuario (id_usu, id_rol, nombre_usu, apellido_usu, direccion_usu, telefono_usu, documento_usu, correo_usu, pass_usu, fecha, est) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, now(), 1);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_rol);
            $sql->bindValue(2, $nombre_usu);
            $sql->bindValue(3, $apellido_usu);
            $sql->bindValue(4, $direccion_usu);
            $sql->bindValue(5, $telefono_usu);
            $sql->bindValue(6, $documento_usu);
            $sql->bindValue(7, $correo_usu);
            $sql->bindValue(8, $password);
            $sql->execute();

            $mensaje = "<html>
                            <head>
                                <title>Se ha creado una cuenta para ti en el sistema de informacion PCCB</title>
                            </head>
                            <body>
                                <h1>Proyectos Colombianos del Campo Bolivar</h1>
                                <p>Hola $nombre_usu $apellido_usu, se ha establecido como numero de documento $documento_usu.</p>
                                <div style'text-align: center; background-color: #ccc;'>
                                    <h3>Para crear una nueva contraseña en el sistema de <a href='http://localhost/pisciculturaProject/new-user?token=$password&user=$documento_usu'>click aqui</a></h3>
                                </div>
                            </body>
                        </html>";

            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($destinatario, $asunto, $mensaje, $cabeceras);

            return $resultado = $sql->fetchAll();
        }

        // Revisaremos que el token de la persona y su documento coinciden con la BD para ejecutar el siguiente metodo
        public function verifyData($token, $documento_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = 'SELECT * FROM usuario WHERE pass_usu=? AND documento_usu=? AND est=1;';
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $token);
            $sql->bindValue(2, $documento_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Se ejecuta la actualizacion de la contraseña en la base de datos
        public function addDataUser($documento_usu, $direccion_usu, $telefono_usu, $pass_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "UPDATE usuario SET direccion_usu=?, telefono_usu=?, pass_usu=? WHERE documento_usu=?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $direccion_usu);
            $sql->bindValue(2, $telefono_usu);
            $sql->bindValue(3, hash('sha512', $pass_usu));
            $sql->bindValue(4, $documento_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }




        // Se actualizaran los datos de un usuario
        public function updateUser($id_rol, $nombre_usu, $apellido_usu, $direccion_usu, $telefono_usu, $documento_usu, $correo_usu, $id_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "UPDATE usuario SET
                    id_rol=?,
                    nombre_usu=?,
                    apellido_usu=?,
                    direccion_usu=?,
                    telefono_usu=?,
                    documento_usu=?,
                    correo_usu=?,
                    fecha_edit=now()
                    WHERE id_usu=?;";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_rol);
            $sql->bindValue(2, $nombre_usu);
            $sql->bindValue(3, $apellido_usu);
            $sql->bindValue(4, $direccion_usu);
            $sql->bindValue(5, $telefono_usu);
            $sql->bindValue(6, $documento_usu);
            $sql->bindValue(7, $correo_usu);
            $sql->bindValue(8, $id_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Se cambiara el estado de un usuario, pasara de activo a inactivo
        public function deleteUser($id_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "UPDATE usuario SET est=0, fecha_elim=now() WHERE id_usu=?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Obtendremos toda la lista de usuarios para completar la tabla (DataTable)
        public function getUser()
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM usuario WHERE (id_rol=2 OR id_rol=3) AND est=1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // En algunos momentos requeriremos los datos de un usuario especifico, estos los traemos son su ID
        public function getUser_id($id_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "SELECT * FROM usuario WHERE id_usu=?;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $id_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }




        // Actualizacion de perfil
        public function updatePerfil($direccion_usu, $telefono_usu, $pass_usu, $id_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "UPDATE usuario SET
                    direccion_usu=?,
                    telefono_usu=?,
                    pass_usu=?,
                    fecha_edit=now()
                    WHERE id_usu=?;";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $direccion_usu);
            $sql->bindValue(2, $telefono_usu);
            $sql->bindValue(3, $pass_usu);
            $sql->bindValue(4, $id_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }

        // Actualizacion con contraseña desde perfil
        public function updatePasswordPerfil($direccion_usu, $telefono_usu, $pass_usu, $id_usu)
        {
            $conectar = parent::Conexion();
            parent::setNames();

            $sql = "UPDATE usuario SET
                    direccion_usu=?,
                    telefono_usu=?,
                    pass_usu=?,
                    fecha_edit=now()
                    WHERE id_usu=?;";

            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $direccion_usu);
            $sql->bindValue(2, $telefono_usu);
            $sql->bindValue(3, hash('sha512', $pass_usu));
            $sql->bindValue(4, $id_usu);
            $sql->execute();

            return $resultado = $sql->fetchAll();
        }
    }

?>