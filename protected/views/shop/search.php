<?php
$this->pageTitle=Yii::app()->name . ' - ' .$category.'特效药';
$this->addMetaProperty('og:title', '药品比价,医药比价,药物比价,药店比价');
$this->addMetaProperty('og:site_name', Yii::app()->name);
$this->breadcrumbs=array(
	Yii::t('site','shop'),
);
?>
<?php 
$this->renderPartial('_header', array(
	'category' => $category,
	'categoryList'=>$categoryList,
)); 
$this->widget('bootstrap.widgets.TbGridView', array(
 'id'=>'chapter-grid',
'dataProvider'=>$model->search(),
// 'rowHtmlOptionsExpression' => array( 'YII_CSRF_TOKEN' => Yii::app()->request->csrfToken ),
// 'cssFile' => Yii::app()->theme->baseUrl.'/css/girdViewStyle/gridView.css',
 'filter'=>$model,
 // 'data'=>array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken),
 // 'showTableOnEmpty'=>false,
'afterAjaxUpdate' => 'reinstallDatePicker', 
	         'pager'=>array(     		 //通过pager设置样式   默认为CLinkPager
	           'header' => '<div class="pagination pagination-centered">',
                    'footer' => '</div>',
                    'nextPageLabel'=>'下一页',
                    'prevPageLabel'=>'上一页',
                    'lastPageLabel'=>'末页',
                    'selectedPageCssClass' => 'active',
                    'hiddenPageCssClass' => 'disabled',
                    'htmlOptions' => array(
                        'class' => '',
                    ), //http://www.chriswpage.com/2013/05/style-yii-pagination-with-bootstrap/#sthash.LZ0TRtXL.dpuf
	        		  
			),
	         'summaryText' => '搜索关键词：<font color=#0066A4>'.$category.'</font> {start} - {end}条 共{count}条',
	           // 'summaryText'=>'<font color=#0066A4>显示{start}-{end}条.共{count}条记录,当前第{page}页</font>',e'=>null,  			//是否使用ajax分页   null为ajax分页
	          'columns'=>array(
	          		array(                  //具体设置每列的header
	          			'class'=>'CCheckBoxColumn',
	          			'name'=>'id',
	          			'value'=>'$data->id',
	          			'checked'=>'false',         
        				'selectableRows' => 2,  
        				'checkBoxHtmlOptions' => array('name'=>'id[]'),    
	          		),
	          		array(
			              'name'=>'image',
			              'type'=>'image',
			              'value'=>'$data->image',//图片相对路径
			              'htmlOptions'=>array('class'=>'grid_list_td_image','width'=>'150px'),
			              // 'htmlOptions'=>array('width'=>'150px','height'=>'50px'),
			              'filter'=>false,
			         ),
	          		array(
	          			//'header'=>'药名',
	          			'name'=>'name',         //需要连接可使用CLinkColumn
	          			'value'=>'$data->name',
	          			 // 'filter'=>false,
	          		),
	          		array(
	          			//'header'=>'价格',
	          			'name'=>'price',
	          			'value'=>'"¥ ".$data->price',
	          			'htmlOptions'=>array('width'=>'80px'),
	          			'type'=>'html',
	          		),
	          		array(
	          			//'header'=>'商城',
	          			'name'=>'store',
	          			'value'=>'$data->store',
	          		),
	          		// array(
						// 'name'=>'registered_number',
						// 'value'=>'$data->registered_number',
					// ),
					array(
						'name'=>'description',
						'value'=>'$data->description',
						'filter'=>false,
					),
	          		array(
	          			//'header'=>'商城类型',
	          			'name'=>'type',
	          			'htmlOptions'=>array('width'=>'80px'),
	          			 'value'=>'Shop::getShopType($data->type)',
        				 'filter'=>CHtml::listData(Shop::getShopTypes(), 'id', 'title'),
	          			// 'value'=>'$data->type ? "自营" : "第三方"',
	          			// 'filter'=>CHtml::dropDownList('Shop[type]', '',  // you have to declare the selected value
			                // array(
			                    // ''=>'所有', 
			                    // '1'=>'自营',
			                    // '0'=>'第三方',
			                // )
			            // ),
	          		),
	          		array(
	          			//'header'=>'更新',
	          			'name'=>'creat_time',
	          			'value' =>'date("Y-m-d", strtotime($data->creat_time))',
	          			'filter'=>$this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'language' => 'zh',
                        'attribute'=>'creat_time',
                        'i18nScriptFile' => 'jquery.ui.datepicker-zh-CN.js', // (#2)
                        'htmlOptions' => array(
                            'id' => 'datepicker_for_creat_time',
                            'size' => '10',
                            'style' => 'position: relative;'
                        ),
                        'defaultOptions' => array(  // (#3)
                           'showOn' => 'focus', 
		                    'dateFormat' => 'yy-mm-dd',
		                    'showOtherMonths' => true,
		                    'selectOtherMonths' => true,
		                    'changeMonth' => true,
		                    'changeYear' => true,
		                    'showButtonPanel' => true,
                        )
                    ),true),    
	          		),
	          		// array(
	          			// //'header'=>'评论数',
	          			// 'name'=>'comment',
	          			// 'value'=>'$data->comment',
	          			// 'filter'=>false,
	          		// ),
	          		// array(
                        // 'type'=>'image',
                        // 'name'=>'drugstore',
                        // 'value'=>'$data->drugstore',
                        // 'filter'=>false,
                    // ),
	          		array(                        //自定义按钮操作列
	          			'header'=>'操作',
	          			 'class'=>'CButtonColumn',  
	          			'template'=>'{buy}',  
			            'buttons'=>array(  
			                    'buy' => array(  
			                            'label'=>'购买', 
			                             'url' => 'Yii::app()->createUrl("site/go",array("id"=>$data->id))',
			                            // 'url'=>'Yii::app()->controller->createUrl("focus/create",array("id"=>$data->primaryKey,"type"=>1))',       // a PHP expression for generating the URL of the button  
                            			// 'imageUrl'=>'http://s.maylou.com/common/images/ysh.jpg',  // image URL of the button. If not set or false, a text link is used  
                           				'options'=>array('style'=>'cursor:pointer;','target'=>'_blank'), // HTML options for the button tag  
                            			// 'click'=>$click,     // a JS function to be invoked when the button is clicked  
                            			// 'visible'=>'SiteRecommend::isItemInTypeAndId(1, $data->id)?false:true',  
			                            'visible'=>'true',  
			                            
			                    ) 
			            ),  
	          		),
	          	),//end columns
));
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_date').datepicker();
}
");