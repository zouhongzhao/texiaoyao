<?php
  // @version $Id: MonthlyArchives.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

class MonthlyArchives extends CWidget
{
  public $title='Monthly Archives';
  public $maxItems=10;

  public function findAllPostDate()
  {
    $yearmonth = array();
    $posts = Post::model()->findRecentPosts(PHP_INT_MAX);

    $count = 0;
    foreach ($posts as $post) {
      $ym = date('F Y', $post->create_time);
      if (!isset($yearmonth[$ym])) {
	if (++$count > $this->maxItems) break;
	$yearmonth[$ym] = 1;
      } else {
	$yearmonth[$ym]++;
      }
    }
    return $yearmonth;
  }

    public function init()
    {
	$this->title=CHtml::encode(Yii::t('blog','Recent Posts'));
	parent::init();
    }
    public function run()
    {
        $this->render('monthlyArchives');
    }

}
