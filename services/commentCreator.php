<?php
echo "

<div class='comment-box'>

<div class='container'>
    <div class='row'>
        <div class='col-2' id='comment-user'>
            <a href='profile.php?user=".$comment->name."'>".$comment->name."</a>
        </div>
        <div class='col-10'>
            <div class='row' id='comment-detail'>   
                <div class='col-12'>
                    <p>".$comment->comment."</p>
                </div>
            </div>

            <div class='row' id='comment-detail'>  
                <div class='col-12' id='comment-date'>
                    Date: ".$comment->date."
                </div>
            </div>
        </div>    
    </div>
    </div>
 
</div>
";
?>