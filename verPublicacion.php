<?php if (isset($publicacion)) : ?>

    <div id="vista">
        <div>
            <?php
            echo $publicacion->nombre;
            if ($publicacion->usuario == "usuarioPago") :
            ?>
                <img src="style/estrella.png" alt="Estrella">

            <?php endif; ?>

            <div id="fecha">

                <?php

                echo $publicacion->fecha->format("Y-m-d // H:i:s");

                ?>
            </div>
        </div>
        <br />
        <div>
            <?php

            echo $publicacion->texto;

            ?>
        </div>
    </div>

<?php endif; ?>