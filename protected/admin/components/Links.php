<?php
  // @version $Id: Links.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

class Links extends CPortlet
{
  public $title='Links';

  protected function renderContent()
  {
    $this->render('links');
  }
}
