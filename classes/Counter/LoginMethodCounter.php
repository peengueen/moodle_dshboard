<?php
namespace local_moodle_dshboard\Counter;

class LoginMethodCounter {
    //authentikáció fajtái(számok)
    private int $manual = 0;
    private int $shibboleth = 0;
    private int $other = 0;

    function get_manual(){
        return $this->manual;
    }

    function get_shibboleth(){
        return $this->shibboleth;
    }

    function get_other(){
        return $this->other;
    }

    function add_manual(){
        $this->manual++;
    }

    function add_shibboleth(){
        $this->shibboleth++;
    }

    function add_other(){
        $this->other++;
    }

    function purge(){
        $this->manual = 0;
        $this->shibboleth = 0;
        $this->other = 0;
    }
    
    function print(){
        echo $this->get_manual() . '<br>';
        echo $this->get_shibboleth() . '<br>';
        echo $this->get_other() . '<br>';
    }
}
