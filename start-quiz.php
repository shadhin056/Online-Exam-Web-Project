
<?php require_once 'templates/header.php';?>
<?php 				
	try {
		$user = new Cl_User();
		$categories = $user->getCategory();
		if(empty($categories)){
			$_SESSION['error'] = NO_CATEGORY;
			header('Location: home.php');exit;
		}
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
		header('Location: home.php');exit;
	}
	
?>
	<div class="content">
     	<div class="container">
			<?php require_once 'templates/ads.php';?>
     		<div class="row">
     			<?php //require_once 'templates/tutorials.php';?>
	     		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 start-page">
	     			<h2 class="text_underline">Choose Your Category </h2>
					<form class="form-signin well" method="post" id='signin' name="signin" action="questions.php">
						<div class="form-group">
						
							<select class="form-control" name="category" id="category">
								<option value="">Choose your category</option>
									<?php 
							
							mysql_connect("localhost","root","");
						$con=	mysql_select_db("user_login");
						$sql=	mysql_query("select * from categories");
							while($row=mysql_fetch_array($sql))
							{
							$id=$row['id'];
							echo "<option value=$id>".$row['category_name']."<option>";
							}
							?>
							</select> 
							<span class="help-block"></span>
						</div>
	
						<div class="form-group">
							<select class="form-control" name="num_questions" id="num_questions">
								<option value="">Choose number of questions to be showed on each page</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select> 
							<span class="help-block"></span>
						</div>
	
						<br>
						<button id="start_btn" class="btn btn-success btn-block" type="submit">Start!!!</button>
					</form>
				</div>
	     		<?php //require_once 'templates/sidebar.php';?>
     		</div>
     	</div>
    </div> <!-- /container -->
    
<script src="js/start.js"></script>
<?php require_once 'templates/footer.php';?>
	
