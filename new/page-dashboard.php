<?php
/**
 * nusscistudentlife user dashboard
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<div class="container-fluid customcontent">
	<p>debug: page-dashboard.php has loaded</p>
</div>

<div class="container-fluid">
	<div class="row">
		<?php if ( current_user_can('administrator') ) { ?>
			<p> Register Here </p><?php
		}?>
	</div>
	
	<div>
		<form action="asd" method="post" on_sumbit="return form_validation()">
			<label for="sci_reg_name">Name:
				<input type="text" id="sci_reg_name" name="sci_reg_name">
			</label>
		</form>
	</div>

	<!--<script type=>-->
		
	</script>
</div>

<?php
get_footer();
?>