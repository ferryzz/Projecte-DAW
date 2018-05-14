<html>
<head></head>
<body>
<?php 
if (empty($resultat2)) {
  echo "No hi han productes";
}else{
  ?>
  <select name="">
    <option value="">Filtrar Por Categoria</option>
    <?php
    foreach ($categorias -> result() as $row){ 
      echo "<option value'".$row->id."'>".$row->nombre."</option>";
    }
    ?>
  </select>
  <?php //echo $p; ?>
  <h3>Ordenar por:</h3> &nbsp;<a href="<?php echo site_url('Welcome/ordenar_nombres/nombre/'.$p)?>"> Nombre </a>&nbsp;|&nbsp;<a href="<?php echo site_url('Welcome/ordenar_nombres/precio_asc/'.$p)?>"> Precio Ascendente  </a>&nbsp;|&nbsp;<a href="<?php echo site_url('Welcome/ordenar_nombres/precio_desc/'.$p)?>"> Precio Descendente</a>
  <table border="1">
  <tr>
    <td>Categoria</td>
    <td>Nom Producte</td>
    <td>Preu</td>
    <td>Imagen</td>
  </tr>
  <tr>
  <?php foreach ($resultat2 -> result() as $row){ ?> 
    <td><?php echo $row->cat_nombre;?></td>
    <td><?php echo $row->pro_nombre;?></td>
    <td><?php echo $row->pro_precio;?> €</td>
    <td><img src = "http://[::1]/Exercicis/projecte/<?php echo $row->pro_imagen?>" widht="150" height="150"/></td>
    </tr>
    <?php
  }
}
?>
</table>
</body>
</html>