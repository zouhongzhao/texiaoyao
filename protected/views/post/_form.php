<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'post-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
     'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'form-create-post'),
    'focus'=>array($model,$model->isNewRecord ? 'title' : 'intro'),
)); ?>

    <p class="note"><?php printf(CHtml::encode(Yii::t('site', 'Fields with %s are required.')), '<span class="required">*</span>'); ?></p>

    <?php echo CHtml::errorSummary($model); ?>
	<?php echo $form->radioButtonListInlineRow($model, 'type', array(
        '供应',
        '求购',
    )); ?>
    
    <?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>128)); ?>
        
  
        
             
    <div class="control-group">
        <?php echo CHtml::activeLabelEx($model,'content',array('class'=>'control-label')); ?>
        <div class="controls">
            <?php 
           $this->widget('application.extensions.wdueditor.WDueditor',
                array(
                	 'model'=>$model,
            		'attribute'=>'content',
            		'editorOptions'=>array('maximumWords'=>'2000','wordCount'=>true,'imageUrl'=>'/post/imageUp','imagePath'=>'/upload/','imageManagerUrl'=>'/post/imageManager','imageManagerPath'=>Yii::app()->request->hostInfo),
                    'toolbars' =>array(
            'FullScreen','Source','Undo', 'Redo','Bold','map','insertimage','emotion','template','background','preview','forecolor',
            'backcolor','autotypeset','customstyle','fontfamily','fontsize','autoFloatEnabled'
        )
                    )
                ); 
          ?>
            <?php echo CHtml::error($model,'content'); ?>    
        </div>
    </div>
    <?php 
     if($model->isNewRecord){
   		$user = User::model()->with('profile')->findbyPk(Yii::app()->user->id);
        	$address =  $user->profile()->attributes['address'];	
        	$area = $user->profile()->attributes['area'];	
      }else{
      		$address = '';
      		$area = '';
      }
    
    ?>
    <div class="control-group ">
					<label for="Profile_lastname" class="control-label required">所在地区</label>
					<div class="controls">
						<div id="city_4">
					  		<select class="prov" name="Area[prov]"></select> 
					    	<select class="city" disabled="disabled" name="Area[city]"></select>
					        <select class="dist" disabled="disabled" name="Area[dist]"></select>
						</div>
						</div>
					</div>
     <div class="control-group ">
   	<label for="Post_address" class="control-label required">详细地址</label>
   	<div class="controls">
   		<textarea class="form-control span5" rows="3" id="post_address" name="Post[address]"><?php 
            		echo $address;?></textarea>
   	</div>
   </div>     
   
     <div class="control-group">
            <label for="post_images" class="control-label">图片</label>
            <div class="controls">
            	<?php if(!$model->isNewRecord){
            		echo '<img src="'.$model->attributes['images'].'" width="160" height="100" alt="" class="img-circle">';	
            	}?>
            	<input type="hidden" name="Post[old_images]" value="<?php echo $model->attributes['images'];?>">
              <input type="file" id="post_images" name="Post[images]" class="input-file">
            </div>
     </div>
<?php echo $form->textFieldRow($model,'telephone',array('class'=>'span5','maxlength'=>15)); ?>
<?php echo $form->textFieldRow($model,'contacts',array('class'=>'span5','maxlength'=>15)); ?>

    <div class="control-group">
        <?php echo $form->labelEx($model,'tags',array('class'=>'control-label required')); ?>
        <div class="controls">
        <?php $this->widget('CAutoComplete', array(
            'model'=>$model,
            'attribute'=>'tags',
            'url'=>array('suggestTags'),
            'multiple'=>true,
            'htmlOptions'=>array('class'=>'span5'),
        )); ?>
        <p class="hint"><?php echo Yii::t('site','Please separate different tags with commas.')?></p>
        <?php echo $form->error($model,'tags'); ?>
        </div>
    </div>

    <?php echo $form->dropDownListRow($model,'status',Lookup::items('PostStatus')); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'icon'=>'ok', 'label'=>$model->isNewRecord ? Yii::t('site','Create') : Yii::t('site','Save'))); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'repeat', 'label'=>Yii::t('site','Reset'))); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
var area = '<?php echo $area?>';
$(function(){
	$.ajax({
            url: '/registration/getCity/',
            success: function(data){
            	if(data == 'fail'){
            		if(area != ''){
            			area = area.split(",");
            			console.log(area);
            			var prov = area[0];
            			var city = area[1];
            		}else{
            			var prov = '湖北';
            			var city = '武汉';
            		}
            		
            	}else{
            		data=eval("("+data+")");
            		var prov = data.region;
            		var city = data.city;
            	}
             	
             	$("#city_4").citySelect({
			    	prov:prov, 
			    	city:city,
					dist:"",
					nodata:"none"
			   }); 
            }
    }); 
	
	
	
	});
</script>