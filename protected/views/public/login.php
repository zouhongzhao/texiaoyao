<h3>请先登录</h3>
<div class="form">
	
	<form method="post" action="/index.php/login" id="login-form" class="well form-horizontal">
	    <p class="note">带 <span class="required">*</span> 是必填项.</p>
	
		<div class="control-group  validating">
			<label for="UserLogin_username" class="control-label required">用户名或邮箱 <span class="required">*</span></label>
			<div class="controls">
				<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input type="text" id="UserLogin_username" name="UserLogin[username]">
				</div>
				<span style="display: none" id="UserLogin_username_em_" class="help-inline error"></span>
				</div>
			</div>
		<div class="control-group ">
			<label for="UserLogin_password" class="control-label required">密码 <span class="required">*</span></label>
			<div class="controls">
				<div class="input-prepend">
					<span class="add-on"><i class="icon-lock"></i></span>
				<input type="password" id="UserLogin_password" name="UserLogin[password]">
				</div>
				<span style="display: none" id="UserLogin_password_em_" class="help-inline error"></span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<p class="hint">
			<a href="/index.php/registration">免费注册</a> | 
			
			<a href="/index.php/recovery/recovery">忘记密码?</a>		</p>
			</div>
		</div>
		
		<div class="control-group ">
			<div class="controls">
				<label for="UserLogin_rememberMe" class="checkbox">
					<input type="hidden" name="UserLogin[rememberMe]" value="0" id="ytUserLogin_rememberMe">
					<input type="checkbox" value="1" id="UserLogin_rememberMe" name="UserLogin[rememberMe]">
					记住我的登录信息（请勿在公用电脑或者网吧内使用此项）
					<span style="display: none" id="UserLogin_rememberMe_em_" class="help-inline error"></span>
				</label>
			</div>
		</div>
	    <div class="form-actions">
	        <button name="yt0" type="submit" class="btn btn-primary">登陆</button> 
	        <button name="yt1" type="reset" class="btn">重置</button>
	    </div>
		<input type="hidden" value="<?php echo Yii::app()->getRequest()->getCsrfToken(); ?>" name="YII_CSRF_TOKEN" />
	</form>    
</div>
<script>
  // $(function () {
    // $('#myTab a:last').tab('show')
  // })
    $(document).ready(function(){
	   $('#login-form').validate(
	    {
		    rules: {
			    'UserLogin[username]': {
			    	minlength: 2,
			    	required: true,
			    	// remote:{
	       				// url:"/index.php/login/nameIsExits",
	       				// type:"post",
	       				// dateType:"json",
	       				// data:{
	            			// username:function(){return $("#UserLogin_username").val();}
	       				// }
	      			// }
	    		},
			    'UserLogin[password]': {
			    	minlength: 6,
			    	required: true,
			    }
		    },
		    messages:{
		     'UserLogin[username]':{
		          require:"用户名不能为空", remote:"该用户名不存在"
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
