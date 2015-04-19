
        <div style="border: 1px solid #ccc;">
            <?php foreach((array)$chat as $item): ?>
            <p>
                <?php echo $item['username']; ?> [<?php echo $item['send_date']; ?>]:<br>
                    <?php echo $item['content']; ?>
            </p>
            <hr>
            <?php endforeach; ?>
            <p style="text-align: right; padding-right: 100px;"><a href="<?php echo Yii::app()->baseUrl; ?>">Return</a></p>
        </div>