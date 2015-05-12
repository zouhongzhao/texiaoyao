<div class="post">
    <div class="header">
        <div class="title">
        	<h2>
        	<?php if($data->type == 0){//gong
             		echo '<img src="'.Yii::app()->theme->baseUrl.'/images/gvip.gif">';
             	}if($data->type == 1){//qiu
             		echo '<img src="'.Yii::app()->theme->baseUrl.'/images/q.gif">';
             	}
             	?>
            <?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?>
            </h2>
        </div>
        <div class="author">
            <?php echo CHtml::encode(Yii::t('blog','posted by {username} on {create_time}',array('{username}'=>$data->author->username, '{create_time}'=>Yii::app()->dateFormatter->formatDateTime($data->create_time,'full','short')))); ?>
        </div>
    </div>
    
	
	<div class="products_list products_list_mall">
    	<div class="big_pic">
    		<a href="<?php echo $data->images; ?>" title="产品大图" target="_blank">
    			<img alt="<?php echo $data->title; ?>" src="<?php echo $data->images; ?>" width="348" height="348">
    		</a>
		</div>
		<div class="product_information">
			<div class="buy_now">
				<p>
					<span>产品价格：</span> <cite>面议</cite><br>
					<span><?php echo CHtml::encode(Yii::t('blog','Tags:')); ?>：</span> <?php echo implode(', ', $data->tagLinks); ?><br>
					<span>联系人：</span> <?php echo $data->contacts?$data->contacts:$user['lastname']?><br>
					<span>联系电话：</span> <span id="t_phone" class="phone tel"><?php echo $data->telephone?$data->telephone:$user['telephone']?> </span><br>
					<span>所在区域：</span> <?php echo $data->area?$data->area:$user['area']?><br>
					<span>详细地址：</span> <?php echo $data->address?$data->address:$user['address']?><br>
				</p>
			<div class="buy_now_button">
				<!-- Baidu Button BEGIN -->
				<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间">QQ空间</a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博">新浪微博</a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博">腾讯微博</a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网">人人网</a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信">微信</a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{"bdSize":16},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>			
				<!-- Baidu Button END -->
				<cite><a href="#" onclick="addfavorite()" title="加入收藏夹" class="a_link02">[+加入收藏夹]</a></cite>
			</div>
			</div>
			<div class="product_address">
            	<div class="product_address_left">
            		<p>
            			<b>产品所在地：</b>
            			<?php echo $data->area?$data->area:$user['area']?>
            			<span><a href="#" target="_blank" title="更多" class="a_link09">利用地图查找更多信息&gt;&gt;</a></span>
            			</p>
                </div>
                <div class="product_address_right">
                
                </div>
            </div>
     </div>
     <div class="clear"></div>
    </div>
       <div class="page-header">
       	<h3>详细信息</h3>
        	 <div class="intro">
        <?php
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
            echo $data->intro;
            $this->endWidget();
        ?>
    </div>
    
    <div class="post-content">
    	
        <?php
            $this->beginWidget('CMarkdown', array('purifyOutput'=>true));
            echo $data->content;
            $this->endWidget();
        ?>
    </div>
        	
        </div>
    
    <div class="zcon">
            <table cellspacing="0" cellpadding="0" width="" class="table">
                <tbody><tr>
                        <th>公司名称：</th><td colspan="3"><?php echo $user['companyName']?></td>
		            </tr>
		            <tr>
		            	 
		                <th style="width:80px">注册时间：</th>
		                	<td style="width:300px"><?php echo date('Y-m-d H:i:s',$user['createtime'])?></td>
		                <th style="width:80px">联系电话：</th>
		                	<td><span class="wlt"><b>
		                		<?php echo $user['telephone']?>
		                			                	</b></span></td>
		            </tr>
		            <tr>
		                <th>公司网址：</th><td colspan="3"><a href="http://www.wh12580.cn" target="_blank"><?php echo $user['website']?></a></td>
		            </tr>
		            <tr>
		                <th>商家认证：</th><td colspan="3">
		                				                	<!-- <span title="此用户已经通过实名验证" class="sfz"><cite></cite>身份证已验证</span>
			                			                			                	<span title="此用户已经通过营业执照验证" class="yyzz"><cite></cite>营业执照已经验证</span>
			                			                			                	<span title="此用户已经通过手机验证" class="sj"><cite></cite>手机已经验证</span> -->
			                			                			                	<span title="此用户已经通过邮箱验证" class="yx"><cite></cite>邮箱已经验证</span>
			                			                
		                </td>
		            </tr>
		            <tr>
		                <th>联系地址：</th><td colspan="3"><?php echo $user['address']?></td>
		            </tr>
	        </tbody></table>
	    </div>
	    
	     <div class="nav">
        <b><?php echo CHtml::encode(Yii::t('blog','Tags:')); ?></b>
        <?php echo implode(', ', $data->tagLinks); ?>
        <br/>
        <?php echo CHtml::link(Yii::t('blog','Permalink'), $data->url); ?> |
        <?php echo CHtml::link(Yii::t('blog','Comments').' ('.$data->commentCount.')',$data->url.'#comments'); ?> |
        <?php echo CHtml::encode(Yii::t('blog','Last updated on {update_time}',array('{update_time}'=>Yii::app()->dateFormatter->formatDateTime($data->update_time,'full','short')))); ?>
    </div>
<div class="clear"></div>

</div>


<script>
function addfavorite()
{
    var title = '<?php echo $data->title;?>';
  
        var URL = '<?php echo $data->url;?>';
  
  //   alert(title+" ==> "+URL);
 
       try {
 
            window.external.addFavorite(URL, title);          //ie
 
       } catch(e) {
 
            try {
 
                  window.sidebar.addPanel(title, URL, "");     //firefox
 
            } catch(e) {
 
                  alert("加入收藏失败，请使用Ctrl+D进行添加");     //chrome opera safari
 
            }
 
      }
}
</script>
