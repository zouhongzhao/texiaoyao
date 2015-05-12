<?php

class SiteSearchForm extends CFormModel
{
  public $string;

  public function rules() {
    return array(array('string', 'required'));
  }

  public function safeAttributes() {
    return array('string',);
  }

}