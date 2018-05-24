<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/fonts/font-awesome-4.4.0/css/font-awesome.css");?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap-theme.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/estils.css"); ?>" media="screen"/>
	<script src="<?php echo base_url("assets/bootstrap/js/jquery-1.9.1.min.js");?>"></script>
    <script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/menu.js"); ?>"></script>
	<title>Technocomputer</title>
  </head>
<body>
    <div class="jumbotron">
		  <div class="container text-center">
			<h1 class="textos">TechnoComputer</h1>    
		  </div>
	</div>
		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">
			 <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-slide-dropdown">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			 	<a class="logosvg" href="#"></a>
		    </div>
   			<div class="collapse navbar-collapse " id="bs-slide-dropdown">
				<?php
					foreach ($familias -> result() as $row){ 
						?>
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown"><?php echo $row->Nombre?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
								<?php
								foreach ($categorias -> result() as $row2){ 
									if ($row2->id_familia == $row->id){
										?>
											<li><a href="<?php echo site_url('Welcome/llista_categorias/'.$row2->id)?>"><?php echo $row2->nombre;?></a></li>
										<?php
									}
				            	}
				            ?>
				            	</ul>
				            </li>
				        </ul><?php
				    }          
				?>
			    <form class="navbar-form navbar-left" role="search" method="POST" action="<?php echo site_url('Welcome/verProductos');?>" >
		            <div class="form-group">
		              <input type="text" class="form-control" placeholder="Buscar.." id="buscar" name="buscar">
		            </div>
		            <button id="enviar" value="Buscar" name="enviar" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		        </form>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#"><span class="glyphicon glyphicon-user"></span> Inici Sessio</a>
					<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                       <li>
                          <div class="row">
                             <div class="col-md-12">   
								 <form class="form" role="form" method="post" action="<?php echo site_url("welcome/login");?>">
                                    <div class="input-group">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									   <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required> 
                                    </div>
                                    <div class="input-group">
                                       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									   <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                       <button id="enviar"  type="submit" class="btn btn-primary btn-block btn_login"  onclick="cifrar()">Login</button>
                                    </div>
                                 </form>
								 <div class="regis">
                                       <a class="regis" href="<?php echo site_url("welcome/registro");?>" >Registrate</a>
                                 </div>
                              </div>
                           </div>
                        </li>
					</ul>
					  
					</li>
					<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cistella</a></li>
			</ul>		
			   
			</div>
		  </div>
		</nav>