<?php 
	get_header();
?>

<article class="content px-3 py-5 p-md-5">
	<div class="container" id="maincontainer">
	    <div class="row">
		
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					get_template_part('template-parts/content', 'archive');
				}
			}
			?>

			</article>
				
			<?php 
			the_posts_pagination();
			// wpbeginner_numeric_posts_nav(); 
			?>
		</div>
	</div>
<?php 
get_footer();
?>