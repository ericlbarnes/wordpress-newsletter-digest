<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<style type="text/css">
		<?php // Inject the css inline ?>
		<?= include(get_template_directory().'/newsletter.css') ?>
	</style>
</head>
<body>

	<?php // IF they are not logged in show a custom signup form ?>
	<?php if ( ! is_user_logged_in()): ?>
	<form class="digest-subscribe" action="#" method="POST" accept-charset="utf-8">
		<p>Join today and never miss an issue: </p>
		<input type="email" name="email" id="email" placeholder="Email" required="required">
		<button type="submit">Subscribe</button>
	</form>
	<?php endif;  ?>

	<!-- BODY -->
	<?php while ( have_posts() ) : the_post(); ?>

		<?= laravelnews_table_start(); ?>
			<?php the_content(); ?>
		<?= laravelnews_table_end(); ?>

	<?php endwhile; ?>
	<!-- /BODY -->

</body>
</html>