
<nav class="navbar navbar-fixed-top navbar-light bg-faded navbar-customized" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
			&#9776;
		</button>
		<div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar2">
			
			<?php zonaproCorp_custom_logo();?>
			<?php if ( has_nav_menu( 'main-menu' ) ) {
			mainMenu();
			}?>

		</div>
	</div>
</nav>
