<?php
	session_start();

	if(isset($_POST['changeOption']))
	{
		$disabledSubmit = $_POST['disabledSubmit'];
		if($disabledSubmit == 1) $js = 'disabledSubmit:true';
		else $js = 'disabledSubmit:false';
		
		$autoRevert = $_POST['autoRevert'];
		if($autoRevert == 1) $js .= ',autoRevert:true';
		else $js .= ',autoRevert:false';
	}
	else
	{
		$disabledSubmit = 2;
		$autoRevert = 1;
		$js = 'disabledSubmit:false,autoRevert:true';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="favicon.ico" />
	

	
	<link rel="stylesheet" href="jquery/QapTcha.jquery.css" type="text/css" />
	
	<style type="text/css">
		form{margin:30px;width:300px}
		label{float:left;clear:both;width:100px;margin-top:10px}
		select, input{float:left;margin-top:10px}
		label.large{width:150px}
		.clr{clear:both}
		.notice {background-color:#d8e6fc;color:#35517c;border:1px solid #a7c3f0;padding:10px;margin-top:10px;}
		
		.code {
			margin:30px;
			border:1px solid #F0F0F0;
			background-color:#F8F8F8;
			padding:10px;
			color:#777;
		}
	</style>
</head>
<body>
<h1>QapTcha Plugin</h1>

<?php

	// if form is submit
	if(isset($_POST['submit']))
	{
		$response = '<div class="notice">';
		
		/** SESSION CONTROL **/
		if(isset($_SESSION['qaptcha_key']) && !empty($_SESSION['qaptcha_key']))
		{
			$QaptChaInput = $_SESSION['qaptcha_key']; 
			
			/** we can control the random input grace to the QapTchaToTest intpu value **/
			if(isset($_POST[''.$QaptChaInput.'']) && empty($_POST[''.$QaptChaInput.'']))
				$response .= 'Form can be submited';
			else
				$response .= '$_POST not empty or unexists';
		}
		else
			$response .= 'No SESSION.. Form can not be submitted...';
			
		$response .= '</div>';
		echo $response;
		
		/** Unset SESSION in all cases **/
		unset($_SESSION['qaptcha_key']);
	}
?>

<form method="post" action="">
	<fieldset>
		<label>First Name</label> <input type="text" name="firstname" />
		<label>Last Name</label> <input type="text" name="lastname" />
		<div class="clr"></div>
		
		<div class="QapTcha"></div>
		<input type="submit" name="submit" value="Submit form" />
	</fieldset>
</form>

<form method="post" action="">
	<fieldset>
		<label class="large">Disabled submit button</label>
		<select name="disabledSubmit">
			<option value='1' <?php if($disabledSubmit == 1) echo 'selected="selected"';?>>Yes</option>
			<option value='2' <?php if($disabledSubmit == 2) echo 'selected="selected"';?>>No</option>
		</select>
		<br /><br />
		<label class="large">AutoRevert</label>
		<select name="autoRevert">
			<option value='1' <?php if($autoRevert == 1) echo 'selected="selected"';?>>Yes</option>
			<option value='2' <?php if($autoRevert == 2) echo 'selected="selected"';?>>No</option>
		</select>
		<input type="submit" name="changeOption" value="change Option">
	</fieldset>
</form>

<div class="code">
<pre>
<?php
echo htmlentities('<!-- JS -->
<script type="text/javascript">
  $(document).ready(function(){
	$(\'.QapTcha\').QapTcha();
  });
</script>');
?>
</pre>
</div>



<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery-ui.js"></script>
<script type="text/javascript" src="jquery/jquery.ui.touch.js"></script>
<script type="text/javascript" src="jquery/QapTcha.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.QapTcha').QapTcha({<?php echo $js;?>});
	});
</script>

</body>
</html>
