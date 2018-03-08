<?php
    include("./config.php");
    // id ของ User ที่ Login
    $statement = $connection->query('SELECT * FROM personal_message WHERE toID="1" ORDER BY timestamp DESC');
    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
?>      <div style="padding-bottom: 10px;">
            <div style="width: 500px;height: 50px; background-color: lightblue; padding: 1em;">
                <span>Form ID: <?php echo $row['fromID'];?></span>
                <span style="float: right;"><?php echo date('d F, Y',strtotime($row['timestamp']));?> (<?php echo date('h:m A',strtotime($row['timestamp']));?>)</span><br>
            </div>
            <div style="width: 500px; background-color: lightpink; padding: 1em;">
                <span><?php echo nl2br($row['message']);?></span>
                <?php 
                    if (! is_null($row['filePath'])){
                        echo '<img src="'. $row['filePath'].'" style="width: 100%;">'; }
                ?>
            </div>
        </div>
<?php
	}
?>