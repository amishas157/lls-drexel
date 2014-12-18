<!DOCTYPE html>
<html lang="en">

<?php
	require_once('includes/initialize.php');
?>

<?php
	//Load Session details...
	if (! $session->is_logged_in() )
		session_start();
	
	if( ! isset($_SESSION['user_id']) )
		redirect_to('login.php?msg=Please Log-in first.');
		$user=User::find_by_id($_SESSION['user_id']);
?>
<?php
	$path = 'assets/images/profile_pic/' . $user->profile_pic;
	echo( 
		envapi_get_html_for_reg_user(
			'176644-3EaSQ9JhWGaxqDH2EJ91XS3smNIPajiD', 
			$user->first_name, 
			$user->last_name, 
			$path,
			false, 
			"HI")
	);
?>



<?php
	if( isset( $_POST['submit'] ) )
	{
  		$user=  new User();
		$user->id = $_SESSION['user_id'];
		$user->first_name = $_POST['first_name'];
		$user->last_name = $_POST['last_name'];
		$user->contact_no= $_POST['contact_no'];
		$user->skype_id= $_POST['skype_id'];
		$user->linked_url= $_POST['linked_url'];
		$user->position= $_POST['position'];
		$user->email= $_POST['email'];
		$user->update();
		redirect_to("mailbox/inbox?msg=Profile edited successfully");
	    	
	}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title>LLSCT | Edit Profile</title>
	

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
	
	<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="index.html">
					<img src="assets/images/logo@2x.png" width="120" alt="" />
				</a>
			</div>
			
			
						<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		
		
				
		
				
		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			
			<!-- Search Bar -->
			
				
			<li class="active opened active">
				
			<li class="active">
				<a href="mailbox/inbox">
					<i class="entypo-mail"></i>
					<span>Mailbox</span>
					<span class="badge badge-secondary"></span>
				</a>
			</li>
			
			<li>
				<a href="extra-calendar">
					<i class="entypo-calendar"></i>
					<span>Calendar</span>
				</a>
            	<ul>
					<li>
						<a href="my-calendar">
							<span>My Calendar</span>
							<span class="badge badge-secondary badge-roundless"></span>
						</a>
					</li>
					<li>
						<a href="public-calendar">
							<span>Public Calendar</span>
							<span class="badge badge-secondary badge-roundless"></span>
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="add-user">
					<i class="entypo-user-add"></i>
					<span>Add new User</span>
				</a>
			</li>
			<li>
				<a href="team-lls">
					<i class="entypo-users"></i>
					<span>Team LLS</span>
				</a>
			</li>
			<li>
				<a href="">
					<i class="entypo-chart-bar"></i>
					<span>Survey</span>
				</a>
				<ul>
					<li>
						<a href="create-survey">
							<span>Create Survey</span>
							<span class="badge badge-secondary badge-roundless"></span>
						</a>
					</li>
					<li>
						<a href="list-survey">
							<span>List Survey</span>
							<span class="badge badge-secondary badge-roundless"></span>
						</a>
					</li>
				</ul>
				<ul>
					<li>
						<a href="edit-survey">
							<span>Edit Survey</span>
							<span class="badge badge-secondary badge-roundless"></span>
						</a>
					</li>
					<li>
						<a href="view-response">
							<span>View Responses</span>
							<span class="badge badge-secondary badge-roundless"></span>
						</a>
					</li>
				</ul>

				
				
				
			</li>
			<!--		May not need this...
			<li>
				<a href="extra-blank-page">
					<i class="entypo-chart-bar"></i>
					<span>About LLS</span>
				</a>
			</li>
			-->
			<li>
				<a href="about-lls">
					<i class="entypo-feather"></i>
					<span>About LLS Collaboration Tool</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="entypo-drive"></i>
					<span>Document Sharing</span>
				</a>
				<ul>
					<li>
						<a href="drive-upload">
							<i class="entypo-flow-line"></i>
							<span>Upload</span>
						</a>
					</li>
					<li>
						<a href="view-private-drive">
							<i class="entypo-flow-line"></i>
							<span>My Documents</span>
						</a>
					</li>
					<li>
						<a href="view-public-drive">
							<i class="entypo-flow-line"></i>
							<span>Public Documents</span>
						</a>
					</li>
				</ul>
			</li>
				
	</div>	
	<!-- Sidebar ends... -->
	
	
	<div class="main-content">
		
