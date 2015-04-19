<?php

class KuaicheBillSearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.bill.search';
    }

    public function setBillNo ($billNo)
    {
        $this->apiParas['bill_no'] = $billNo;
        return $this;
    }
}