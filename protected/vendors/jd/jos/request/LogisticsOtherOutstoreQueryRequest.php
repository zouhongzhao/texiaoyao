<?php

class LogisticsOtherOutstoreQueryRequest extends JosRequest
{

    public function getApiMethod()
    {
        return 'jingdong.logistics.otherOutstore.query';
    }

    public function setJoslOutboundNo($value)
    {
        return $this->apiParas['josl_outbound_no'] = $value;
        return $this;
    }
}