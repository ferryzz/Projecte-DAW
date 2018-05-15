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
	 
		 <nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand" href="#">Logo</a>
			</div>
			<div class="collapse navbar-collapse btn-group show-on-hover" id="myNavbar">
			  
			  <ul class="nav navbar-nav">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Components <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Font d'alimentacio</a></li>
					<li><a href="#">Placa Base</a></li>
					<li><a href="#">Memoria Ram</a></li>
					<li><a href="#">Procesadors</a></li>
					<li><a href="#">Discs Durs</a></li>
					<li><a href="#">Targetes Gráfiques</a></li>
				  </ul>
				</li>
			  </ul>
			  
			  
			  <ul class="nav navbar-nav">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Prefèrics <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Ratolins</a></li>
					<li><a href="#">Teclats</a></li>
					<li><a href="#">Monitors</a></li>
					<li><a href="#">Auriculars</a></li>
				  </ul>
				</li>
			  </ul>
			  
			  <ul class="nav navbar-nav">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ordinadors <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Sobretaula</a></li>
                    <li><a href="#">Portatils</a></li>
				  </ul>
				</li>
			  </ul>
			  
			  <ul class="nav navbar-nav">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cables <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="#">Cables USB</a></li>
					<li><a href="#">Cables HDMI</a></li>
					<li><a href="#">Cables VGA</a></li>
					<li><a href="#">Cables de Xarxa</a></li>
					<li><a href="#">Cables ATA</a></li>
				  </ul>
				</li>
			  </ul>
			  
			  
			   <div class="col-sm-3 col-md-3">
				<form class="navbar-form" role="search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="cerca">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
				</form>
			   </div>
			

			<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					  <a><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata("email");?></a>
					  <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="col-lg-8">
                                       <p><a href="#"> Editar datos</a></p>
									   <p><a href="#">Ver pedidos</a></p>
									   <a href="<?php echo site_url("welcome/logout");?>" class="btn btn-danger btn-block">Tancar Sessió</a>
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
	 
