<?php

class KuaicheZnPlanDetailGetRequest extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.plan.detail.get';
    }

    public function setPlanId ($id)
    {
        $this->apiParas['plan_id'] = $id;
        return $this;
    }
}