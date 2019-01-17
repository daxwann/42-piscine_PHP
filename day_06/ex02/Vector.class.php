<?php

require_once '../ex01/Vertex.class.php';

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
        $doc = file_get_contents("Vector.doc.txt");
        echo "\n";
        echo $doc."\n";
    }

    public function magnitude() {
        $mag = (float)sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + 
            ($this->_z * $this->_z));
        return ($mag);
    }

    public function normalize() {
        $mag = $this->magnitude();
        if ($mag == 1)
            return (clone $this);
        $dest = new Vertex(array('x' => $this->_x / $mag, 'y' => $this->_y / $mag, 
            'z' => $this->_z / $mag));
        $norm = new Vector(array('dest' => $dest));
        return ($norm);
    }

    public function add(Vector $rhs)
    {
        $dest = new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 
            'z' => $this->_z + $rhs->_z));
        $addition = new Vector(array('dest' => $dest));
        return ($addition);
    }

    public function sub(Vector $rhs)
    {
        $dest = new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 
            'z' => $this->_z - $rhs->_z));
        $diff = new Vector(array('dest' => $dest));
        return ($diff);
    }

    public function opposite()
    {
        $dest = new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 
            'z' => $this->_z * -1));
        $opp = new Vector(array('dest' => $dest));
        return ($opp);
    }

    public function scalarProduct($k)
    {
        $dest = new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 
            'z' => $this->_z * $k));
        $scalarProduct = new Vector(array('dest' => $dest));
        return ($scalarProduct);
    }

    public function dotProduct(Vector $rhs)
    {
        $dotProduct = (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + 
            ($this->_z * $rhs->_z));
        return ($dotProduct);
    }

    public function crossProduct(Vector $rhs)
    {
        $dest = new Vertex(array(
            'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
            'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
            'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()
        ));
        $crossProduct = new Vector(array('dest' => $dest));
        return ($crossProduct);
    }

    public function cos(Vector $rhs)
    {
        $cos = (($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / 
            sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * 
            (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z)));
        return ($cos);
    }

    public function getX() {
        return $this->_x;
    }

    public function getY() {
        return $this->_y;
    }
        
    public function getZ() {
        return $this->_z;
    }

    public function getW() {
        return $this->_w;
    }
}