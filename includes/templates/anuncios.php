<?php
    use App\Propiedad;

    if($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
      $propiedades = Propiedad::all();

    } else {
      $propiedades = Propiedad::get(3);
    }
?>

<div class="contenedor-anuncios">

        <?php foreach($propiedades as $propiedad) { ?>

        <div class="anuncio">
          <picture>

            <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio 1" loading="lazy" />

          <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo; ?></h3>
            <p>
            <?php echo $propiedad->descripcion; ?>
            </p>
            <p class="precio">$<?php echo $propiedad->precio; ?></p>

            <ul class="iconos-caracteristicas">
              <li>
                <img
                  class="icono"
                  src="build/img/icono_wc.svg"
                  alt="icono wc"
                  loading="lazy"
                />
                <p><?php echo $propiedad->baño; ?></p>
              </li>
              <li>
                <img
                  class="icono"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icono estacionamiento"
                  loading="lazy"
                />
                <p><?php echo $propiedad->estacionamiento; ?></p>
              </li>
              <li>
                <img
                  class="icono"
                  src="build/img/icono_dormitorio.svg"
                  alt="icono dormitorio"
                  loading="lazy"
                />
                <p><?php echo $propiedad->habitaciones; ?></p>
              </li>
            </ul>

            <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
              Ver propiedad
            </a>
          </div>
          <!-- fin .contenido-anuncio -->
        </div>
        <!-- fin .anuncio -->

        <?php } ?>

      </div>
      <!-- fin .contenedor-anuncio -->
