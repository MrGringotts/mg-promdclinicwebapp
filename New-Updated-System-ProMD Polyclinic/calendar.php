<?php include ('admin/db_connect.php') ?>
<link href="admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
<script src="admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
var Cal = function(divId) {

  //Store div id
  this.divId = divId;

  // Days of week, starting on Sunday
  this.DaysOfWeek = [
    'Sun',
    'Mon',
    'Tue',
    'Wed',
    'Thu',
    'Fri',
    'Sat'
  ];

  // Months, stating on January
  this.Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];

  // Set the current month, year
  var d = new Date();

  this.currMonth = '<?php echo $_GET['month'] - 1?>';
  this.currYear = '<?php echo $_GET['year'] ?>';
  this.currDay = d.getDate();

};

// Goes to next month
Cal.prototype.nextMonth = function() {
  if ( this.currMonth == 11 ) {
    this.currMonth = 0;
    this.currYear = this.currYear + 1;
  }
  else {
    this.currMonth = this.currMonth + 1;
  }
  this.showcurr();
};

// Goes to previous month
Cal.prototype.previousMonth = function() {
  if ( this.currMonth == 0 ) {
    this.currMonth = 11;
    this.currYear = this.currYear - 1;
  }
  else {
    this.currMonth = this.currMonth - 1;
  }
  this.showcurr();
};

// Show current month
Cal.prototype.showcurr = function() {
  this.showMonth(this.currYear, this.currMonth);
};

// Show month (year, month)
Cal.prototype.showMonth = function(y, m) {

  var d = new Date()
  // First day of the week in the selected month
  , firstDayOfMonth = new Date(y, m, 1).getDay()
  // Last day of the selected month
  , lastDateOfMonth =  new Date(y, m+1, 0).getDate()
  // Last day of the previous month
  , lastDayOfLastMonth = m == 0 ? new Date(y-1, 11, 0).getDate() : new Date(y, m, 0).getDate();


  var html = '<table>';

  // Write selected month and year
  html += '<thead><tr>';
  html += '<thead><tr>';
  html += '<td colspan="7">' + this.Months[m] + ' ' + y + '</td>';
  html += '</tr></thead>';


  // Write the header of the days of the week
  html += '<tr class="days">';
  for(var i=0; i < this.DaysOfWeek.length;i++) {
    html += '<td>' + this.DaysOfWeek[i] + '</td>';
  }
  html += '</tr>';

  // Write the days

  
  
  var i=1;
  do {

    var dow = new Date(y, m, i).getDay();

    // If Sunday, start new row
    if ( dow == 0 ) {
      html += '<tr>';
    }
    // If not Sunday but first day of the month
    // it will write the last days from the previous month
    else if ( i == 1 ) {
      html += '<tr>';
      var k = lastDayOfLastMonth - firstDayOfMonth+1;
      for(var j=0; j < firstDayOfMonth; j++) {
        html += '<td class="not-current"></td>';
        k++;
      }
    }

    // Write the current day in the loo
	
	
	var style = 'style="background:red"';
	
    html += '<td class="normal"'+style+' style="font-weight:bold">' + i + '</td>';
	
  
    i++;
	
	
  }while(i <= lastDateOfMonth);

  // Closes table
  html += '</table>';

  // Write HTML to the div
  document.getElementById(this.divId).innerHTML = html;
};

// On Load of the window
window.onload = function() {

  // Start calendar
  var c = new Cal("divCal");			
  c.showcurr();

  // Bind next and previous button clicks
  getId('btnNext').onclick = function() {
    c.nextMonth();
  };
  getId('btnPrev').onclick = function() {
    c.previousMonth();
  };
}

// Get element by id
function getId(id) {
  return document.getElementById(id);
}
</script>

<style>

*, *:before, *:after {
  box-sizing:border-box;
}

.group {
  &:after {
    content: "";
    display: table;
    clear: both;
  }
}

