<?php

//INICIALIZAR LA SESION



if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login.php");
    exit;

}


 require_once "conexion.php";

 $email = $password = "";
 $email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(empty(trim($_POST["email"]))){
        $email_err = "Por favooor, ingrese un correo electronico";
    }else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Por favooor, ingrese una contraseña";
    }else{
        $password = trim($_POST["password"]);
    }



    //VALIDAR CREDENCIALES 

    if(empty($email_err)  && empty($password_err)){

        $sql = "SELECT id, usuario, email, clave FROM usuarios WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s",  $param_email);

        $param_email = $email;

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);

            }

            if(mysqli_stmt_num_rows($stmt) == 1 ){
                mysqli_stmt_bind_result($stmt, $id,$usuario,$email,$hashed_password);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password,$hashed_password)){
                        session_start();

                        //ALMACENAR DATOS EN VARIABLES DE SESION

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;

                        header("location: panel_control.php");
                    }else {
                        $password_err = "La contrasena que has introducido no es valida";
                    }

                }
            }else{
                    $email_err = "No se ha encontrado ninguna cuenta con ese correo";
                }

            }else{

                    echo "Algo salio mal, intentelo mas tarde";
                }
    }
     
mysqli_close($link);
}

?>