
<?php

include 'dbh.inc.php';

$commentNewCount = $_POST['commentsNewCount'];

$sql = "SELECT * FROM comments LIMIT 2";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row['uid'];
        $sql2 = "SELECT * FROM user WHERE id='$id'";
        $result2 = $conn->query($sql2); 
        if($row2 = $result2->fetch_assoc()) {
                echo "<div class='comment-box'><p>";
                echo $row2['uid']."<br>";
                echo $row['date']."<br>";
                echo nl2br($row['message'])."<br><br>";
            echo "</p>";
            if(isset($_SESSION['id'])){
                if($_SESSION['id'] == $row2['id']){
                    echo "<form class='delete-form' method='POST' action='".deleteComments($conn)."'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <button type='submit' name='commentDelete'>Delete</button>
                    </form>
                    <form class='edit-form' method='POST' action='editcomment.php'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <input type='hidden' name='uid' value='".$row['uid']."'>
                        <input type='hidden' name='date' value='".$row['date']."'>
                        <input type='hidden' name='message' value='".$row['message']."'>
                        <button>Edit</button>
                    </form>";
                }
            }     
                echo "</div>";
        }
        
    }

?>    