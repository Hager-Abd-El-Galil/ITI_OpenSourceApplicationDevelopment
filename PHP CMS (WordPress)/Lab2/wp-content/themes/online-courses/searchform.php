<?php
/**
 * The template for displaying search form
 * @package Online Courses
 */
?>
<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="text" name="s" placeholder="<?php esc_attr_e('Search...','online-courses'); ?>" class="form-control" required="">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
		</span>
	</div>
</form>