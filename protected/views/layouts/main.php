<!doctype html>
<html>
<head>
    <?php Yii::app()->controller->widget('ext.seo.widgets.SeoHead', array(
        'defaultDescription'=>Yii::app()->params['appDescription'],
        'defaultKeywords'=>Yii::app()->params['appKeywords'],
        'httpEquivs'=>array('Content-Type'=>'text/html; charset=utf-8;font-family: arial, sans-serif', 'Content-Language'=>'zh_cn'),
        'title'=>array('class'=>'ext.seo.widgets.SeoTitle', 'separator'=>' :: '),
    )); ?>
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico">
	<?php Yii::app()->bootstrap->registerAllCss(); ?>
	<?php Yii::app()->bootstrap->registerCoreScripts(); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/main.css'); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/jquery.tmailsilder.v2.css'); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/qqkf.css'); ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/service.css'); ?>
    <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<script type="text/javascript">
        var SITE_URL = "<?php echo Yii::app()->baseUrl ?>";
        var UserId  = '<?php echo Yii::app()->user->id ?>';
        var RETURN_URL = '<?php echo Yii::app()->request->url ?>';
</script>
<body id="top">

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'type'=>'inverse',
    'brand'=>CHtml::encode(Yii::app()->name),
    'collapse'=>true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                 array('label'=>Yii::t('site','latest_information'), 'url'=>Yii::app()->createUrl('/post/index'),
						'active'=>Yii::app()->controller->id === 'post' && Yii::app()->controller->action->id === 'index'),
            	array('label'=>Yii::t('site','爬虫搜索'), 'url'=>array('shop/spider')),
            	array('label'=>Yii::t('site','论坛'), 'url'=>'http://bbs.texiaoyao.cn'),
            ),
            'htmlOptions'=>array('class'=>'pull-left'),
        ),
    	//'<ul class="nav"><script type="text/javascript" src="http://ext.weather.com.cn/60932.js"></script></ul>',
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>Yii::t('site','login'), 'url'=>Yii::app()->createUrl('/login'), 'visible'=>Yii::app()->user->isGuest),
            	'<i class="icon-user"></i>',
                // array('label'=>Yii::t('site','logout ({username})',array('{username}'=>Yii::app()->user->name)), 'url'=>Yii::app()->createUrl('/logout'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('site','欢迎您 {username}',array('{username}'=>Yii::app()->user->name)),'icon'=>'user',
                            'url'=>"#", 'visible'=>!Yii::app()->user->isGuest,
							'items'=>array(
                	array('label'=>Yii::t('site','User Center'),'url'=>array('/profile')),
                	 array('label'=>Yii::t('site','Create New Product'),'url'=>array('/shop/create')),
        array('label'=>Yii::t('site','Bulk import'), 'url'=>array('/profile/bulkImport')),
                	array('label'=>Yii::t('blog','Create Post'),'url'=>array('/post/create')),
                    array('label'=>Yii::t('site','Logout'),'url'=>array('/logout')),
                    )
							),
                
                array('label'=>Yii::t('site','Language'),'url'=>'#','items'=>array(
                	array('label'=>Yii::app()->locale->getLanguage('zh_cn'),'url'=>array('/site/selectLanguage','lc'=>'zh_cn')),
                    array('label'=>Yii::app()->locale->getLanguage('en_us'),'url'=>array('/site/selectLanguage','lc'=>'en_us')),
                )),
            ),
            'htmlOptions'=>array('class'=>'pull-right'),
        ),
	
    ),
)); ?>

