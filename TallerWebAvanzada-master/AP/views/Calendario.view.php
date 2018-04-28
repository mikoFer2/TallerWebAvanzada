
<?php

class CalendarioView {

    public function render($paramTareas) { ?>
    <!DOCTYPE html>
       <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=10">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

            <title>Calendario</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

            <script src="js/jquery.min.js"></script>
            <script src="js/moment.min.js"></script>

           
            <link rel="stylesheet" href="css/fullcalendar.min.css">
            <script src="js/fullcalendar.min.js"></script>
            <script src="js/es.js"></script>

            <!-- BOOTSTRAP -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        </head>


        <body>
            <a href="/AP/mainController.php/logout">Cerrar Sesión</a>


            <style>

                body {
                    margin: 50px 50px;
                    padding: 0;
                    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                    font-size: 12px;
                }

                #calendar {
                max-width: 1000px;
                margin: 0 auto;
                }
            </style>

            <div class="container">
                <div class="row">
                    <div class="col"></div>
                    <div class="col-7"><div id="CalendarioWeb"></div></div>
                    <div class="col"></div>
                </div>
            </div>


            <script> 
                $(document).ready(function(){
                    $('#CalendarioWeb').fullCalendar({
                        header: {
                            left: 'today, prev, next',
                            center: 'title',
                            right: 'month, basicWeek, basicDay'
                        },
                        
                        dayClick: function(date, jsEvent, view){
                            alert("Haz seleccionado: " +date.format());
                        },

                        events: 'C:/xampp/htdocs/AP/models' 
                        ,
                        eventClick: function(calEvent, jsEvent, view){
                            $('#tituloEvento').html(calEvent.title);
                            $('#descripcionEvento').html(calEvent.descripcion);
                        }
                    });
                });

            </script>
    

        </body>


    </html>

    <?php }
}
?>