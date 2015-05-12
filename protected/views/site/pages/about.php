<?php
$this->pageTitle=Yii::app()->name . ' - 关于我们';
$this->breadcrumbs=array(
    Yii::t('site','about'),
);
$parser = new CMarkdownParser;
// $readme = file_get_contents(Yii::app()->basePath.'/../README.md');
$readme = '特效药比价网(www.texiaoyao.cn)，国内第一家药物垂直比价搜索引擎，极大的方便了各位寻求特效药的朋友搜索最便宜的特效药

特效药比价网是针对药品交易行业的专业搜索门户，是搜索引擎的细分和提升，是对网络海量资源中的药品交易开展的专业化的信息整合，通过定向分字段抽取出必要的数据进行处理后再以更人性化的形式返回给用户。 　　

特效药比价网是相对通用搜索门户的信息量大、查询不准确、深度不够等问题，并结合其团队对药品交易的深度理解与技术趋势的精准把握而提出的全新的搜索引擎服务模式，通过针对特定领域、特定人群、特定需求提供的更有价值的信息和综合性服务。特点就是“专、精、深”，且具有深厚的行业色彩，相比较通用搜索引擎的海量信息无序化，特效药垂直搜索门户则显得绝对的专注、具体和精深。 ';
?>
<div class="page-header">
<h2><?php echo CHtml::encode(Yii::t('site', '关于 {appName}', array('{appName}'=>Yii::app()->name))); ?></h2>
</div>
<!-- <code><?php echo realpath(Yii::app()->basePath.'/../README.md'); ?></code> -->

<?php echo $parser->safeTransform($readme); ?>