<div class="container">

    <?php if (!empty($this->breadcrumbs)):?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?>
    <?php endif?>

    <?php echo $content; ?>
	<div id="push"></div>


   <div id="footer">
		   	<div class="alert alert-danger">
						<?php echo Yii::t('site','home_footer_tips') ?>
						
		</div>
			 <div id="mainmenu">
				<?php $this -> widget('zii.widgets.CMenu', array('items' => array(
				 array('label' => Yii::t('site','home'), 'url' => '/'), 
				 array('label' => Yii::t('site','latest_information'), 'url' => array('post/index')),
				 array('label' => Yii::t('site','about'), 'url' => array('site/page','view'=>'about')),
				 array('label' => Yii::t('site','contact'), 'url' => array('site/contact')), 
				 array('label' => Yii::t('site','login'), 'url' => array('/login'), 'visible' => Yii::app() -> user -> isGuest), 
				 array('label' => Yii::t('site','logout').'  ('.Yii::app() -> user -> name . ')', 'url' => array('/logout'), 'visible' => !Yii::app() -> user -> isGuest)), )); ?>
			</div>
				
			<?php echo Yii::app()->params['copyrightInfo']; ?>
			<br/>
			<div id="linkbox" class="clearfix">
		        <h3>友情链接</h3>
		        <dl>
					<dd>
						<a href="http://www.mallol.cn" title="Mall购物导航" target="_blank">Mall购物导航</a>
					</dd>
				</dl>
		    </div>
			&nbsp;&nbsp;&nbsp;
			<a href="http://webscan.360.cn/index/checkwebsite/url/www.texiaoyao.cn"><img border="0" src="http://img.webscan.360.cn/status/pai/hash/f8134b11c05ebb2b3b5abcfc5ac73e23"/></a>
			<!-- <div style="margin:0 auto;width:980px">
        <div class="row">
            <div class="span2 offset2">
                <h4>Useful links</h4>
                <ul>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
            <div class="span2 offset1">
                <h4>Support</h4>
                <ul>
                    <li><a href="">Knowledge base</a></li>
                    <li><a href="">Live Chat</a></li>
                    <li><a href="">Send Email</a></li>
                </ul>
            </div>
            <div class="span2 offset1">
                <h4>Connect with us</h4>
                <ul>
                   <li><a href="" title="LinkedIn">LinkedIn</a></li>
                    <li><a href="" title="Google+">Google Plus</a></li>
                     <li><a href="" title="Facebook">Facebook</a></li>
                    <li><a href="" title="Twitter">Twitter</a></li>
                    <li><a href="" title="RSS">RSS</a></li>
                    <li><a href="" title="Blogs">Blogs</a></li>
                </ul>
            </div>
        </div>
    </div> -->
			<script type="text/javascript">
                var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0675a5a7bd5daee966600327dbf56f37' type='text/javascript'%3E%3C/script%3E"));
			</script>
			

		</div><!-- footer -->


</div>
<?php // Yii::app()->clientScript->registerScriptFile('http://s7.addthis.com/js/250/addthis_widget.js#pubid=REPLACE_ME', CClientScript::POS_END); ?>

<div class="backto-top">
  <ul id="jump">
    <li style="display:none;height:50px;"><a id="backtotop" href="#backtotop"></a></li>
    <li style="height:50px"><a id="sina" rel="nofollow" href="http://service.weibo.com/share/share.php?url=<?php echo $this->get_url(); ?>" target="_blank"></a></li>
    <li style="height:50px"><a id="weixin" href="javascript:void(0)" onmouseover="showEWM()" onmouseout="hideEWM()">
      <div id="EWM">
      <!-- 
       <img src="https://chart.googleapis.com/chart?cht=qr&chld=H&chs=150x150&chl=<?php echo $this->get_url(); ?>" alt="QR:  <?php $this->pageTitle; ?>"/>
       -->
     
      </div>
      </a></li>
    <li style="height:50px"><a id="ceping" href="http://share.v.t.qq.com/index.php?c=share&a=index&url=<?php echo $this->get_url(); ?>" target="_blank"></a></li>
    <li style="height:50px"><a id="reply" href="<?php echo Yii::app()->createUrl('/site/reply')?>" target="_blank"></a></li>
    <script>
	  	function showEWM()
			{
				document.getElementById("EWM").style.display = 'block';
				}
		function hideEWM()
			{
				document.getElementById("EWM").style.display = 'none';
				}
	  </script>
  </ul>
</div>

