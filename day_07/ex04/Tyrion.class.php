<?php

class Tyrion {
    public function sleepWith($house) {
        if ($house instanceof Jaime || $house instanceof Cersei)
            print("Not even if I'm drunk !" . PHP_EOL);
        else if ($house instanceof Sansa)
            print("Let's do this." . PHP_EOL);
    }
}