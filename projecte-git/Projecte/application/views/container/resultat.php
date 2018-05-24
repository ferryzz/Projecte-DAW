<head>
<script>
    $(document).ready(function(){
     var url = $(location).attr('pathname');
     var parts = url.split('/');
     var last_part = parts[parts.length-2];
     var url2 = $(location).attr("pathname");
     var parts2 = url2.split('/');
     var last_part2 = parts2[parts2.length-3];

     if (last_part == "filtro_cat" || last_part == "cat_nombre" || last_part == "cat_precio_asc" || last_part == "cat_precio_desc" || last_part2 == "cat_nombre" || last_part2 == "cat_precio_asc" || last_part2 == "cat_precio_desc") {
      $("#prova").attr("href","<?php echo site_url('Welcome/ordenar_nombres/cat_nombre/'.$p.'/'.$id_cat); ?>");
      $("#prova1").attr("href","<?php echo site_url('Welcome/ordenar_nombres/cat_precio_asc/'.$p.'/'.$id_cat); ?>");
      $("#prova2").attr("href","<?php echo site_url('Welcome/ordenar_nombres/cat_precio_desc/'.$p.'/'.$id_cat); ?>");
     }
    });
  
</script>
</head>
<body>
<?php 
if (empty($resultat2)) {
  ?>
  
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h2>No hay resultados para:&nbsp;"<?php echo $p; ?>" </h2>
        </div><br/>
        <div class="col-sm"><br/>
          <h4>No se han encontrado resultados con el criterio de búsqueda seleccionado. Prueba con otra búsqueda similar o menos especifica.</h4>
        </div>
    </div>
  

  <?php
}else{  
  ?>
  <div class="index-content">
    <div class="container">
      <div class="row">
        <div class="col-sm-4"><br/>
          <?php echo form_open('Welcome/filtro_cat/'.$p); ?>
            <select class="custom-select" id="categoria" name="categoria" onchange="if(this.value != '') { this.form.submit(); }">
              <option value="0">Filtrar Por Categoria</option>
              <?php
              foreach ($categorias -> result() as $row){ 
                echo "<option value='".$row->id."'>".$row->nombre."</option>";
              }
              ?>
            </select>
          <?php echo form_close(); ?>
        </div>
        <div class="col-sm-3"><br/></div>
        <div class="col-sm-5"><br/>
          Ordenar por: &nbsp;
          <a id= "prova" href="<?php echo site_url('Welcome/ordenar_nombres/nombre/'.$p)?>"> Nombre </a>&nbsp;|&nbsp;
          <a id= "prova1" href="<?php echo site_url('Welcome/ordenar_nombres/precio_asc/'.$p)?>"> Precio Ascendente  </a>&nbsp;|&nbsp;
          <a  id= "prova2" href="<?php echo site_url('Welcome/ordenar_nombres/precio_desc/'.$p)?>"> Precio Descendente</a>
        </div>
      </div>
    </div>
  </div>

  <div class="index-content">
    <div class="container">
      <div class="row">
        <?php foreach ($resultat2 -> result() as $row){ ?> 
          <a href="<?php echo site_url('Welcome/detalle/'.$row->pro_id);?>">
              <div class="col-md-4">
                <div class="card">
                  <img src = "/Exercicis/projecte_culpa_jonatan/<?php echo $row->pro_imagen?>" alt="<?php echo $row->pro_imagen ?>"/>
                  <h2><?php echo $row->pro_nombre;?></h2>
                  <h3>Preu: <?php echo $row->pro_precio;?> € </h3>
                  <a href="<?php echo site_url('Welcome/detalle/'.$row->pro_id);?>" class="blue-button">Detall</a>
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