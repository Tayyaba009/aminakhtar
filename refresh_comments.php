<?php
include_once('config.php');

if(isset($_GET['video_id'])){


    $db->where('VideoId', $_GET['video_id']);

    $listdata1 = $db->get("comentswdetail");
    foreach($listdata1 as $row1) {   
        echo '<h6  id="cm-'. $row1['CommentId']. '">'.$row1['ConsumerUserName'].' &nbsp;&nbsp;<small>Posted On: '. $row1['Create_at']. '</small></h6>';
         echo '<p>'. htmlspecialchars($row1['Comment']). '</p>';
        
           }
       }
    ?>