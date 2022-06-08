<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <!-- <meta name="author" content="https://youtube.com/FollowAndrew">     -->
    <link rel="shortcut icon" href="/wp-content/themes/SocialBrothers/images/logo.png"> 
	<!-- <title></title> -->

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">


	<?php
		wp_head();
	?>
</head>
<body>
	<header>
		<div class="container">
			<div id="banner">
				<?php if ( get_header_image() ) : ?>
				    <div id="site-header">
				        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				            <img src="<?php header_image(); 
				            ?>"  style="max-width: 100%;position:absolute;z-index: -1;filter: brightness(70%); ">
				            <nav class="navbar navbar-expand-lg navbar-dark bg-transparant">
							 	<a class="navbar-brand" href="<?php echo site_url(); ?>">
							 		<!-- <div id="logo"> -->
									<?php
									if ( function_exists( 'the_custom_logo' ) ) {
									    // the_custom_logo();

									    $custom_logo_id = get_theme_mod('custom_logo');
									    $logo = wp_get_attachment_image_src($custom_logo_id);
									}
									?>
									<img class="mb-3 mx-auto logo" style="width:210px; height:50px;" src="<?php echo $logo[0]  ?>">
									<!-- </div> -->
								</a>
							 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
							    <span class="navbar-toggler-icon"></span>
								</button>

							  	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">

							  		<?php
							  			wp_nav_menu(
							  				array(
							  					'menu' => 'primary',
							  					'container' => '',
							  					'theme_location' => 'primary',
							  					'items_wrap' => '<ul id="" class="navbar-nav ml-auto mt-2 mt-lg-0">%3$s</ul>'
							  				)
							  			);

							  		?>
							  	</div>
							</nav>
				            <header class="page-title theme-bg-light text-center gradient py-5" style="">
								<h1 class="heading"><?php single_post_title(); ?></h1> 
							</header>
				        </a>
				    </div>
				<?php  
				else: ?>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/headers/background.png" style="max-width: 100%;position:absolute;z-index: -1;filter: brightness(70%); ">
<!-- 					<div class="headerimage"></div>
				<img src="images/background.png" style="max-width: 100%;position:absolute;z-index: -1;filter: brightness(70%); "> -->
	            <nav class="navbar navbar-expand-lg navbar-dark bg-transparant">
				 	<a class="navbar-brand" href="<?php echo site_url(); ?>">
				 		<!-- <div id="logo"> -->

							<?php
							if ( function_exists( 'the_custom_logo' ) ) {
							    // the_custom_logo();

							    $custom_logo_id = get_theme_mod('custom_logo');
							    $logo = wp_get_attachment_image_src($custom_logo_id);
							}
							?>
							<img class="mb-3 mx-auto logo" style="width:210px; height:50px;" src="<?php echo $logo[0]  ?>">
						<!-- </div> -->
					</a>
				 	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
					</button>

				  	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">

				  		<?php
				  			wp_nav_menu(
				  				array(
				  					'menu' => 'primary',
				  					'container' => '',
				  					'theme_location' => 'primary',
				  					'items_wrap' => '<ul id="" class="navbar-nav ml-auto mt-2 mt-lg-0">%3$s</ul>'
				  				)
				  			);

				  		?>
				  	</div>
				</nav>
	            <header class="page-title theme-bg-light text-center gradient py-5" style="">
					<h1 class="heading"><?php single_post_title(); ?></h1> 
				</header>
			<?php endif; ?>
			</div>
		</div>

	</header>