<nav>
	<div>
		<h1>Cygnate Test</h1>
	</div>
	<div>
		<li><a href="<?php echo HOME.'home/index'; ?>">Home</a></li>
		<li><a href="<?php echo HOME.'admin/students'; ?>">Student Listing</a></li>
		<li><a href="<?php echo HOME.'admin/addStudents'; ?>">Add Students</a></li>
		<?php
		if(Session::get('loggin') == true){
		?>
		<li><a href="<?php echo HOME.'admin/logout'; ?>">Logout</a></li>
		<?php }else { ?>
		<li><a href="<?php echo HOME.'admin/login'; ?>">Login</a></li>
		<?php } ?>
	</div>
	
</nav>