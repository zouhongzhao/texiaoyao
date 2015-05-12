<?php

class KuaicheZnPlanChannelModifyRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.plan.channel.modify';
    }

    public function setPlanInfo ($info)
    {
        $this->apiParas['plan_info'] = $info;
        return $this;
    }
}