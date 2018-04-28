<?php

require("models/Tarea.php");
//require("models/Usuario.php");
require("views/Tareas.view.php");
require("views/Tarea.view.php");
require("views/TareasAdmin.view.php");    

class TareaController {

    public function listadoTareas() {
        $user = $_SESSION["user"];        
        $tareas = Tarea::getAllUserTareas($user);        
        $estados = EstadoTarea::getAll();
        $tipos = Tarea2::getAll();

        $tareasViews = new TareasView();
        echo $tareasViews->render($tareas, $estados, $tipos);
    }
    
    public function agregarTarea($titulo, $desc, $estado_id, $tipo_id) {
        $user = $_SESSION["user"];
        Tarea::agregarTarea($titulo, $desc, $user->getId(), $estado_id, $tipo_id);        
        header('Location: ' . '/AP/mainController.php/tareas');
    }

    public function borrarTarea($tarea_id) {
        $user = $_SESSION["user"];
        Tarea::borrarTarea($user->getId(), $tarea_id);
        header('Location: ' . '/AP/mainController.php/tareas');
    }


    public function descripcionTarea($tarea_id) {
        $user = $_SESSION["user"];
        $tarea = Tarea::obtenerTarea($user->getId(), $tarea_id);      
        $estados = EstadoTarea::getAll();
        $tipos = Tarea2::getAll();

        $tareaViews = new TareaView();
        echo $tareaViews->render($tarea, $estados,$tipos);
    }

    public function modificarTarea($tarea_id, $titulo, $desc, $estado_id, $tipo_id) {
        $user = $_SESSION["user"];
        Tarea::modificarTarea($user->getId(), $tarea_id, $titulo, $desc, $estado_id, $tipo_id);
        //echo $tareaViews->render($tarea, $estados, $tipos);
        header('Location: ' . '/AP/mainController.php/tarea?id=' . $tarea_id);
    }

    public function listadoTareasAdmin() {
        $user = $_SESSION["user"];
        $tareasAdmin = Tarea::getAllUserTareas($user);
        $estados = EstadoTarea::getAll();
        $tipos = Tarea2::getAll();
        $allUsers = Usuario::getAllUsers();

        $listaTareas = array();

        for($i=0; $i<count($allUsers); $i++) {
            $userName = $allUsers[$i]->getNombre();
            $tareas = Tarea::getAllUserTareas($allUsers[$i]);
            $cantidadTareas = count($tareas);
            
            $listaTareas[$i][0] = $userName;
            
            $listaTareas[$i][1] = $cantidadTareas;
        }

        $tareasAdminViews = new TareasAdminView();
        echo $tareasAdminViews->render($tareasAdmin, $listaTareas, $estados, $tipos);
    }
}
?>