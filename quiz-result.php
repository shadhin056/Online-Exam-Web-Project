<?php require_once 'templates/header.php';?>
<?php 
	if( !empty( $_POST )){
		try {
			$user = new Cl_User();
			$result = $user->getAnswers( $_POST );
		} catch (Exception $e) {
			$_SESSION['error'] = $e->getMessage();
		} 
	}else{
		header('Location: home.php');exit;
	}
?>
	<div class="content">
     	<div class="container">
			<?php require_once 'templates/ads.php';?>
     		<div class="row">
     			<?php //require_once 'templates/tutorials.php';?>
	     		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
					<h1 class="text-center text_underline">Your Quiz Results:</h1>
					<br />
					<form class="form-horizontal">
						<div class="form-group mg-b50">
							<p class="col-sm-7 control-label">Right Answers:</p>
							<div class="col-sm-5">
								<span class="well ans"> <?php echo isset($result['right_answer'])? $result['right_answer']:''; ?>
								</span>
							</div>
						</div>
						<div class="form-group mg-b50">
							<p class="col-sm-7 control-label">Wrong Answers:</p>
							<div class="col-sm-5">
								<span class="well ans"> <?php echo isset($result['wrong_answer'])? $result['wrong_answer']:''; ?>
								</span>
							</div>
						</div>
						<div class="form-group mg-b50">
							<p class="col-sm-7 control-label">Unanswered Questions:</p>
							<div class="col-sm-5">
								<span class="well ans"> <?php echo isset($result['unanswered'])? $result['unanswered']:''; ?>
								</span> 
							</div>
						</div>
					</form>
					<div class="row btn-c well">
	     				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	     					<a href="start-quiz" class="btn btn-success btn-home">Start New Quiz</a>
	     				</div>
	     				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	     					<a href="quiz-results" class="btn btn-info btn-home">Your Quiz Results</a>
	     				</div>
	     			</div>
				</div>
	     		<?php //require_once 'templates/sidebar.php';?>
     		</div>
     	</div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>