<?php
class KuaicheZnSpacePageByTypeSearch extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.zn.space.page.by.type.search';
    }

    public function setType ($type)
    {
        $this->apiParas['type'] = $type;
        return $this;
    }
}