<?php
    include ("../BD/conexion.php");
    session_start();
    $bloqueo_tiempo=60;

            

    if(!empty($_POST["btnlogin"])){
        
        //Se verifica si los campos estan vacíos o no
        if(empty($_POST['cedula']) && empty($_POST['password'])){
            echo "Los campos están vacíos están vacios";
        }else{
            //se establece un limitador de intentos para un bloqueo temporal: 3 intentos

            //se obtiene los datos del html
        $dni=$_POST['cedula'];
        $clave=$_POST['password'];

        $conexion=mysqli_connect("localhost","root","","tesla_prueba");
        $consulta1= "SELECT * FROM _user WHERE _user.dni_user ='$dni' AND contraseña ='$clave'";
        $resultado=mysqli_query($conexion, $consulta1);
        $filas=mysqli_fetch_array($resultado);

        if(isset($_COOKIE["block".$dni])){
            $mensaje[] ="El usuario con $dni está bloqueado por 1 minuto por intentos fallidos";
        }else{

                 //Se verifica con la base de datos
        if($filas && $filas['id_rol'] == 3 && $filas['id_estado'] == 1){ //EMPLEADOS_ADMINISTRADOR
            
            //numero de ingresos - Fecha de ingreso - Hora de ingreso en la tabla sesion, una vez actualizado se el trigger con la tabla sesion_historial
            $consulta=" UPDATE sesion SET numero_ingreso=sesion.numero_ingreso+1,fecha_sesion=CURDATE(),hora_sesion=CURTIME() WHERE user_id='$dni';";
            mysqli_query($conexion, $consulta);
            header('location: ../administrador.html');
            
    
        }else if($filas && $filas['id_rol'] == 2 && $filas['id_estado'] == 1){//ALUMNOS
           
            //numero de ingresos - Fecha de ingreso - Hora de ingreso en la tabla sesion, una vez actualizado se el trigger con la tabla sesion_historial
            $consulta3=" UPDATE sesion SET numero_ingreso=sesion.numero_ingreso+1,fecha_sesion=CURDATE(),hora_sesion=CURTIME() WHERE user_id='$dni';";
            mysqli_query($conexion, $consulta3);

            header('Location:./Alumno.html');
        }else{

        //BLOQUEO DE USUARIO   

            if(isset($_COOKIE["$dni"])){
                $cont=$_COOKIE["$dni"];
                $cont++;
                setcookie($dni,$cont,time()+30);
                if($cont>3){
                    setcookie("block".$dni,$cont,time()+30);
                }
            }else{
                setcookie($dni,1,time()+120);
                //$mensaje[] = 'Usuario o Contraseña Incorrecto!';
            }
            
            
        }
    
    }


        }
    }

?>