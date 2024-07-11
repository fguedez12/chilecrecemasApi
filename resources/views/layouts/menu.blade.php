<nav class='animated bounceInDown bg-b'>
	<ul>
		<li class='sub-menu'><a href='#settings'>Noticia<div class='fa fa-caret-down right'></div></a>
			<ul>
				<li><a href="{{ route('noticias.index') }}">Noticias</a></li>
				<li><a href="{{ route('tags.index') }}">Tags</a></li>
			</ul>
		</li>
		<li class='sub-menu'><a href='#message'>Usuario<div class='fa fa-caret-down right'></div></a>
			<ul>
				<li><a href='/admin/users-with-families'>Listado Usuario App</a></li>
			</ul>
		</li>
        <li><a href='#profile'>Perfil</a></li>
		<li><a href='#message'>Salir</a></li>
	</ul>
</nav>