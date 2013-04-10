<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
//require_once( "../global/connectVar.php" );
require 'fb_src/src/facebook.php';

//require_once( "../../../../global/connectVar.php" );
//database connection


$db_host="localhost";
$db_username="Airstage";
$db_password="airstage0401pma";

$db_link = @mysql_connect($db_host,$db_username,$db_password);

$select_db = @mysql_select_db("Airstage");

mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT=utf8");
mysql_query("SET CHARACTER_SET_RESULTS=>utf8");


if(!$select_db){
	die("Connect db fail");
	}
else{//否則
	//echo "Connect db sucesss";
	}

if(!$db_link){
	die("Connect fail");
	}
else{
	//echo "Connect sucesss";
	}
	

//Application Configurations
$app_id		= "209856362473286";
$app_secret	= "ead0bc3668fe742cb7ab125a46303674";
$site_url	= "airstage.com.tw";
 
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => $app_id,
  'secret' => $app_secret,
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl(
  array(
		'next'	=> 'http://www.airstage.com.tw/accounts/example.php', // URL to which to redirect the user after logging out
		)
  );
} else {
  $loginUrl = $facebook->getLoginUrl(
  array(
      'scope' => 'email, user_about_me, user_birthday, user_checkins, user_education_history, user_hometown, user_interests, user_location, user_photos , user_relationships, user_relationship_details, user_status, user_website, user_work_history, user_religion_politics',
      'next' => 'http://www.airstage.com.tw/accounts/example.php',
	  //'redirect_uri' => 'http://www.airstage.com.tw/accounts/revises_fb.php' // URL to redirect the user to once the login/authorization process is complete.
	
      )
  );
}

// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');




/************Added by Liquir_ice 2013.03.27*********************/
/*
echo $_GET['stu_id'];
echo "<br>";
$get_stu_id = $_GET['stu_id'];
echo $get_stu_id;
echo "<br>";
echo $user;
echo "<br>";
*/

// Profile Pic.
//https://graph.facebook.com/674585248/picture?width=140&height=110
//$fb_pic = 'https://graph.facebook.com/.'echo $user'./picture'
//https://graph.facebook.com/674585248/picture
//https://graph.facebook.com/674585248/picture?type=large 	square
//https://graph.facebook.com/USER_ID/picture?width=140&height=110

/****Insert Facebook Picture***/
/*
$fb_img_url = 'https://graph.facebook.com/'.$user.'/picture?type=large';
$fb_img_file = dirname(dirname(__FILE__)).'/member/images/'.$_GET['stu_id'].'/member/'.$_GET['stu_id'].'_profile_pic.jpg';

	//$image = file_get_contents(urlencode($fb_img_url));
	if (empty($fb_img_url)) {
	    echo " Error if the image is empty/not accessible.";
	    //exit;
	}
	else{
		file_put_contents($fb_img_file, file_get_contents($fb_img_url));
	}


echo "<br>";
$query_fb_profile_pic = "UPDATE member_Info SET profile_pic = '".$_GET['stu_id']."_profile_pic.jpg' WHERE stu_id = '".$_GET['stu_id']."'";
if (!mysql_query($query_fb_profile_pic)){
  						die('Error: ' . mysql_error());
  						echo "Somthing is wrong";
 						}
else{
	//echo "<br>";
	//echo "增加1筆記錄。 1 record added",$query_fb_profile_pic;
	//echo "<br>";
	//echo '<p>你已註冊。<br/>You are now registered.</p>';	
	}					
	*/
/****Insert Facebook Picture end***/							

/*
echo "<br>";
echo $user;
echo "<br>";
echo __FILE__;
echo "<br>";
echo dirname(__FILE__);
echo "<br>";
echo dirname(dirname(__FILE__));
*/

/*<img src="https://graph.facebook.com/<?php echo $user; ?>/picture">*/

				






