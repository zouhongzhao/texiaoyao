<?php
class AdminWebUser extends CWebUser {

    public function __get($name) {
        if ($this->hasState('__adminInfo')) {
            $user = $this->getState('__adminInfo', array());
            if (isset($user[$name])) {
                return $user[$name];
            }
        }

        return parent::__get($name);
    }

    public function login($identity, $duration) {
        $this->setState('__adminInfo', $identity->getUser());
        parent::login($identity, $duration);
    }
}

?>