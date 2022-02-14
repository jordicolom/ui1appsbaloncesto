<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">	
        <a class="navbar-brand" href="index.php">
        Club Baloncesto San Pablo Burgos
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
			<ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if($_GET['menu'] == "equipos"){echo "active";}?>">
					<a class="nav-link" href="?menu=equipos">Equipos</a>
				</li>
				<li class="nav-item  <?php if($_GET['menu'] == "jugadores"){echo "active";}?>">
					<a class="nav-link" href="?menu=jugadores">Jugadores</a>
				</li>
				<li class="nav-item <?php if($_GET['menu'] == "partidos"){echo "active";}?>">
					<a class="nav-link" href="?menu=partidos">Partidos</a>
				</li>
				<li class="nav-item <?php if($_GET['menu'] == "ficheros"){echo "active";}?>">
					<a class="nav-link" href="?menu=ficheros">Ficheros</a>
				</li>
			</ul>
        </div>
</nav>