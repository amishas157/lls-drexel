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
	//Count the no. of unread messages...
	$count = User::count_unread_messages( $_SESSION['user_id'] );
?>

<?php  
	if( isset($_GET['id'] ) )
	{
		$question = Question::find_by_id($_GET['id']); 		
		if( $question == '' )
			redirect_to('extra-404');
	}
?>

<?php
	if( isset( $_POST['submit_option'] ) )
	{
  		$survey_data_obj=  new SurveyData();
		$survey_data_obj->respondent_id = $_SESSION['user_id'];
		$survey_data_obj->question_id = $_GET['id'];
		$survey_data_obj->option_id = $_POST['user_response'];
		$survey_data_obj->create();
	}
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title>LLSCT | Respond to Survey</title>
	

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
					<i class="entypo-menu"></i>				</a>			</div>
			
									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>				</a>			</div>
			
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
	
	
	<!-- Raw Links -->
	<div class="col-md-6 col-sm-4 clearfix hidden-xs">
		
		<ul class="list-inline links-list pull-right">
			
			<!-- Language Selector -->			
			<li class="sep"></li>
			
			<li>

	              <a href="login.php?action=logout">Log Out </a> <i class="entypo-logout right"></i>
			
			</li>		
			
			
			<li class="sep"></li>
			

		</ul>
		
	</div>
	
</div>

<hr />
			
			
			<hr />
			
<!-- Main body... -->
<div>

<div class="col-sm-3">
</div>
<!-- div for question -->
<?php
$count=0;
if( isset($_GET['id'] ) )
{
$question = Question::find_by_id($_GET['id']);

$survey_array=SurveyData::find_all();
$option_array = Option::find_all();
foreach($option_array as $opt)
{
	if($opt->question_id==$question->question_id)
	{
	$count++;
	}
}
$counter=1;
$arr = array_fill($counter,$count,0);

foreach($survey_array as $survey)
{
  if($survey->question_id==$question->question_id)
   {
	$arr[$survey->option_id]++;
	$option = Option::find_by_option_question($survey->option_id,$survey->question_id);
	
   }
}

}
?>
<div> 
<div class="col-sm-1">
</div>
<?php

	if( ! isset( $_POST['submit_option'] ) )
	{
		?>

		<form method="post" action="respond-survey.php?id=<?php echo $_GET['id']; ?>">
			<div class="row">
				<div class="col-sm-5">
					<div class="tile-block tile-red" id="todo_tasks" >
						
						<div class="tile-header">
								<h3>   <?php echo $question->topic ?>       </h3>
								<span> <?php echo $question->description ?> </span>
						</div>
						
					  	<div class="tile-content">
							
						<h3><?php echo $question->question_content ?></h3>
							
							<div class="panel-body">
								<div class="form-group">
									<div class="col-sm-15>
										<div class="bs-example">
															
															
												<?php  
													$num=0;
													$options = Option::find_by_question($question->question_id);
													
													foreach($options as $option)
													{
													 $num++;
													?>
														
																<div >
																	<label><?php echo $option->option_content ; ?></label>
																	<label><?php echo "    |=>" ;?></label>
																	<label><?php echo $arr[$num]; ?></label>
																</div>	
																
													<?php 
													} 
												?>	
											
										</div>
									</div>		
								</div>
							</div>
							<!-- End of <div class="panel-body"> -->
						
				
							
				
						</div>
					</div>
				</div>
			</div>
		</form>
	
		<?php
	}			//Closing 'if'...
	else		//Display message of either Success of Failure...
	{
	  ?>
		<div>
				<!-- Leave space before the button -->
				<div class="col-md-0"></div>
				
				<div>
					<button type="button" class="btn btn-success col-md-4">Response submitted succesfully.</button>
				</div>
				
				<!-- Leave space before the button -->
				<div class="col-md-1"></div>
				
				<div>
					<button type="button" class="btn btn-info col-md-4" onClick="window.location.assign('respond-survey.php')">Check another survey</button>
				</div>
		</div>
	<?php
	}
?>

</div>
<!-- div for question ends here... -->
		<?php 
			echo FOOTER;
		?>

	<!-- Footer -->
		

</div>
<!-- Main body ends here.. -->
	





	<link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">

	<!-- Bottom Scripts -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="assets/js/neon-chat.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>
	
	<script src="assets/js/bootstrap-switch.min.js"></script>
	

</body>
</html>
