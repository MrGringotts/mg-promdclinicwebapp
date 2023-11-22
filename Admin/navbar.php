
<style>
	img#logo {
		height: 92px;
		display: block;
		margin: auto;
		border-radius: 50%;
		border: solid 2px;
	}
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home">				
					<img id="logo" src="../assets/img/new-logo.jpeg"/>
				</a>

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=appointments<?php if($_SESSION['login_type'] == 4): echo "&did=".$_SESSION['login_doctor_id'].""; endif; ?>" class="nav-item nav-appointments"><span class='icon-field'><i class="fa fa-calendar"></i></span> Appointments</a>
				<a href="index.php?page=patients<?php if($_SESSION['login_type'] == 4): echo "&did=".$_SESSION['login_doctor_id'].""; endif; ?>" class="nav-item nav-patients"><span class='icon-field'><i class="fa fa-users"></i></span> Patient</a>
       <?php if($_SESSION['login_type'] == 2): ?>
<a href="index.php?page=doctors" class="nav-item nav-doctors"><span class='icon-field'><i class="fa fa-user-md"></i></span> Doctors</a>
				<?php endif; ?>
				<?php if($_SESSION['login_type'] == 2 OR $_SESSION['login_type'] == 4): ?>
				<a href="index.php?page=profile" class="nav-item nav-profile"><span class='icon-field'><i class="fa fa-user"></i></span> Users Account</a>
				<?php endif; ?>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=doctors" class="nav-item nav-doctors"><span class='icon-field'><i class="fa fa-user-md"></i></span> Doctors</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-book-medical"></i></span> Medical Specialties</a>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				<a href="index.php?page=events" class="nav-item nav-events"><span class='icon-field'><i class="fa fa-newspaper"></i></span> Events/Activity</a>
				<a href="index.php?page=backup-restore" class="nav-item nav-backup-restore"><span class='icon-field'><i class="fa fa-database"></i></span> Maintain Database</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cog"></i></span> Site Settings</a>
				<?php endif; ?>
		</div>
		

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php if($_SESSION['login_type'] == 2): ?>
	<style>
		.nav-users,.nav-categories{
			display: none!important;
		}
	</style>
<?php endif ?>