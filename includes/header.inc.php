<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
<?php if (isset($strPageTitle)) { ?>
		<title><?php _p($strPageTitle); ?></title>
<?php } ?>
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __CSS_ASSETS__); ?>/styles.css");</style>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</head><body><div class="container">
<?php $this->RenderBegin(); ?>
		
<?php if (QApplication::$User != null) { ?>
	<img class="logo" src="<?php _p(__VIRTUAL_DIRECTORY__ . __IMAGE_ASSETS__); ?>/Two-Tunics_logo.png" style="display: block; margin: 10px auto; width:150px;" />
	
	<!--  Display Navigation Menu based on User Role -->
	<?php 
	$role = QApplication::$User->AccessLevel;
	switch ($role){
		case 1: // Charity Partner
	?>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">TwoTunics</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li id="dashboard" class="active"><a href="<?php _p(__SUBDIRECTORY__);?>/dashboard/index.php">Dashboard</a></li>	    
	      <li id="needs"><a href="<?php _p(__SUBDIRECTORY__);?>/needs/index.php">My Needs</a></li>
	      <li id="donations"><a href="<?php _p(__SUBDIRECTORY__);?>/donations/index.php">Available Donations</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="<?php _p(__SUBDIRECTORY__);?>/logoff/index.php"><span class="glyphicon glyphicon-log-in"></span> LogOff</a></li>
	    </ul>
	  </div>
	</nav>
	<?php 
		break;
	case 2: // Fashion Partner
	?>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">TwoTunics</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li id="dashboard" class="active"><a href="<?php _p(__SUBDIRECTORY__);?>/dashboard/index.php">Dashboard</a></li>
	      <li id="donations"><a href="<?php _p(__SUBDIRECTORY__);?>/donations/index.php">My Donations</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="<?php _p(__SUBDIRECTORY__);?>/logoff/index.php"><span class="glyphicon glyphicon-log-in"></span> LogOff</a></li>
	    </ul>
	  </div>
	</nav>
	<?php 
		break;
	case 3:  // Administrator
	?>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">TwoTunics</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li id="dashboard" class="active"><a href="<?php _p(__SUBDIRECTORY__);?>/dashboard/index.php">Dashboard</a></li>
	      <li id="users" ><a href="<?php _p(__SUBDIRECTORY__);?>/users/index.php">Users</a></li>
	      <li id="partners"><a href="<?php _p(__SUBDIRECTORY__);?>/partners/index.php">Partners</a></li>
	      <li id="needs"><a href="<?php _p(__SUBDIRECTORY__);?>/needs/index.php">Needs</a></li>
	      <li id="donations"><a href="<?php _p(__SUBDIRECTORY__);?>/donations/index.php">Donations</a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="<?php _p(__SUBDIRECTORY__);?>/logoff/index.php"><span class="glyphicon glyphicon-log-in"></span> LogOff</a></li>
	    </ul>
	  </div>
	</nav>
	<?php 
		break;
	}
	?>
	
<?php }  ?>

