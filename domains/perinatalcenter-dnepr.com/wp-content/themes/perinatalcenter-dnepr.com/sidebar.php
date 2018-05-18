<div class="col-md-3 side_bar">
	<section>
		<?php if ( is_active_sidebar( 'right_sidebar' ) ) : ?> 
		<div class="sidebar"> 
			<?php dynamic_sidebar( 'right_sidebar' ); ?> 
		</div> 
	<?php endif; ?>
	</section>
</div>