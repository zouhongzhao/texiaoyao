<div class="post">
	
   <div class="span8 media top-buffer">
   	 <h3 class="media-heading clearfix title">
             	<?php if($data->type == 0){//gong
             		echo '<img src="'.Yii::app()->theme->baseUrl.'/images/gvip.gif">';
             	}if($data->type == 1){//qiu
             		echo '<img src="'.Yii::app()->theme->baseUrl.'/images/q.gif">';
             	}
             	?>
             	<?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
             	&nbsp;&nbsp;&nbsp;
             	<span class="phone tel" id="t_phone"><?php echo $data->telephone?$data->telephone:$data->author->profile()->attributes['telephone']; ?> </span>
             	<a href="<?php echo $data->url?>">
             	<i class="icon-circle addToFoo-yes-org"></i> <button class="addToFoo-org btn btn-flat pull-right"><i class="icon-plus-sign"></i> 阅读全文</button><br />
            	</a>
            </h3>

             <div class="header">
        <div class="author">
            <?php echo CHtml::encode(Yii::t('blog','posted by {username} on {create_time}',array('{username}'=>$data->author->username, '{create_time}'=>Yii::app()->dateFormatter->formatDateTime($data->create_time)))); ?>
        </div>
    </div>
    <div class="row" style="margin-bottom: 30px;">
    	
      
        <div class="media-body span6">
            
    <!-- <div class="intro">
        <?php
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
            echo $data->intro;
            $this->endWidget();
        ?>
    </div> -->
    <div class="list-content">
        <?php
       
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
            echo Functions::truncate_utf8_string($data->content,500,false).'  ...';
            $this->endWidget();
        ?>
        <!-- <p><a class="btn btn-primary btn-lg" role="button" href="<?php echo $data->url?>">阅读全文</a></p> -->
    </div>
    <!-- <div class="nav">
        <b><?php echo CHtml::encode(Yii::t('blog','Tags:')); ?></b>
        <?php echo implode(', ', $data->tagLinks); ?>
        <br/>
        <?php echo CHtml::link(Yii::t('blog','Permalink'), $data->url); ?> |
        <?php echo CHtml::link(Yii::t('blog','Comments').' ('.$data->commentCount.')',$data->url.'#comments'); ?> |
        <?php echo CHtml::encode(Yii::t('blog','Last updated on {update_time}',array('{update_time}'=>Yii::app()->dateFormatter->formatDateTime($data->update_time,'full','short')))); ?>
    </div> -->
        </div>
        
          <p class="media-object pull-left span2">
            <img class="img-polaroid" width="160" height="100" src="<?php echo $data->images?$data->images:Yii::app()->request->hostInfo . '/upload/noPic.jpg';?>">
        </p>
        
    </div>
</div>
</div>
