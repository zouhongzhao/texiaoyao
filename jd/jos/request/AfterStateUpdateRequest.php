<?php

class AfterStateUpdateRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return '360buy.after.state.update';
    }

    public function setReturnId ($returnId)
    {
        $this->apiParas['return_id'] = $returnId;
        return $this;
    }

    public function setTradeNo ($tradeNo)
    {
        $this->apiParas['trade_no'] = $tradeNo;
        return $this;
    }
}