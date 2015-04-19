<div class="post">
    <div class="header">
        <div class="title">
            <?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
        </div>
        <div class="author">
            <?php echo CHtml::encode(Yii::t('blog','posted by {username} on {create_time}',array('{username}'=>$data->author->username, '{create_time}'=>Yii::app()->dateFormatter->formatDateTime($data->create_time,'full','short')))); ?>
        </div>
    </div>
    <div class="intro">
        <?php
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
            echo $data->intro;
            $this->endWidget();
        ?>
    </div>
    <div class="content">
        <?php
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
            echo $data->content;
            $this->endWidget();
        ?>
    </div>
    <div class="nav">
        <b><?php echo CHtml::encode(Yii::t('blog','Tags:')); ?></b>
        <?php echo implode(', ', $data->tagLinks); ?>
        <br/>
        <?php echo CHtml::link(Yii::t('blog','Permalink'), $data->url); ?> |
        <?php echo CHtml::link(Yii::t('blog','Comments').' ('.$data->commentCount.')',$data->url.'#comments'); ?> |
        <?php echo CHtml::encode(Yii::t('blog','Last updated on {update_time}',array('{update_time}'=>Yii::app()->dateFormatter->formatDateTime($data->update_time,'full','short')))); ?>
    </div>
</div>
