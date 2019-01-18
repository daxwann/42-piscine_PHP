<?php

class NightsWatch {
    private $team = array();
    public function recruit($person) {
        $this->team[] = $person;
    }
    public function fight() {
        foreach($this->team as $person) {
            if ($person instanceof IFighter)
                $person->fight();
        }
    }
}