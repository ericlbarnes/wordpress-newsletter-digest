<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<section>
		<div class="post text">

			<h1 class="cat-title">Laravel Newsletter Archives</h1>

			<div class="taxonomy-description">
				<p>This is a complete list of all the Laravel News Digest emails. <a href="http://laravel-news.com/newsletter/">Signup today</a> and never miss a future issue.</p>
			</div>

			<?php // This generates monthly breaks. See: http://laravel-news.com/digest/ ?>
			<?php $last_month = false; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
					$month  = get_the_time( 'M Y' );
					if ($last_month != get_the_time( 'M Y' )):
						if ($last_month) echo "</ul>";
						echo '<h3>'.get_the_time( 'F Y' ).'</h3>';
						echo '<ul>';
					endif;
					$last_month = get_the_time( 'M Y' );
				?>
				<li>
					<span class="title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</span>
					<time class="entry-date"> - <?php the_time('M d'); ?></time>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</section>

	<?php laravelnews_paging_nav(); ?>

<?php else : ?>

	<?php get_template_part( 'content', 'none' ); ?>

<?php endif; ?>

<?php get_footer(); ?>
