<div class="panel panel-default">
	<div class="panel-heading">
		Change password
	</div>
	<div class="panel-content">
		<?php 
		$a = array('class' => 'form-horizontal'); 
		echo form_open('auth/changePassword', $a);
		?>
		<div class="form-group">
			<?php 
				$a = array('class' => 'col-sm-3 control-label'); 
				echo form_label('User', 'username', $a);?>
			<div class="col-sm-4">
				<p class="form-control-static"><?php echo $this->session->userdata('fullname'); ?></p>
			</div>			
		</div>
		<div class="form-group">
			<?php 
				$a = array('class' => 'col-sm-3 control-label'); 
				echo form_label('Old password', 'password', $a);?>
			<div class="col-sm-4">
				<?php 
				$a = array('class' => 'form-control', 
				'name' => 'old_pw',
				'id' => 'old_pw'
				); 
				echo form_password($a);
				?>
			</div>
		</div>
		<div class="form-group">
			<?php 
				$a = array('class' => 'col-sm-3 control-label'); 
				echo form_label('New password', 'password', $a);?>
			<div class="col-sm-4">
				<?php 
				$a = array('class' => 'form-control', 
				'name' => 'new_pw',
				'id' => 'new_pw'
				); 
				echo form_password($a);
				?>
			</div>
		</div>
		<div class="form-group">
				<?php 
				$a = array('class' => 'col-sm-3 control-label'); 
				echo form_label('Verify password', 'verify_password', $a);?>
			<div class="col-sm-4">
				<?php 
				$a = array('class' => 'form-control', 
				'name' => 'verify_pw',
				'id' => 'verify_pw'
				); 
				echo form_password($a);
				?>
			</div>
		</div>
		<div class="col-sm-offset-3">
			<button type='submit' class="btn btn-primary">Change Password</button>
			<button type='reset' class="btn btn-default">Clear</button>
		</div>		
		<?php echo form_close(); ?>
		<br />
	</div>
</div>
