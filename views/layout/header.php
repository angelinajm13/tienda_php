<!DOCTYPE HTML>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Instrumentos Angie</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
	</head>
	<body>
		<div id="container">
			<!-- CABECERA -->
			<header id="header" class="bg-light py-3">
				<div class="container-fluid d-flex align-items-center justify-content-between">
					<div id="logo" class="d-flex align-items-center">
						<img src="<?=base_url?>assets/img/logotienda.png" alt="Tienda Logo" class="img-fluid me-2" style="max-width: 80px; height: auto;">
						<a href="<?=base_url?>" class="fs-4 fw-bold text-decoration-none text-dark">Instrumentos Musicales</a>
					</div>
				</div>
			</header>

			<?php $categorias = Utils::showCategorias(); ?>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="<?=base_url?>">Inicio</a>
							</li>
							<?php while($cat = $categorias->fetch_object()): ?>
								<li class="nav-item">
									<a class="nav-link" href="<?=base_url?>categoria/ver&id=<?=$cat->id?>"><?=$cat->nombre?></a>
								</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</nav>
			<div id="content">