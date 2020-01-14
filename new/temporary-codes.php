		<div class="nav-link" id="navbarNav">
		<?php
			if ( is_user_logged_in() ){ ?>
				<a href="">My Profile</a>
			<?php } else { ?>
				<a href="<?php user_admin_url() ?>">Login/SignUp</a>
			<?php }
		?>
		</div>