<!-- 客服系统 -->
<!-- helper-button写行内样式为了搜狗360兼容 -->
<div class="helper-button" style="position:fixed; width:42px;height:118px;right:6px;top:200px;z-index:10000; _position:absolute;_bottom:auto;  _top:expression(eval(document.documentElement.scrollTop+112));  " > <a href="#" onclick="return false;"></a> </div>
<div class="helper-wrap show" style="cursor:move;" title="点击拖动">
  <div class="helper-box">
    <div class="helper-box-tit">
      <ul class="tab_menu">
        <li id="advertiser"><a class="on" href="javascript:void(0);" >商家合作</a></li>
        <li id="affiliate"><a class="" href="javascript:void(0);" >常见问题</a></li>
        <!--<li style="height:30px; width:125px;cursor:move;" title="点击拖动"></li>-->
      </ul>
      <div class="helper-box-close"> <a onclick="return false;" title="关闭" > <i class="iconfont">&#223;</i> </a> </div>
    </div>
    <div class="helper-box-info">
      <div style=float:left;"><span style="font-size: 10pt;">【公告】 </span></div>
      <p> <a href="http://texiaoyao.cn/shop/search.html?category_id=%E7%89%B9%E6%95%88%E8%8D%AF" target="_blank" title="特效药比价功能上线！">1、特效药比价功能上线！。</a></p>
      <p> <a href="http://texiaoyao.cn/post/index.html" target="_blank" title="特效药供求功能上线">2、特效药供求功能上线。</a></p>
     <p> <a href="http://texiaoyao.cn/profile/bulkImport.html" target="_blank" title="批量导入产品功能上线">3、批量导入产品功能上线。</a></p>
      <!--<p style="text-indent:58px;"><a href="">2、站长最新招募活动，丰厚的佣金等你拿。</a></p>-->
    </div>
    <div class="tab_box" id="adver">
      <!--广告商信息列表-->
      <ul class="con">
        <li><a title="合作合同下载！" href="#">合作合同下载！</a>
          <div class="helper-box-list-con" >
            <div style="text-align: center; ">合作合同下载</div>
          </div>
        </li>
        <li><a title="特效药联盟合作流程。" href="#">特效药联盟合作流程。</a>
          <div class="helper-box-list-con" >
            <ul class="inline bigicon">
              <li class="icon"><a href="http://www.texiaoyao.cn" target="_blank"><i class="iconfont">&#61471;</i> </a>
                <p><a href="http://www.texiaoyao.cn" target="_blank">STEP 1</a></p>
                <p><a href="http://www.texiaoyao.cn" target="_blank">洽谈合作</a></p>
              </li>
              <!-- <li class="ftip"><i class="iconfont">&#323;</i></li>
              <li class="icon"><a href="http://www.texiaoyao.cn" target="_blank"><i class="iconfont">&#302;</i> </a>
                <p><a href="http://www.texiaoyao.cn" target="_blank">STEP 2</a></p>
                <p><a href="http://www.texiaoyao.cn" target="_blank">预存费用</a></p>
              </li> -->
              <li class="ftip"><i class="iconfont">&#323;</i></li>
              <li class="icon"><a href="http://www.texiaoyao.cn" target="_blank"><i class="iconfont">&#288;</i> </a>
                <p><a href="http://www.texiaoyao.cn" target="_blank">STEP 2</a></p>
                <p><a href="http://www.texiaoyao.cn" target="_blank">上线推广</a></p>
              </li>
              <li class="ftip"><i class="iconfont">&#323;</i></li>
              <li class="icon"><a href="http://www.texiaoyao.cn" target="_blank"><i class="iconfont">&#263;</i> </a>
                <p><a href="http://www.texiaoyao.cn" target="_blank">STEP 3</a></p>
                <p><a href="http://www.texiaoyao.cn" target="_blank">效果跟踪</a></p>
              </li>
            </ul>
          </div>
        </li>
        <li><a title="如何新建广告？" href="#">如何新建广告？</a></li>
        <li><a title="如何发布产品？" href="#">如何发布产品？</a>
          <div class="helper-box-list-con" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 注册后方可发布产品,产品的话必须是正规的厂家,国家药监局认证的、<br />
           一个账户可以发布多个产品。
           </div>
        </li>
        <li><a title="如何发布供求信息？" href="#">如何发布供求信息？</a>
          <div class="helper-box-list-con" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
          	注册后方可发布供求信息
          </div>
        </li>
      </ul>
      <div class="helper-box-bot">
        <!--广告商QQ客服-->
        <a style="background:#95C360;" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=529894459&site=qq&menu=yes"><i class="iconfont" style="font-size:25px">&#524;</i> QQ咨询 </a>
        <a style="background:#54C5FD;" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=892294022&site=qq&menu=yes"><i class="iconfont" style="font-size:25px">&#39;</i> 892294022 </a> </div>
    </div>
    <div class="tab_box" id="affili"style="display:none">
      <!--站长信息列表-->
      <ul class="con">
        <li><a title="告诉您如何推广下线链接获得永久提成" href="#">特效药比价网有什么功能？对您有什么用处？</a>
          <div class="helper-box-list-con" > 
    1,全网药品比价:我们的网络蜘蛛定时到主流B2C网上药店抓取产品数据，包括：产品的价格，库存，用户评分，以及评论数。 以供用户参考。让用户更方便的找出最高性价比的药品。<br /><br />
    2,数据检索：我们拥有国内最先进的搜索系统，并为您创建了方便快捷的搜索平台——爬虫搜索。您可以迅速找到所需要的产品、企业、招商、供求、资讯等各类信息。<br /><br />
    3,医药供求:即中国特效药供求网，是为医药业内发布供求信息的平台。支持一键更新，添加好友，发短信息，会员积分等级，匿名发 布等功能，实行明日竞价置顶信息，提高关注度。如发布的信息不符合相关政策法规，本站在不通知情况下删除相关信息。<br />
 &hellip;&hellip;<br />
            <br />
          </div>
        </li>
        <li><a title="最新活动预告" href="#">最新活动预告</a>
          <div class="helper-box-list-con" > &nbsp; &nbsp; 请关注特效药咨询，各种活动即将上线。</a></div>
        </li>
        <li><a title="违规推广处罚规则。" href="#">违规推广处罚规则。</a>
          <div class="helper-box-list-con" > &nbsp; &nbsp; &nbsp; &nbsp;如违反《特效药联盟会员注册协议》，将立即解除与特效药联盟合作，不再恢复合作资格。</div>
        </li>
        <li><a title="网站审核要求有哪些？" href="#">网上药店审核要求有哪些？</a>
          <div class="helper-box-list-con" > 有以下情况者，特效药联盟谢绝加入！
            <div>1、网站没有实际内容.</div>
            <div>2、网站有病毒或木马.</div>
            <div>3、色情或不健康内容.</div>
            <div>4、弹窗过多.(所有单页面弹窗不得多于2个&lt;进弹+退弹&gt;)&nbsp;</div>
            <div>5、非正规投放代码.(隐藏、遮盖广告)</div>
            <div>6、作弊帐号，代理IP或虚假数据.</div>
            <div>7、网站打不开.</div>
            <div>8、网站内容不适合.</div>
            <div>9、其他不遵守特效药联盟相关规定或变相违规的帐号.</div>
            <div>请注意，特效药联盟只审核正规合法网站。</div>
            <div>除以上之外，非自主独立域名，伦理片、三级片、网赚、广告任务、外挂私服、tk域名都不审核!</div>
          </div>
        </li>
        <li><a title="什么账户会被冻结挂起？" href="#">什么账户会被冻结挂起？</a>
          <div class="helper-box-list-con" > 日常检查中发现有以下违规现象时，情况严重的帐号将被挂起！
            <div>一）网站没有实际内容.</div>
            <div>【纯广告页面，新建无内容网站等一律不予审核！】</div>
            <div>二）强制或诱导点击.</div>
            <div>【不得以任何语言或者形式诱导、误导、要求或强制访问者点击广告。】</div>
            <div>违规范例：</div>
            <div>1：支持本站发展，请点击广告。&nbsp;</div>
            <div>2：点击广告获取下载地址 / 观看影片 / 提高下载速度 / 注册帐号。&nbsp;</div>
            <div>三）色情或不健康内容.</div>
            <div>【特效药联盟严格审查，坚决杜绝一切色情、人体、露点等不健康网站！】</div>
            <div>四）病毒或弹窗过多.</div>
            <div>【网站所有单个页面弹窗不得多于2个&lt;包括进弹和退弹&gt;】</div>
            <div>五）非正规或未投放代码.</div>
            <div>【注册后长期未投放特效药联盟广告的，特效药联盟有权将账号删除处理。】</div>
            <div>广告条必须完整嵌入网页且完全显示，不得删减、遮挡代码。</div>
            <div>不得将标题颜色和背景颜色使用相近色系，以保证广告的清晰明了。</div>
            <div>六）代理IP或作弊点击/弹窗.</div>
            <div>【任何非人工产生的数据，代理服务器IP，假IP，自动刷新，javascript都是作弊。使用非HTML手段、 JAVASRIPT 窗口、隐藏FRAME 、CGI 自动生成、网页REFRESH/AUTOLOAD等来演绎广告均属违规。】&nbsp;</div>
            <div>七）网站打不开或不适合加入.</div>
            <div>【首页不能正常打开的，或者有任何一种不适合审核的情况的。】</div>
            <div>八）标题或内容不适合.</div>
            <div>【特效药联盟谢绝一切非正规网站。】</div>
            <div>九）不遵守特效药联盟传媒相关规定或变相违规的帐号.</div>
            <div>【未提及的其他。特效药联盟传媒拥有增删、修改、完善规则的权利。】</div>
          </div>
        </li>
        <li><a title="怎样发布信息才能获得更多的反馈？" href="#">怎样发布信息才能获得更多的反馈？</a>
          <div class="helper-box-list-con" > &nbsp; &nbsp; &nbsp;
           <div>反馈信息对每一个企业都是非常重要的，所以本站的每个频道中都设有留言功能。如果您想让自己的商业信息在众多同行中脱颖而出，引起 潜在合作伙伴的关注，我们建议您：</div>

