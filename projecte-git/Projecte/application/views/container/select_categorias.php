<body>
<?php 
if (empty($resultat2)) {
  ?>
  <div class="index-content">
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h2>No hay resultados para:&nbsp;"<?php echo $p; ?>" </h2>
        </div><br/>
        <div class="col-sm"><br/>
          <h4>No se han encontrado resultados con el criterio de búsqueda seleccionado. Prueba con otra búsqueda similar o menos especifica.</h4>
        </div>
    </div>
  </div>

  <?php
}else{
  ?>
  <div class="index-content">
    <div class="container">
      <div class="row">
        <?php foreach ($resultat2 -> result() as $row){ ?> 
          <a href="container_prod.php">
              <div class="col-md-4">
                <div class="card">
                  <img src = "/Exercicis/projecte_santos_ferran/<?php echo $row->pro_imagen?>" alt="<?php echo $row->pro_imagen ?>"/>
                  <h2><?php echo $row->pro_nombre;?></h2>
                  <h3>Preu: <?php echo $row->pro_precio;?> € </h3>
                  <a href="detall.php" class="blue-button">Detall</a>
                  </div>
            </div>  
          </a>
          <?php
        }
      }
      ?>
          </div>
      </div>
    </div>