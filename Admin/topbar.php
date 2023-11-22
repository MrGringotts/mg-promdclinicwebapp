<style>
a.nav-item {
    background-color: blue !important;
}
a.nav-item:hover, .nav-item.active {
    color: gray !important;
}
nav.navbar.navbar-light.fixed-top {
    padding: 7px !important;
    background: blue !important;
}
b#title-top {
    color: #fff !important;
    margin-left: 26px;
}
h6#log-btn {
    float: right;
    margin-top: 9px;
}
</style>

<nav class="navbar navbar-light fixed-top " style="padding:0; background: blue !important">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
      <b id="title-top"><?php echo $_SESSION['setting_name'] ?></b>
	  	<div class="col-md-4 float-right text-white">
	  		<h6 id="log-btn"><?php echo ($_SESSION['login_type'] == 4 ? "Dr. ".$_SESSION['login_name'] : $_SESSION['login_name']) ?> &nbsp;&nbsp; <a href="ajax.php?action=logout" class="text-white"><i class="fa fa-power-off"></i></a></h6>
	    </div>
    </div>
  </div>
  
</nav>