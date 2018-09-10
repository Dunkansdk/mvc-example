<?php

    // Puedo capturar las excepciones, hace falta la redireccion al view/page/404.php
    set_exception_handler(function($exception) {

        // Filtrarlos y enviar un reporte?

        redirect('Error');

    });

?>
