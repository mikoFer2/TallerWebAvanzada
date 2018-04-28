<?php

//require("models/Tarea.php");
require("views/Calendario.view.php");



class CalendarioController {

    public function mostrarCalendario() {
        $user = $_SESSION["user"];        
        $tareas = Tarea::getAllUserTareas($user);

        //$CalendarioViews = new CalendarioView();
        //echo $CalendarioViews->render($tareas);

        header('Location: ' . '/AP/Calendario.html');
    }
}
?>