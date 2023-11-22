
<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        ob_start();
        include('header.php');
  
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;


      $pagess = isset($_GET['page']) ? $_GET['page'] : 'home';
	}
    ob_end_flush();

    if(!empty($_SESSION['home'])):?>
    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		  height:650px;
		}
    img#logo {
      height: 98px !important;
      display: block;
      margin: auto;
      border-radius: 50%;
      border: solid 2px;
      width: 102px;
    }
    a.dropdown-toggle {
        font-size: 23px !important;
    }
    </style>
    <?php endif; ?>
    <body id="page-top">
<?php


if(isset($_GET['home'])
) {
  $_SESSION['home']=true;

  echo "<script>window.location='index.php';</script>";
}

if(empty($_SESSION['home'])):?>
    <style>
    	header.masthead {
		  background: url(assets/img/bg-front.jpg);
		  background-repeat: no-repeat;
		  background-size: cover;
      background-position: center;
		  height: 950px;
		}

    .banner-btn {
      padding: 0 34px;
    margin: 24px auto 25px;
    line-height: 56px;
    border-radius: 6px;
    height: 57px;
    font-size: 28px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    background: #fe4066;
    display: inline-block;
    color: #ffffff;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
    text-align: center;
    }
    .col-lg-10.align-self-end.mb-4.page-title h3 {
      font-family: 'Metropolis-Regular', "Segoe UI", Helvetica Neue, Helvetica, sans-serif;
      letter-spacing: 0px !important;
      z-index: 114;
  }
  .col-lg-10.align-self-end.mb-4.page-title h3 {
    font-size: 37px;
    color: #333 !important;
    text-shadow: 2px 2px 5px #6c757d;
}

.col-lg-10.align-self-end.mb-4.page-title span {
    font-size: 82px;
    font-weight: 500;
    color: #333 !important;
}
.h-50 {
    height: 67% !important;
}
a.banner-btn:hover {
    color: #333 !important;
    text-decoration: none !important;
}
  </style>


<header class="masthead">
    <div class="container h-50">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4 page-title">
            <h3><span>Welcome To</span><br>A Web-Based ProMD Polyclinic Appointment System In Barangay Sangali Zamboanga City</h3>
                <hr class="divider my-4" />

                <a href="index.php?home=hom" class="banner-btn">Get Started</a>
            </div> 
        </div>
    </div>
</header>


  <!-- <h1>Welcome to press to continue <a href="index.php?home=home">Click...</a></h1> -->

<?php die(); endif; ?>

        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">  
        <div class="toast-body text-white">
        </div>
      </div>

      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <a class="navbar-brand" href="index.php"><img id="logo" src="./assets/img/new-logo.jpeg"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto">

          <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:<?php if($pagess == 'home'){ echo '#FFFF00'; } ?>"  href="index.php?page=home"><i class="fa fa-home mr-2"></i>Home</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:<?php if($pagess == 'doctors' || $pagess == 'appointment'){ echo '#000'; } ?>" href="index.php?page=doctors"></span><i class="fa fa-user-md mr-2"></i>Doctors</a></li>
          
      <?php if(!isset($_SESSION['login_id'])): ?>

          <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:<?php if($pagess == 'events'){ echo '#000'; } ?>"  href="index.php?page=events&month=<?php echo date('F') ?>"><i class="fa fa-newspaper mr-2"></i>Events</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:<?php if($pagess == 'about'){ echo '#000'; } ?>"  href="index.php?page=about"><i class="fa fa-question mr-2"></i>About</a></li>
      
      <?php endif; ?>
          
      <?php if(isset($_SESSION['login_id'])): ?>

          <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:<?php if($pagess == 'profile'){ echo '#000'; } ?>"  href="index.php?page=profile&pid=<?php echo $_SESSION['login_id']?>"><i></i>Profile</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" style="color:<?php if($pagess == 'appointment_a'){ echo '#000'; } ?>"  href="index.php?page=appointment_a&pid=<?php echo $_SESSION['login_id']?>"><i></i>My Appointment</a></li>   
          <div class="NavProf"><p>Hello <?php 

$cats = $conn->query("SELECT * FROM users where id =".$_SESSION['login_id']);
while($row=$cats->fetch_assoc()):
  echo $row['name'];
endwhile;
?>, Welcome to ProMD Polyclinic </p><div>
      <?php endif; ?>

          </ul>
          <?php if(isset($_SESSION['login_id'])): ?>
            <div class="btn-group dropleft">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-power-off"></i>Logout
              </a>
              <div class="dropdown-menu">
              
              <a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2">Logout </a>
              
                </ul>
                
              </div>
            </div>
            <?php else: ?>
          <div class="btn-group dropleft">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user mr-2"></i>Login
            </a>
            <div class="dropdown-menu">
              <a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">Sign in/Sign up</a>
              <a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="authorize_login">Authorize Login</a>
            <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
        


      </nav>

        <?php
        $page = isset($pagess) ?$pagess : "home";
        include $page.'.php';
        ?>


  <div class="modal fade" id="modal_view" role='dialog'>
    <div class="modal-dialog modal-md"  role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>

  
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
        <footer class="bg-light py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Contact us</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                  
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div><?php echo $_SESSION['setting_contact'] ?></div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:<?php echo $_SESSION['setting_email'] ?>"><?php echo $_SESSION['setting_email'] ?></a>
                    </div>
                </div>
                <!--FOR LOGO--></div></br></br>


                <div class="row">
                    <div class="col-lg-3 ml-auto text-center mb-5 mb-lg-0">
                        <img src="assets/img/updatedlogo.png" style="width: 150px"/>
                    </div>
                    <div class="col-lg-3 mr-auto text-center">
                        <img src="assets/img/cics.png"  style="width: 150px"/>
                    </div>
                </div>
            </div>
            <br>
            <div class="container"><div class="small text-center text-muted">

              Copyright © <?php echo date("Y"); ?> - <?php echo $_SESSION['setting_name'] ?> </div></div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>
<script>
	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

  window.uni_modal = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
  window.modal_view = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#modal_view .modal-title').html($title)
                $('#modal_view .modal-body').html(resp)
                if($size != ''){
                    $('#modal_view .modal-dialog').addClass($size)
                }else{
                    $('#modal_view .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#modal_view').modal('show')
                end_load()
            }
        }
    })
}

window._conf = function($msg='',$func='',$params = []){
     $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
     $('#confirm_modal .modal-body').html($msg)
     $('#confirm_modal').modal('show')
  }
   window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  $(document).ready(function(){
    $('#preloader').fadeOut('fast', function() {
        $(this).remove();
      })
  })
</script>
</html>
