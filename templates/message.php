<?php if( isset( $_SESSION['error']) && !empty( $_SESSION['error'] )){ ?>
	<div class="message_error message_div">
		<p class="text-center"> <?php echo $_SESSION['error']; ?>  </p>
	</div>
<?php $s = 1;  ?>
<?php }elseif ( isset( $_SESSION['success']) && !empty( $_SESSION['success'] )){ ?>
<?php //print_r( $_SESSION );exit; ?>
	<div class="message_success message_div">
		<p class="text-center"> <?php echo $_SESSION['success']; ?> </p>
	</div>
<?php $s = 1; ?>
<?php }else{
	$s =0;
} ?>




<?php if($s){ $s = 0; ?>
	<script>
		$(document).ready(function(){
			$('.message_div').delay(5000).slideUp();
		});
    </script>
<?php } ?>