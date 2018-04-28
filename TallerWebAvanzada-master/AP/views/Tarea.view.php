<?php

class TareaView {

    public function render($tarea, $estados, $tipos) { ?>
        <html>
            <head>
                <title>Todo Listo! / <?php echo $_SESSION["username"];?></title>
            </head>
            <body>   
                <a href="/AP/mainController.php/logout">Cerrar Sesión</a>         
                <h1><?php echo $tarea->getTitulo(); ?></h1>
                <p><b>Descripcion:</b> <?php echo $tarea->getDescripcion(); ?></p>
                <p><b>Estado: </b> <?php echo $tarea->getNameEstado(); ?></p>
                <p><b>Usuario: </b> <?php echo $tarea->getUserName(); ?></p>
                <p><b>Tipo: </b> <?php echo $tarea->getTipoName(); ?></p>

                <hr>

                <p> Editar Tarea </p>
                <form method="POST" action="<?php echo "/AP/mainController.php/modificarTarea?id=" . $tarea->getId(); ?>">
                        <input type="text" name="titulo" placeholder="Titulo" />
                        <input type="text" name="descripcion" placeholder="Descripcion" />                        
                        <select name="estado_id">
                            <option selected disabled>Estado Tarea</option>
                            <?php foreach($estados as $estado) { ?>
                                <option value="<?php echo $estado->getId(); ?>"><?php echo $estado->getNombre(); ?></option>
                            <?php } ?>
                        </select>
                        
                        <select name="tipo_id">
                            <option selected disabled>Tipo Tarea</option>
                            <?php foreach($tipos as $tipo) { ?>
                                <option value="<?php echo $tipo->getId(); ?>"><?php echo $tipo->getNombre(); ?></option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="Editar Tarea!" />

                    </form>
            </body>
        </html>

    <?php }
}
?>