<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gynomo";

$conn = mysqli_connect($host, $user, $pass, $dbname);

//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Selecionar todos os cursos da tabela
$result_curso = "SELECT * FROM va_posts";
$resultado_curso = mysqli_query($conn, $result_curso);

//Contar o total de cursos
$total_cursos = mysqli_num_rows($resultado_curso);

//Seta a quantidade de cursos por pagina
$quantidade_pg = 6;

//calcular o número de pagina necessárias para apresentar os cursos
$num_pagina = ceil($total_cursos/$quantidade_pg);

//Calcular o inicio da visualizacao
$incio = ($quantidade_pg*$pagina)-$quantidade_pg;

//Selecionar os cursos a serem apresentado na página
$result_cursos = "SELECT * FROM va_posts limit $incio, $quantidade_pg";
$resultado_cursos = mysqli_query($conn, $result_cursos);
$total_cursos = mysqli_num_rows($resultado_cursos);
?>