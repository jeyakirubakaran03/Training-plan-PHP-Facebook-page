<?php
// **********************************************
// *              Fetch post                    *
// **********************************************

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "database.php";

if(!isset($_SESSION['user_id'])){
    echo "<script> alert('You must log in first!'); window.location.href='index.php'; </script>";
    exit();
}

$sql = "SELECT tw.post, tw.posting_date, tu.name
        FROM 
        tWall tw JOIN tUser tu ON tw.user_id = tu.user_id
        ORDER BY tw.posting_date DESC";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '<div class="post-section">';
            echo '<div class="post-section-header d-flex justify-content-between align-items-center">';
                echo '<div class="d-flex align-items-center">';
                    echo '<i class="bi bi-person-circle post-user-profile-img"></i>';
                    echo '<div class="ms-2">';
                        echo '<strong>'. htmlspecialchars($row['name']) .'</strong> <br>';

                        $posting_time = strtotime($row['posting_date']);
                        $current_time = time();
                        $diff = $current_time-$posting_time;

                        if($diff < 60){
                           echo "<small> Just now </small>"; 
                        }
                        elseif($diff < 3600){
                            $mins = floor($diff/60);
                            echo "<small> {$mins} min" . ($mins > 1 ? "s":"") . " ago</small><br>";
                        }
                        elseif($diff < 7600){
                            $hours = floor($diff/3600);
                            echo "<small>{$hours} hour" . ($hours > 1 ? "s":""). " ago</small><br>";
                        } 
                        else{
                            echo '<small>' . date("d F \a\\t H:i", strtotime($row['posting_date'])) . '</small>'. '<br> ';
                        }
                    echo '</div>';
                echo '</div>';
                echo '<i class="bi bi-three-dots post-section-header-btn"></i>';
            echo '</div>';
            echo '<div class="post">';
                echo htmlspecialchars($row['post']) . '<br>';
            echo '</div>';
            
            $likes = rand(1000, 1000000);
            $comments = rand(100, 1000);
            $shares = rand(10, 500);

            echo '<div class="post-counts">';
                echo "<span> <i class='bi bi-hand-thumbs-up-fill likes-icon'></i><i class='bi bi-heart-fill heart-icon'></i>" . ($likes >= 1000 ? round($likes/1000, 1) . "K" : $likes) . "</span>";
                echo '<div class="comments-share">';
                    echo "<span class='px-3'>{$comments} comments </span>";
                    echo "<span>   {$shares} shares</span>";
                echo '</div>';
            echo '</div>';

            echo '<div class="post-action">';
                echo '<button class="action-btn"><i class="bi bi-hand-thumbs-up action-icons"></i>Like</button>';
                echo '<button class="action-btn"><i class="bi bi-chat-left action-icons"></i>Comment</button>';
                echo '<button class="action-btn"><i class="bi bi-share action-icons"></i>Share</button>';
            echo '</div>';
            

        echo '</div>';
    }
}
else{
    echo "<div class='post-section'> No Post Yet..! </div>";
}


?>