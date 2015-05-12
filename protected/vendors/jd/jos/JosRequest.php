<?php

abstract class JosRequest
{

    protected $apiParas = array();

    public function check()
    {
        //
    }

    abstract function getApiMethod();

    public function getAppJsonParams()
    {
        ksort($this->apiParas);
        if ($this->apiParas) {
            return json_encode($this->apiParas);
        } else { // 空对象
            return '{}';
        }
    }

    protected function fileHanlder($file)
    {
        if (substr($file, 0, 1) == '@') {
            $file = substr($file, 1);
            $file = base64_encode(file_get_contents($file));
        }
        return $file;
    }

    public function __set($key, $value)
    {
        $this->apiParas[$key] = $value;
    }

    public function __get($key)
    {
        return isset($this->apiParas[$key]) ? $this->apiParas[$key] : null;
    }
}