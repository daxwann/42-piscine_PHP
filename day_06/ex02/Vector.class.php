<?php

class Vector {
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0;
    public static $verbose = FALSE;

    public function __construct($arr) {
        if (isset($arr['orig']) && $arr['orig'] instanceof Vertex)
            $orig = clone $arr['orig'];
        else
            $orig = new Vertex(array('x'=>0, 'y'=>0, 'z'=>0));
        if (isset($arr['dest']) && $arr['dest'] instanceof Vertex) {
            $this->_x = $arr['dest']->getX() - $orig->getX();
            $this->_y = $arr['dest']->getY() - $orig->getY();
            $this->_z = $arr['dest']->getZ() - $orig->getZ();
            $this->_w = 0;
        }
        if (self::$verbose) {
                printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", 
                $this->_x, $this->_y, $this->_z, $this->_w);
        }
    }

    public function __destruct() {
        if (self::$verbose) {
            printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", 
            $this->_x, $this->_y, $this->_z, $this->_w);
        }
    }

    public function __toString() {
        $str = sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", 
        $this->_x, $this->_y, $this->_z, $this->_w);
        return ($str);
    }

    public static function doc() {
        $doc = file_get_contents("Color.doc.txt");
        echo "\n";
        echo $doc."\n";
    }

    public function magnitude() {
        $mag = (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + 
            ($this->_z * $this->_z));
        return ($mag);
    }
}