<?php

class KuaicheAccountIncomeExpenseSearch extends JosRequest
{

    public function getApiMethod ()
    {
        return 'jingdong.kuaiche.account.income_expense.search';
    }

    public function setCheckType ($checkType)
    {
        $this->apiParas['check_type'] = $checkType;
        return $this;
    }
}