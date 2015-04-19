<?php

class KuaicheBillDetailsSearchRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.bill.details.search';
    }

    public function setBillNo ($billNo)
    {
        $this->apiParas['bill_no'] = $billNo;
        return $this;
    }
}