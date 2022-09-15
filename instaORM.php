<?php
error_reporting(0);

	include("classORM.php");
	$orm=new ORM();
	$orm->conexaoBDD()."";
	$orm->criarFORM()."";
	$orm->carregaVeiculo()."";
	$orm->visualizaVeiculo()."";
?>