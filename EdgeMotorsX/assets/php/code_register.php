<?php
//INCLUIR ARCHIVO DE CONEXION A LA BASE DE DATOS 
require_once "conexion.php";

//DEFINIR VARIABLE E INICIALIZAR CON VALORES VACIOS 

$username = $email = $password = "";
$username_err = $email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //VALIDANDO INPUT DE NOMBRE DE USUARIO
if(empty (trim($_POST["username"]))) {
$username_err = "Por favor, ingrese un nombre de usuario";

    }else{

        //PREPARA UNA DECLARACION DE LA SELECCION
        $sql = "SELECT id FROM usuarios WHERE usuario =  ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt,"s", $param_username);

            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1 ){
                    $username_err = "Este nombre de usuario ya esta en uso";
                }else{
                    $username = trim($_POST ["username"]);
                } 
            }else{
                echo "Ups! Algo salio mal, intentalo mas atarde";
            }

        }

    }

    //VALIDANDO INPUT DE EMAIL 
if(empty (trim($_POST["email"]))) {
    $email_err = "Por favor, ingrese un correo";
    
        }else{
    
            //PREPARA UNA DECLARACION DE LA SELECCION
            $sql = "SELECT id FROM usuarios WHERE email =  ?";
    
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt,"s", $param_email);
    
                $param_email = trim($_POST["email"]);
    
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
    
                    if(mysqli_stmt_num_rows($stmt) == 1 ){
                        $email_err = "Este correo ya esta en uso";
                    }else{
                        $email = trim($_POST ["email"]);
                    } 
                }else{
                    echo "Ups! Algo salio mal, intentalo mas atarde";
                }
    
            }
    
        }

        //VALIDANDO CLAVE

        if(empty(trim($_POST["password"]))){
            $password_err = "Por favor, ingrese una contraseña";
            
        }elseif(strlen(trim($_POST["password"]))  <4){
            $password_err = "La clave debe de tener al menos 4 caracteres";

        }else{
            $password = trim($_POST["password"]);
        }

        // COMPROBANDO LOS ERRORES DE ENTRADA ANTES DE INSERTAR LOS DATOS EN LA DB

        if(empty($username_err) && empty($email_err) && empty($password_err)){

            $sql = "INSERT INTO usuarios (usuario, email, clave) VALUES (?, ?, ?)";

            if($stmt = mysqli_prepare($link,$sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

                //Estableciendo parametro 
                
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); //ENCRIPTANDO CLAVE

            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            }else{
                echo "Algo salio mal, Intentalo despues";

                }
            }

        }
        mysqli_close($link);
}

?>