<div class="row">
	
	<!-- Profile Info and Notifications -->
	<div class="col-md-6 col-sm-8 clearfix">
		
		<ul class="user-info pull-left pull-none-xsm">
		
						<!-- Profile Info -->
			<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
				
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					           <img src="assets/images/profile_pic/<?php echo $user->profile_pic;?>" width="44" height="44" class="img-circle"  />
					<?php   
						echo $user->get_full_name();
					?>
				</a>
				
				<ul class="dropdown-menu">
					
					<!-- Reverse Caret -->
					<li class="caret"></li>
					
					<!-- Profile sub-links -->
					<li>
						<a href="edit-profile">
							<i class="entypo-user"></i>
							Edit Profile
						</a>
					</li>
					
					<li>
						<a href="edit-password">
							<i class="entypo-lock"></i>
							Edit Password
						</a>
					</li>
					
					<li>
						<a href="upload-pic">
							<i class="entypo-user"></i>
							Edit Picture
						</a>
					</li>
					
					
				</ul>
			</li>
		
		</ul>
				
		
		
	</div>
	
		<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
		<ul class="list-inline links-list pull-right">
					
			
			
			<li class="sep"></li>
			
			<li>

	              <a href="login.php?action=logout">Log Out </a> <i class="entypo-logout right"></i>
			
			</li>
		</ul>
		
	</div>
	
</div>

<hr />

<div class="profile-env">
	
	<header class="row">
		
		<div class="col-sm-2">
			
			<a href="#" class="profile-picture">
				<img src="assets/images/profile_pic/<?php echo $user->profile_pic;?>" class="img-responsive img-circle" />
		</a>
			
		</div>
		
		<div class="col-sm-7">
			
			<ul class="profile-info-sections">
				<li>
					<div class="profile-name">
						<strong>
							<a href="#">Vivek Joshi</a>
							<a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Online"></a>
							<!-- User statuses available classes "is-online", "is-offline", "is-idle", "is-busy" -->						</strong>
			
					</div>
				</li>
				
			</ul>
			
		</div>
		
		
		<!-- NOT NEEDED 
		<div class="col-sm-3">
			
			<div class="profile-buttons">
				<a href="#" class="btn btn-default">
					<i class="entypo-user-add"></i>
					Follow
				</a>
				
				<a href="#" class="btn btn-default">
					<i class="entypo-mail"></i>
				</a>
			</div>
		</div>
		-->
		
	</header>
	
	<section class="profile-info-tabs">
		<div class="row">
			
			<div class="col-sm-offset-2 col-sm-10">
				
				<ul class="user-details">
					<li>
						<a href="#">
							<i class="entypo-location"></i>
							<?php echo $user->position; ?>
						</a>
					</li>
					
					<li>
						<a href="#">
							<i class="entypo-suitcase"></i>
							<span> <?php echo $user->email; ?></span>
						</a>
					</li>
					
				</ul>
				
			</div>
			
		</div>
	</section>
	
	<!-- Main section starts here.. -->
	<section class="profile-feed">
		
		<h2>Edit your profile</h2>
<br />

