<?php

    class Email
    {
        public function createUser($nombre_usu, $documento_usu, $correo_usu, $pass_usu)
        {
            $destinatario = $correo_usu;
            $asunto = "Usuario Registrado - A'ttia";

            $mensaje = file_get_contents('../public/mails/CreateUser.html');
            $mensaje = str_replace('lblNom', $nombre_usu, $mensaje);
            $mensaje = str_replace('lblDocumento', $documento_usu, $mensaje);

            $url = "http://localhost/PisciculturaProject/new-user?token=$pass_usu&user=$documento_usu";

            $mensaje = str_replace('lblUrl', $url, $mensaje);

            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($destinatario, $asunto, $mensaje, $cabeceras);
        }
    }

?>