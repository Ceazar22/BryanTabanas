<?php
/**
 * Default content card.
 *
 * @package UsableStarter
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-card' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a class="content-card__image" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php the_post_thumbnail( 'usable-starter-card' ); ?>
		</a>
	<?php endif; ?>
	<div class="content-card__body">
		<header class="entry-header">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php usable_starter_post_meta(); ?>
		</header>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
