<?php

class UnholyFactory {
    private $army = array();

    public function absorb($fighter) {
        if ($fighter instanceof Fighter) {
            if (isset($this->army[$fighter->getName()])) {
                print("(Factory already absorbed a fighter of type " . $fighter->getName() 
                . ")" . PHP_EOL);
            } else {
                print("(Factory absorbed a fighter of type " . $fighter->getName() . ")" . PHP_EOL);
                $this->army[$fighter->getName()] = $fighter;
            }
        } else {
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
        }
    }

    public function fabricate($rf) {
        if (array_key_exists($rf, $this->army)) {
            print("(Factory fabricates a fighter of type " . $rf . ")" . PHP_EOL);
            return (clone $this->army[$rf]);
        }
        print("(Factory hasn't absorbed any fighter of type " . $rf . ")" . PHP_EOL);
        return null;
    }
}