<?php
    include ("./BD/conexion.php");
    session_start();



    if(!empty($_POST["btnlogin"])){
        //Se verifica si los campos estan vacíos o no
        if(empty($_POST["cedula"] && empty($_POST["password"]))){
            echo "Los cambios están vacios";
        }else{
            //Se verifica con la base de datos

            //se obtiene los datos del html
        $dni=$_POST(["cedula"]);
        $clave=$_POST(["password"]);

        $conexion=mysqli_connect("localhost","root","","tesla_prueba");
        $consulta= "SELECT * FROM `_user` WHERE user.dni = '$dni' AND user.contraseña = '$clave'";
        $resultado=mysqli_query($conexion, $consulta);
        $filas=mysqli_fetch_array($resultado);

            //se establece un limitador de intentos para un bloqueo temporal: 3 intentos
        if(isset($_COOKIE["block".$usuario])){
            $mensaje[] ="El usuario con $dni está bloqueado por 1 minuto por intentos fallidos";
        }else{

        if($filas && $filas['id_rol'] == 1 && $filas['id_estado'] == 1){ //EMPLEADOS_ADMINISTRADOR
            
            //numero de ingresos - Fecha de ingreso - Hora de ingreso en la tabla sesion, una vez actualizado se el trigger con la tabla sesion_historial
            $consulta=" UPDATE sesion SET numero_ingreso=sesion.numero_ingreso+1,fecha_sesion=CURDATE(),hora_sesion=CURTIME() WHERE user_id='$dni';";
            mysqli_query($conexion, $consulta);
            header('location:./administrador.html');
            
    
        }else if($filas && $filas['id_rol'] == 2 && $filas['id_estado'] == 1){//ALUMNOS
           
            //numero de ingresos
            $consulta2="UPDATE user SET user.NumIngresos=user.NumIngresos+1 where user.nombre='$usuario' AND user.password='$contraseña'";
            mysqli_query($conexion, $consulta2);
            //Fecha de ingreso
            $consulta3="UPDATE user set Fec_Ultimo_Acceso=CURDATE() where user.nombre='$usuario' AND user.password='$contraseña'";
            mysqli_query($conexion, $consulta3);
            //Hora de ingreso
            $consulta4="UPDATE user set Hora_Ultimo_Acceso=CURTIME() where user.nombre='$usuario' AND user.password='$contraseña'";
            mysqli_query($conexion, $consulta4);

            header('Location:./upd_perfil.php');
        }else{

        //BLOQUEO DE USUARIO   

            if(isset($_COOKIE["$usuario"])){
                $cont=$_COOKIE["$usuario"];
                $cont++;
                setcookie($usuario,$cont,time()+30);
                if($cont>3){
                    setcookie("block".$usuario,$cont,time()+30);
                }
            }else{
                setcookie($usuario,1,time()+120);
                //$mensaje[] = 'Usuario o Contraseña Incorrecto!';
            }
            
            
        }
    
    }


        }
    }

?>