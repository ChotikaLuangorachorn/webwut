<?php
echo "<div class='comment-box'>
    <div class='row'>
    <div class='col-3' id='comment-user'>
        <a href='profile.php?user=".$comment->name."'>".$comment->name."</a>
    </div>
    <div class='col-3' id='comment-date'>
        <p>".$comment->date."</p>
    </div>
    </div>
    <div class='row'>
        <div class='col-3' id='comment-user'>
            <a href='profile.php?user=".$comment->name."'>".$comment->name."</a>
        </div>
        <div class='col-3' id='comment-date'>
            <a href='profile.php?user=".$comment->name."'>".$comment->name."</a>
        </div>
        <div class='col-86' id='comment-detail'>
            <p>".$comment->comment."</p>
        </div>
    </div>
</div>";
?>