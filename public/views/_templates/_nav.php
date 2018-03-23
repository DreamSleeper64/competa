<?php $a = true; ?>
<nav class="nav">
	<ul class="nav-menu">
		<li class="nav-menu-item">
			<a class="nav-menu-item__link" href="?view=default">HOME</a>
		</li>
		<li class="nav-menu-item">
			<a class="nav-menu-item__link" href="?view=request">REQUEST</a>
		</li>
		<li class="nav-menu-item">
			<a class="nav-menu-item__link" href="?view=requests">REQUESTS</a>
		</li>
		<li class="nav-menu-item">
			<a class="nav-menu-item__link" href="?view=scraper">SCRAPER</a>
		</li>
		<?php if(isset($a) && $a == true): ?>
		<li class="nav-menu-item">
			<a class="nav-menu-item__link" href="?view=tryout">TRYOUT</a>
		</li>
		<?php endif; ?>
	</ul>
</nav>