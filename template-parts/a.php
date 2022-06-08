<form action="" method="post">
	<div class="form-group">
		<label for="post_title">Berichtnaam</label><br>
		<input type="text" name="post_name" value="Geen titel"><br>
	</div>
	<div class="form-group">
		<label for="category">Category</label><br>
		<select id="category" name="category">
 			<option value="1">Geen category</option>
  			<option value="2">b</option>
  			<option value="3">c</option>
  			<option value="4">d</option>
		</select><br>
	</div>
	<div class="form-group">
		<label for="header_image">Header afbeelding</label><br>
		<input type="file" name="header_image"> <br>
	</div>
	<div class="form-group">
		<!-- Bericht <input type="text" name="post-text"> -->
		<label for="post-text">Bericht</label>
    	<textarea class="form-control" rows="12" name="post-text"></textarea>
	</div>
	<div class="col-md-12 text-center">
		<button type="button" class="btn btn-primary" input type="submit" value="Bericht aanmaken">Bericht aanmaken</button>
	</div>
</form>


				            if( header_image()){
				            	?>
				            	images/headers/background.png
				            <?php 		
				            }