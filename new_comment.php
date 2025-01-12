<?php 
include_once('config.php');

if (isset($_POST['video_id']) && isset($_POST['comment'])){


	$data = Array(
		  'UserId'	=>$_POST['userid'],
		  'VideoId'	=>$_POST['video_id'],
		  'Comment'	=>$_POST['comment'],
	  	'Create_at' => date('Y-m-d')
		  );
		  

		$db->insert('creatorcomments', $data);
	
}else{
    error_log("Invalid request or missing data.");
}

?>