<div>A：每一条商业信息尽量针对具体产品详细描述，泛泛的企业介绍对买家吸引力较小；</div>

<div>B：填写的信息内容要尽量详实，对所经营的产品有比较充分的 介绍，如产品规格、产品说明等</div>

<div>C：选配产品样品图片，以增强效果，真实、形象地展现产品；</div>

<div>D：填写产品参数，专业详细地介绍产品品质及技术信息；</div>

<div>E：确保您的固定电话、传真、Email、手机号码填写正确，避免 因写错而造成联系失败。	</div>
          </div>
        </li>
      </ul>
      <div class="helper-box-bot">
        <!--站长QQ客服--> 
        <a style="background:#95C360;" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=529894459&site=qq&menu=yes"><i class="iconfont" style="font-size:25px">&#524;</i> 咨询QQ </a> 
        <a style="background:#54C5FD;" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=892294022&site=qq&menu=yes"><i class="iconfont" style="font-size:25px">&#39;</i> 892294022 </a> </div>
    </div>
  </div>
</div>
<!-- 客服系统 -->

</body>
</html>
<?php
$baseUrl = Yii::app()->baseUrl;
$cs=Yii::app()->clientScript;
$cs->registerScriptFile($baseUrl.'/js/jquery.tmailsilder.v2.js');
// $cs->registerScriptFile($baseUrl.'/js/jquery.ui.datepicker-zh-CN.js');
$cs->registerScriptFile($baseUrl.'/js/bootstrap-typeahead.js');
$cs->registerScriptFile($baseUrl.'/js/persist-min.js');
$cs->registerScriptFile($baseUrl.'/js/jquery.validate.min.js');
$cs->registerScriptFile($baseUrl.'/js/function.js');
$cs->registerScriptFile($baseUrl.'/js/service.js');
?>

<div id="showScoreMessage"></div>
<?php 
$status = Yii::app()->session['login_status'];
if(!empty($status)){
	$final_show_status = $status; 
	$status_display = "";
}else{
	$final_show_status = ""; 
	$status_display = ' style="display:none;"';
}
 ?>
<div id="clickme" class="info-box" <?php echo $status_display ?>>
	<p><img src="<?php echo Yii::app()->theme->baseUrl . '/images/info.png' ?>"/><?php echo $final_show_status ?></p>
</div>
<script type="text/javascript">$('#Z_TMAIL_SIDER_V2').Z_TMAIL_SIDER_V2();</script>
<?php if(isset(Yii::app()->session['login_status'])){
	unset(Yii::app()->session['login_status']);
}?>