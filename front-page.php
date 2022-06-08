<?php 
	get_header();
?>

<article class="content px-3 py-5 p-md-5">
	<div class="container" id="maincontainer">
    	<div class="row">
    		<div class="col-lg-6">
				<div class="form">
    				<h2>Plaats een blog bericht</h2>
<!-- 	    			<form action="" method="post">
						<div class="form-group">
							<label for="title">Berichtnaam</label><br>
							<input type="text" name="title" value="Geen titel"><br>
						</div>
						
						<div class="col-md-12 text-center">
            				<button type="button" class="btn btn-primary" input type="submit" value="Bericht aanmaken">Bericht aanmaken</button>
            			</div>
					</form> -->
					
					<form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">

					<!-- post name -->
					<div class="form-group">

						<p><label for="title">Berichtnaam</label><br />
						<input type="text" id="title" value="" tabindex="1" size="20" name="title" />
						</p>
					</div>
					<!-- post Category -->
					<div class="form-group">
						<p><label for="Category">Category</label><br />
						<p><?php wp_dropdown_categories( 'show_option_none=Category&tab_index=4&taxonomy=category' ); ?></p>
					</div>
					<div class="form-group">
						<p><label for="thumbnail">Header afbeelding</label><br />
						<input type="file" name="thumbnail" id="thumbnail">
						</p>
					</div>
					<div class="form-group">
						<!-- post Content -->
						<p><label for="description">Bericht</label><br />
						<textarea id="description"  name="description"  rows="6"></textarea>
						</p>
					</div>
					<div class="form-group">
						<!-- post tags -->
						<p><label for="post_tags">Tags:</label>
						<input type="text" value="" tabindex="5" size="16" name="post_tags" id="post_tags" /></p>
					</div>
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary" id="submit" name="submit" input type="submit" value="Bericht aanmaken">Bericht aanmaken</button>
					</div>
						<input type="hidden" name="action" value="new_post" />
						<?php wp_nonce_field( 'new-post' ); ?>
					</form>			
				</div>
    		</div>
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					?>
					<div class="col-lg-6">
						<div class="somePosts">
							<?php the_content();?>
							<div class="col-md-12 text-center float">
		            			<a href="blogs"><button type="button" class="btn btn-primary">Meer laden</button></a>
		            		</div>
						</div>

					</div>
					<?php 
					}
				}
			?>
		</div>
	</div>
</article>

<?php 
get_footer();
?>