<?php
    $alert='';
   
    if(!empty($_POST)){
        if(empty($_POST['nickname']) || empty($_POST['password'])){
            echo '<script type="text/javascript">
                alert("Debe ingresar Usuario y/o Contraseña");
                window.location.href="index.php";
                </script>';
        }else{

            $host='localhost';
            $user='eliezer1998';
            $password='abc123';
            $db='test';

            $conection= @mysqli_connect($host, $user, $password, $db);
    
            if(!$conection){
                die("No hay conexion: ".mysqli_connect_error());
            }
            session_start();
            $user=$_POST['nickname'];
            $password=$_POST['password'];

            $query= mysqli_query($conection, "SELECT * FROM test.user where nickname='".$user."' AND password='".$password."'");
            $result= mysqli_num_rows($query);

            if($result>0){
                $_SESSION['username']=$user;
                header("location: bear.php");
            }else{
                echo '<script type="text/javascript">
                alert("No se encontro Usuario, verifique que tenga correctamento los datos, o que este registrado en la base de datos");
                window.location.href="index.php";
                </script>';
            }
        }
    }
?>