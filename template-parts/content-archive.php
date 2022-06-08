<div class="col-lg-2 mr-5">
	<div class="card">
		<?php if (has_post_thumbnail()) {?>
    	<img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="<?php the_post_thumbnail_url('thumbnail');?>" alt="image">
    	<?php }?>
    	<div class="card-body">
	        <h3 class="title mb-1"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
		    <div class="meta mb-1"><span class="date"><?php the_date();?></span>
		    	<span class="comment"><a href="#"><?php comments_number();?></a></span>
		    </div>
		    <div class="intro">
		    	<?php
				the_excerpt();
				?>
			</div>
			<div>
		    	<a class="more-link" href="<?php the_permalink(); ?>">Lees meer &rarr;</a>
			</div>
		</div>
	</div>
</div>