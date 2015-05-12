<?php

class VasSubscribeGet extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.vas.subscribe.get';
    }

    public function setUserName ($username)
    {
        $this->apiParas['user_name'] = $username;
        return $this;
    }

    public function setItemCode ($itemcode)
    {
        $this->apiParas['item_code'] = $itemcode;
        return $this;
    }
}