<form action="services/addComment.php" method="post">
    <div class="row">
        <div class="col-10">
            <input type="text" name="comment" id="comment">
        </div>
        <div class="col-2">
            <input type="submit" value="submit">
        </div>
    </div>
</form>
<?php
foreach ($comments as $comment) {
    include 'commentCreator.php';
}
?>