<div class="panel panel-primary">

	<div class="panel-heading">
		<div class="panel-title">Enter Details</div>
		
		<div class="panel-options">
			<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
		</div>
	</div>
	
	<div class="panel-body">
	
		<form role="form" id="form1" method="post" class="validate">
			
			<div class="form-group" >
				<label for="field-1" class="control-label">First Name :</label>
				<br />
				<div class="col-sm-5">
				<input type="text" class="form-control" value="<?php echo $user->first_name ;?> " name="first_name" data-validate="required" data-message-required="First Name is required for identification."/>  
				</div>
			</div>
			<br /><br /><br />
			
			<div class="form-group" >
				<label for="field-1" class="control-label">Last Name :</label>
				<br />
				<div class="col-sm-5">
				<input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name ;?> " data-validate="required" data-message-required="Last Name is required for identification."  />
				</div>
			</div>
			<br /><br /><br />
			
			
			<div class="form-group" >
				<label for="field-1" class="control-label">Email ID :</label>
				<br />
				<div class="col-sm-5">
				<input type="text" class="form-control" name="email" value="<?php echo $user->email ;?> " data-validate="required,email" />
				</div>
			</div>
			<br /><br /><br />
			
	
			<div class="form-group" >
				<label for="field-1" class="control-label">Position :</label>
				<br />
				<div class="col-sm-5">
				<input type="text" class="form-control" name="position" value="<?php echo $user->position ;?> "data-validate="required" data-message-required="This field is required." />
				</div>
			</div>
			<br /><br /><br />
			
			<div class="form-group" >
				<label for="field-1" class="control-label">Skype ID :</label>
				<br />
				<div class="col-sm-5">
				<input type="text" class="form-control" name="skype_id" value="<?php echo $user->skype_id ;?> "data-validate="required" data-message-required="Skype ID is required for inter-organization communication." />
				</div>
			</div>
			<br /><br /><br />
			
			<div class="form-group" >
				<label for="field-1" class="control-label">LinkedIn Public URL : (Including <strong>https://</strong>)</label>
				<br />
				<div class="col-sm-5">
				<input type="text" class="form-control" name="linked_url" value="<?php echo $user->linked_url ;?> " data-validate="required,url" data-message-required="Please enter a public URL of the intended user." />
				</div>
			</div>
			<br /><br /><br />
			
			<div class="form-group" >
				<label for="field-1" class="control-label">Contact Number :</label>
				<br />
				<div class="col-sm-5">
				<input type="text" class="form-control" name="contact_no" value="<?php echo $user->contact_no ;?> "data-validate="required,number,minlength[10]"/>
				</div>
			</div>
			<br /><br /><br />
			
			
			
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-success">Edit Profile</button>
				<button type="button" class="btn" onClick="window.location.assign('mailbox/inbox')">Cancel </button>
			</div>
		
		</form>
	
	</div>

	
</div>
<!-- "Add User" Ends... -->

		
		
		
	</section>
	<!-- Main section e here.. -->
</div>

<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
function initialize()
{
	var $ = jQuery,
		map_canvas = $("#sample-checkin");
	
	var location = new google.maps.LatLng(36.738888, -119.783013),
		map = new google.maps.Map(map_canvas[0], {
		center: location,
		zoom: 14,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	});
	
	var marker = new google.maps.Marker({
		position: location,
		map: map
	});
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
		<?php 
			echo FOOTER;
		?>
<!-- Footer -->

	
<div id="chat" class="fixed" data-current-user="Vivek Joshi" data-order-by-status="1" data-max-chat-history="25">
	
	<div class="chat-inner">
	
		
		<h2 class="chat-header">
			<a href="#" class="chat-close" data-animate="1"><i class="entypo-cancel"></i></a>
			
			<i class="entypo-users"></i>
			Chat
			<span class="badge badge-success is-hidden">0</span>
		</h2>
		
		
		<div class="chat-group" id="group-1">
			<strong>Favorites</strong>
			
			<a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
			<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
		</div>
		
		
		<div class="chat-group" id="group-2">
			<strong>Work</strong>
			
			<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
			<a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
			<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
		</div>
		
		
		<div class="chat-group" id="group-3">
			<strong>Social</strong>
			
			<a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
			<a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
			<a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
		</div>
	
	</div>
	
	<!-- conversation template -->
	<div class="chat-conversation">
		
		<div class="conversation-header">
			<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>
			
			<span class="user-status"></span>
			<span class="display-name"></span> 
			<small></small>
		</div>
		
		<ul class="conversation-body">	
		</ul>
		
		<div class="chat-textarea">
			<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
		</div>
		
	</div>
	
</div>


<!-- Chat Histories -->
<ul class="chat-history" id="sample_history">
	<li>
		<span class="user">Vivek Joshi</span>
		<p>Are you here?</p>
		<span class="time">09:00</span>
	</li>
	
	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>This message is pre-queued.</p>
		<span class="time">09:25</span>
	</li>
	
	<li class="opponent">
		<span class="user">Catherine J. Watkins</span>
		<p>Whohoo!</p>
		<span class="time">09:26</span>
	</li>
	
	<li class="opponent unread">
		<span class="user">Catherine J. Watkins</span>
		<p>Do you like it?</p>
		<span class="time">09:27</span>
	</li>
</ul>




<!-- Chat Histories -->
<ul class="chat-history" id="sample_history_2">
	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>I am going out.</p>
		<span class="time">08:21</span>
	</li>
	
	<li class="opponent unread">
		<span class="user">Daniel A. Pena</span>
		<p>Call me when you see this message.</p>
		<span class="time">08:27</span>
	</li>
</ul>	
	</div>




	<!-- Bottom Scripts -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/neon-chat.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>
