<?php

class EtmsTraceGetRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.etms.trace.get';
    }

    public function setWayBillCode($value)
    {
        return $this->apiParas['waybillCode'] = $value;
        return $this;
    }
}