?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
  	<!--
    <h1>php-sdk</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>
	-->
    

    
	<?php 

		/*
		$user_info = array($user_profile);
		
		
		
		
		foreach ($user_info as $key => $value) {
   			echo $key." - ".$value."<br>";			
		}
		
		
		
		
		
		function flatten($array) {
    		if (!is_array($array)) {
        	// nothing to do if it's not an array
        	return array($array);
    		}

		    $result = array();
		    foreach ($array as $value) {
		        // explode the sub-array, and add the parts
		        $result = array_merge($result, flatten($value));
		    }

    		return $result;
		}

foreach ($user_info as $key => $value) {
   			echo $key." - ".$value."<br>";			
		}

$result_array = array();
foreach (flatten($user_info) as $key => $value) {
   echo $key." - ".$value."<br>";
   $array_data = array($value); // create a variable to hold the information   
   array_push($result_array, $value);
}*/
//print_r($result_array);// print result

		echo "<br>";	
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		//echo "$result_array[0]";
//var_dump($result_array);
		//$query = "INSERT INTO member_fb_info (fb_id, fb_name,fb_first_name,fb_last_name,fb_link,fb_username,fb_email) VALUES'('$result_array[0]','$result_array[1]','$result_array[2]','$result_array[3]','$result_array[4]','$result_array[5]','$result_array[6]','$result_array[7]');";
		



		//change birthday style
		$fb_explode_Bday = explode("/", $user_profile['birthday']);
		$fb_Bday = $fb_explode_Bday[2] .'-'. $fb_explode_Bday[0] .'-'. $fb_explode_Bday[1];
		//echo $fb_Bday;
		//'1989' .'-'. '05' .'-'. '06';
		function value_implode($value1,$value2,$value3){
			$fb_result = array($value1, $value2, $value3);
			$fb_result_array = implode(",", $fb_result);
			return $fb_result_array;
			}
		$fb_work = value_implode($user_profile[work][0][employer][name],$user_profile[work][1][employer][name],$user_profile[work][2][employer][name]);
		$fb_favorite_teams =  value_implode($user_profile[favorite_teams][0][name],$user_profile[favorite_teams][1][name],$user_profile[favorite_teams][2][name]);
		$fb_favorite_athletes = value_implode($user_profile[favorite_athletes][0][name], $user_profile[favorite_athletes][1][name], $user_profile[favorite_athletes][2][name]);
		$fb_education = value_implode($user_profile[education][0][school][name],$user_profile[education][1][school][name],$user_profile[education][2][school][name]);

		
		
		
		echo "<br>";	
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		$sql = "INSERT INTO `member_fb_info` (
		stu_id,
		fb_id, 
		fb_name,
		fb_first_name,
		fb_last_name,
		fb_link,
		fb_username,
		fb_birthday,
		fb_location,
		fb_bio,
		fb_quotes,
		fb_work,
		fb_favorite_teams,
		fb_favorite_athletes,
		fb_education,
		fb_gender,
		fb_relationship_status,
		fb_relationship_partner,
		fb_religion,
		fb_political,
		fb_email,
		fb_personal_website,
		fb_timezone,
		fb_locale,
		fb_updated_time) VALUES (
		'".$_GET['stu_id']."',
		'".mysql_real_escape_string($user_profile['id'])."',
		'".mysql_real_escape_string($user_profile['name'])."',
		'".mysql_real_escape_string($user_profile['first_name'])."',
		'".mysql_real_escape_string($user_profile['last_name'])."',
		'".mysql_real_escape_string($user_profile['link'])."',
		'".mysql_real_escape_string($user_profile['username'])."',
		'".$fb_Bday."',
		'".mysql_real_escape_string($user_profile['location']['name'])."',
		'".mysql_real_escape_string($user_profile['bio'])."',
		'".mysql_real_escape_string($user_profile['quotes'])."',
		'".mysql_real_escape_string($fb_work)."',
		'".mysql_real_escape_string($fb_favorite_teams)."',
		'".mysql_real_escape_string($fb_favorite_athletes)."',
		'".$fb_education."',
		'".$user_profile['gender']."',
		'".mysql_real_escape_string($user_profile['relationship_status'])."',
		'".mysql_real_escape_string($user_profile['significant_other']['name'])."',
		'".mysql_real_escape_string($user_profile['religion'])."',
		'".mysql_real_escape_string($user_profile['political'])."',
		'".mysql_real_escape_string($user_profile['email'])."',
		'".mysql_real_escape_string($user_profile['website'])."',
		'".$user_profile['timezone']."',
		'".$user_profile['locale']."',
		'".$user_profile['updated_time']."')";

		if (!mysql_query($sql)){
  									die('Error: ' . mysql_error());
  									echo "Somthing is wrong";
 								 	}
		else{
			//echo "增加1筆記錄。 1 record added",$sql;
			//echo '<p>你已註冊。<br/>You are now registered.</p>';
			//header("Location: http://www.airstage.com.tw/accounts/revises_fb.php");
			echo "<script>window.location = 'http://www.airstage.com.tw/accounts/revises.php'</script>";
			//header("Location:register_success.php");
			}

		
/*		
echo $user_profile['id'].'<br>';
echo $user_profile['name'].'<br>';
echo $user_profile['first_name'].'<br>';
echo $user_profile['last_name'].'<br>';
echo $user_profile['link'].'<br>';
echo $user_profile['username'].'<br>';
echo $user_profile['birthday'].'<br>';
echo $user_profile['location']['name'].'<br>';
echo $user_profile[work][0][employer][name].'<br>';
echo $user_profile[favorite_teams][0][name].'<br>';
echo $user_profile[favorite_athletes][0][name].'<br>';
echo $user_profile[education][0][school][name].'<br>';
echo $user_profile['gender'].'<br>';
echo $user_profile['interested_in'][0].'<br>';
echo $user_profile['relationship_status'].'<br>';
echo $user_profile['significant_other']['name'].'<br>';
echo $user_profile['email'].'<br>';
*/

  
	?>
    </br>
    
    <br>
        
  </body>
</html>
