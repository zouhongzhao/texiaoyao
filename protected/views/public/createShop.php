 <form class="form-create-post" id="create_shop_form" action="/shop/create" method="post" enctype="multipart/form-data">
        <fieldset>
          <!-- <legend>Sample Contact Form <small>(will not submit any information)</small></legend>-->
          <div class="control-group">
            <label for="shop_name" class="control-label">药名</label>
            <div class="controls">
              <input type="text" name="Shop[name]" class="input-xlarge" id="shop_name" >
              <!-- <p class="help-block">帮助提示的文字可以在这里~~</p> -->
            </div>
          </div>
          
           <div class="control-group">
            <label for="shop_content" class="control-label">描述</label>
            <div class="controls">
              <textarea rows="3" id="shop_content" name="Shop[content]" class="input-xlarge"></textarea>
            </div>
          </div>
          
           <div class="control-group">
            <label for="shop_original_price" class="control-label">原价</label>
            <div class="controls">
              <input type="text" id="shop_original_price" name="Shop[original_price]"class="input-xlarge">
            </div>
          </div>
          
          <div class="control-group">
            <label for="shop_price" class="control-label">促销价</label>
            <div class="controls">
              <input type="text" id="shop_price" name="Shop[price]" class="input-xlarge">
            </div>
          </div>
          
           <div class="control-group">
            <label for="shop_url" class="control-label">url地址</label>
            <div class="controls">
              <input type="text" id="shop_url" name="Shop[url]" class="input-xlarge">
            </div>
          </div>
          
           <div class="control-group">
            <label for="shop_store" class="control-label">厂家或药店名</label>
            <div class="controls">
              <input type="text" id="shop_store" name="Shop[store]" class="input-xlarge">
            </div>
          </div>
          
           <div class="control-group">
            <label for="shop_type" class="control-label">药店类型</label>
            <div class="controls">
              <select id="shop_type" name="Shop[type]">
                <option value="0">自营</option>
                <option value="1">第三方</option>
              </select>
            </div>
          </div>
          
           <div class="control-group">
            <label for="shop_stock" class="control-label">库存</label>
            <div class="controls">
              <input type="text" id="shop_stock" name="Shop[stock]" class="input-xlarge">
            </div>
          </div>
          
           <div class="control-group">
            <label for="shop_category_id" class="control-label">所属分类</label>
            <div class="controls">
            	<select id="shopshop_category_id_type" name="Shop[category_id]">
            	<?php
				foreach ($categoryList as $key => $value){
					foreach ($value as $cate) {
						echo '<option value="'. $cate['id'].'">'.$cate['name'].'</option>';
					}
				}
				?>
				<option value="0">其他</option>
                <input type="hidden" id="shop_category_id_hidden" name="Shop[category_id_hidden]" class="input-xlarge">
            </div>
          </div>
          
           <div class="control-group">
            <label for="shop_image" class="control-label">图片</label>
            <div class="controls">
              <input type="file" id="shop_image" name="Shop[image]" class="input-file">
            </div>
          </div>
          
          <div class="control-group">
            <label for="shop_remark" class="control-label">备注</label>
            <div class="controls">
               <input type="text" id="shop_remark" name="Shop[remark]" class="input-xlarge">
            </div>
          </div>
          
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
	    $('#create_shop_form').validate(
	    {
		    rules: {
			    'Shop[name]': {
			    	minlength: 2,
			    	required: true
			    },
			    'Shop[original_price]': {
			    	required: true,
			    	number:true
			    },
			    
			    'Shop[price]': {
			    	required: true,
			    	number:true
			    },
			    
			    'Shop[url]': {
			    	required: true,
			    	url:true
			    },
			    
			    'Shop[store]': {
			    	required: true,
			    	minlength:2
			    },
			    
			    'Shop[category_id]': {
			    	required: true
			    },
			    
			    'Shop[stock]': {
			    	required: true,
			    	digits:true
			    },
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