img {
  max-width:100%;
  height:auto;
  vertical-align:baseline;
}

a {
  text-decoration:none;
}

.max(@maxWidth;
  @rules) {
    @media only screen and (max-width: @maxWidth) {
      @rules();
    }
  }

.min(@minWidth;
  @rules) {
    @media only screen and (min-width: @minWidth) {
      @rules();
    }
  }


.calendar-wrapper {
  width:100%;
  border:1px solid @calendar-border;
  border-radius:5px;
  background:rgba(238,192,104, 0.5);
  margin:12px auto;
  
  
}
table {
  clear:both;
  width:100%;
  border:1px solid @calendar-border;
  border-radius:3px;
  border-collapse:collapse;
  color:@calendar-color;
}
td {
  height:48px;
  text-align:center;
  vertical-align:middle;
  border-right:1px solid @calendar-border;
  border-top:1px solid @calendar-border;
  width:100% / 7;
}
td.not-current {
  color:@calendar-fade-color;;
}
td.normal {}
td.today {
  font-weight:700;
  color:@calendar-standout;
  font-size:1.5em;
}
thead td {
  border:none;
  color:@calendar-standout;
  text-transform:uppercase;
  font-size:1.5em;
}
#btnPrev {
  float:left;
  margin-bottom:20px;
  &:before {
    content:'\f104';
    font-family:FontAwesome;
    padding-right:4px;
  }
}
#btnNext {
  float:right;
  margin-bottom:20px;
  &:after {
    content:'\f105';
    font-family:FontAwesome;
    padding-left:4px;
  }
}
#btnPrev, #btnNext {
  background:transparent;
  border:none;
  outline:none;
  font-size:1em;
  color:@calendar-fade-color;
  cursor:pointer;
  font-family:"Roboto Condensed", sans-serif;
  text-transform:uppercase;
  transition:all 0.3s ease;
  &:hover {
    color:@calendar-standout;
    font-weight:bold;
  }
}

</style>
<!-- typography -->
<section id="lt-feature" class="sppb-section  lt-feature"  >
										<div class="sppb-row-container">
											<div class="sppb-row">
											
												
												<div class="sppb-col-md-4">
													<div id="column-id-1541144505055" class="sppb-column sppb-wow fadeInRight"  data-sppb-wow-duration="300ms">
														<div class="sppb-column-addons">
															<div id="sppb-addon-1541144505060" class="clearfix" >
																<div class="sppb-addon sppb-addon-text-block 0 sppb-text-left lt-title">
																	<div class="sppb-addon-content">
																	
																	</br>
																		<div class="calendar-wrapper">
																		  <a href="calendar.php?month=<?php if($_GET['month'] == 1){echo '12&year='; echo $_GET['year'] - 1 ; }else{ echo $_GET['month'] - 1 .'&year='. $_GET['year']; } ?>"><button id="btnPrev" type="button" >Prev</button></a>
																		  <a href="calendar.php?month=<?php if($_GET['month'] == 12){echo '1&year='; echo $_GET['year'] + 1 ; }else{ echo $_GET['month'] + 1 .'&year='. $_GET['year']; } ?>"><button id="btnNext" type="button" >Next</button></a>
																		  <div id="divCal"></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												
												
											</div>
										</div>
									</section><br>



	<div class="typography services-w3layouts">
				<div class="container">
				
						<div class="mid" id="mid">
								<div class="col-md-6 " style="margin:12px auto; border-radius:5px">
									
									
								</div>
								<div class="col-md-6">
									<center>
										
									<center>
								</div>
								
								<div class="clearfix"></div>
						</div>
							
						
				</div>
	</div>

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
		
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->


<!-- script-for-menu -->
					<script>					
						$("span.menu").click(function(){
							$(".top-nav ul").slideToggle("slow" , function(){
							});
						});
					</script>
					<!-- script-for-menu -->
