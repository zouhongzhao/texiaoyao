<?php
  // @version $Id: PostDate.php 68 2010-08-20 09:43:02Z mocapapa@g.pugpug.org $

class PostDate extends CPortlet {
  public $cssClass='postdate';
  public $ct;
 
  protected function renderContent()
  {
    echo "<center><font size=\"3\">\n";
    print $this->ct;
    echo "</font></center>\n";
  }
}
