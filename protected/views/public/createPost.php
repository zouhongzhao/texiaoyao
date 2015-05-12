	  	 <form class="form-create-post" id="create_post_form" action="/post/create" method="post" enctype="multipart/form-data">
        <fieldset>
          <!-- <legend>Bootstrap 支持的控件          </legend> -->
          <div class="control-group ">
          	<label for="Post_type" class="control-label required">类别 <span class="required">*</span></label>
          	<div class="controls">
          		<input type="hidden" name="Post[type]" value="" id="ytPost_type">
          		<label class="radio inline">
          			<input type="radio" name="Post[type]" value="0" id="Post_type_0">
          			<label for="Post_type_0">供应</label></label>
          			<label class="radio inline"><input type="radio" name="Post[type]" value="1" id="Post_type_1">
          				<label for="Post_type_1">求购</label></label>
          	</div>
          </div>
          <div class="control-group">
            <label for="post_title" class="control-label">标题<span class="required">*</span></label>
            <div class="controls">
              <input type="text" id="post_title" name="Post[title]" class="input-xlarge">
            </div>
          </div>
          
           <div class="control-group">
            <label for="post_content" class="control-label">内容<span class="required">*</span></label>
            <div class="controls">
            	<?php $this->widget('application.extensions.wdueditor.WDueditor', array('name'=>'Post[content]','width' =>'90%',  
        'height' =>'300px','toolbars' =>array(
            'FullScreen','Source','Undo', 'Redo','Bold','map','insertimage','emotion','template','background','preview','forecolor',
            'backcolor','autotypeset','customstyle','fontfamily','fontsize','autoFloatEnabled'
        ),
		'editorOptions'=>array('maximumWords'=>'2000','zIndex'=>'1999','wordCount'=>true,'imageUrl'=>'/post/imageUp','imagePath'=>'/upload/','imageManagerUrl'=>'/post/imageManager','imageManagerPath'=>Yii::app()->request->hostInfo),
		)); ?>
            	           <!-- <textarea rows="3" id="post_content" name="Post[content]" class="input-xlarge"></textarea> -->
            </div>
          </div>
          
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
           <div class="control-group">
            <label for="post_address" class="control-label">详细地址</label>
            <div class="controls">
            
<textarea class="form-control span5" rows="3" id="post_address" name="Post[address]"><?php 
   				$user = User::model()->with('profile')->findbyPk(Yii::app()->user->id);
            		echo $user->profile()->attributes['address'];	
            	?></textarea>

            </div>
          </div>
          
           <div class="control-group">
            <label for="post_images" class="control-label">图片</label>
            <div class="controls">
              <input type="file" id="post_images" name="Post[images]" class="input-file">
            </div>
          </div>
          
<div class="control-group">
            <label for="post_telephone" class="control-label">联系电话</label>
            <div class="controls">
              <input type="text" id="post_telephone" name="Post[telephone]" class="input-small">
            </div>
          </div>
          <div class="control-group">
            <label for="post_contacts" class="control-label">联系人</label>
            <div class="controls">
              <input type="text" id="post_contacts" name="Post[contacts]" class="input-small">
            </div>
          </div>

          <div class="control-group">
            <label for="post_tags" class="control-label">标签<span class="required">*</span></label>
            <div class="controls">
              <input type="text" id="post_tags" name="Post[tags]" class="input-xlarge">
            </div>
          </div>
          <input type="hidden" name="Post[status]" value="2">
          <input type="hidden" name="Post[author_id]" value="2">
          <div class="form-actions">
			<button type="submit" class="btn btn-primary btn-large">发布</button>
			<button type="reset" class="btn">重置</button>
			</div>
        </fieldset>
        <input type="hidden" value="<?php echo Yii::app()->getRequest()->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" />
        </form>
        
<script>
  // $(function () {
    // $('#myTab a:last').tab('show')
  // })
    $(document).ready(function(){
    	$.ajax({
            url: '/registration/getCity/',
            success: function(data){
            	if(data == 'fail'){
            		var prov = '湖北';
            		var city = '武汉';
            		
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
    	
	   $('#create_post_form').validate(
	    {
		    rules: {
			    'Post[title]': {
			    	minlength: 2,
			    	required: true
			    },

			    'Post[content]': {
			    	minlength: 10,
			    	required: true
			    },
			    'Post[tags]': {
			    	required: true
			    }
		    },
		    highlight: function(element) {
		    	$(element).closest('.control-group').removeClass('success').addClass('error');
		    },
		    success: function(element) {
			    element
			    .text('OK!').addClass('valid')
			    .closest('.control-group').removeClass('error').addClass('success');
	    	}
	    });
	    
    }); // end document.ready
</script>
