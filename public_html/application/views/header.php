<!doctype html>
<html>
	<head>
		<title>Welcome to Clever 401k</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/css/bootstrap.css">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/css/style.css">
	</head>
	<body>
		<?php 
		$link = ($this->ion_auth->logged_in()) ? base_url() . "auth/logout" : base_url() . "login";
		$text = ($this->ion_auth->logged_in()) ? " Logout" : " Login";
		?>
		<!-- Navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#cleverNav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				<a href="<?php echo base_url(); ?>" class="navbar-brand">Clever<strong>401k</strong>Logo</a>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="cleverNav">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home fa-fw"></i> Home</a>
						<li><a href="about"><i class="fa fa-info fa-fw"></i> About</a></li>
						<li><a href="contact"><i class="fa fa-envelope fa-fw"></i> Contact Us</a></li>
						<li><a href="<?php echo $link; ?>"><i class="fa fa-user fa-fw"></i> <?php echo $text; ?></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Main Content -->
		<div class="container">