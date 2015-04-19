<?php

class SiteSearch extends CWidget {

  public $title='Site Search';

  public function run() {
    $model = new SiteSearchForm();
    $this->render('siteSearch', array('model'=>$model));
  }

}

