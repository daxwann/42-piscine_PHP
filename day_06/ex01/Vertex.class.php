<?php
require_once '../ex00/Color.class.php';

class Vertex {
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1;
    private $_color;
    static $verbose = FALSE;

    public function __construct($hash) {
        $this->_x = $hash['x'];
        $this->_y = $hash['y'];
        $this->_z = $hash['z'];
        if (isset($hash['w']))
            $this->_w = $hash['w'];
        if (isset($hash['color']) && $hash['color'] instanceof Color)
            $this->_color = $hash['color']; 
        else
            $this->_color = new Color(array('rgb'=>0xFFFFFF));
        if (self::$verbose == TRUE) {
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", 
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
        }
    }

    public function __destruct() {
        if (self::$verbose == TRUE) {
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", 
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
        }
    }

    public function __toString() {
        if (self::$verbose == TRUE) {
            $str = sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", 
                $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
        }
        else {
            $str = sprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", 
                $this->_x, $this->_y, $this->_z, $this->_w);
        }
        return ($str);
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

    public function getColor() {
        return $this->_color;
    }

    public function setX($x) {
        $this->_x = $x;
    }

    public function setY($y) {
        $this->_y = $y;
    }

    public function setZ($z) {
        $this->_z = $z;
    }

    public function setW($w) {
        $this->_w = $w;
    }

    public function setColor($color) {
        $this->_color = $color;
    }

    public static function doc() {
        $doc = file_get_contents("Vertex.doc.txt");
        echo "\n";
        echo $doc."\n";
    }
}