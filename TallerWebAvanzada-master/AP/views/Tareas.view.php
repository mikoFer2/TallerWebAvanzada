<?php

class TareasView {

    public function render($paramTareas, $estados, $tipos) { ?>
        <html>
            <head>
                <title>Todo Listo! / <?php echo $_SESSION["username"];?></title>
            </head>
            <body>   
                <a href="/AP/mainController.php/logout">Cerrar Sesión</a>
                <?php
                if($_SESSION["rol"] == "1") { ?>
                    <a  href="/AP/mainController.php/admin">Vista Administrador</a>
                <?php } ?>
                <a href="/AP/mainController.php/calendario">Calendario</a>
                <h1>Todo Listo!</h1>
                <h2>Crear Tarea</h2>

                    <form method="POST" action="/AP/mainController.php/nuevaTarea">
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
                        <input type="submit" value="Crear Tarea!" />

                    </form>

                <h2>Mis tareas</h2>

                    <table>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th></th>
                        </tr>
                        <?php foreach($paramTareas as $tarea) { ?>
                        <tr>
                            <td>
                                <a href="<?php echo "/AP/mainController.php/tarea?id=" . $tarea->getId(); ?>">
                                    <?php echo $tarea->getTitulo(); ?>
                                </a>
                            </td>
                            <td><?php echo $tarea->getDescripcion(); ?></td>
                            <td>
                                <a href="<?php echo "/AP/mainController.php/borrarTarea?id=" . $tarea->getId(); ?>">
                                    Borrar
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>

            </body>
        </html>

    <?php }
}
?>