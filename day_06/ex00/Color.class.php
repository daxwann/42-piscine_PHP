#!/usr/bin/php
<?php
class Color {
    public $red;
    public $green;
    public $blue;
    public static $verbose = FALSE;

    public function __construct($arr) {
        if (array_key_exists("rgb", $arr)) {
            $rgb = $arr["rgb"];
            $this->red = ($rgb / (256 * 256)) % 256;
            $this->green = ($rgb / 256) % 256;
            $this->blue = $rgb % 256;
        }
        else if (array_key_exists("red", $arr) &&
        array_key_exists("green", $arr) && array_key_exists("blue", $arr)) {
            $this->red = $arr["red"];
            $this->green = $arr["green"];
            $this->blue = $arr["blue"];
        }
            
        if (self::$verbose == TRUE) {
            printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", 
            $this->red, $this->green, $this->blue);
        }
    }

    public function add($c) {
        $red = $this->red + $c->red <= 255 ? $this->red + $c->red : 255;
        $green = $this->green + $c->green <= 255 ? $this->green + $c->green : 255;
        $blue = $this->blue + $c->blue <= 255 ? $this->blue + $c->blue : 255;
        $rgb = array("red"=>$red, "green"=>$green, "blue"=>$blue);
        return (new Color($rgb));
    }

    public function sub($c) {
        $red = $this->red - $c->red >= 0 ? $this->red - $c->red : 0;
        $green = $this->green - $c->green >= 0 ? $this->green - $c->green : 0;
        $blue = $this->blue - $c->blue >= 0 ? $this->blue - $c->blue : 0;
        $rgb = array("red"=>$red, "green"=>$green, "blue"=>$blue);
        return (new Color($rgb));
    }

    public function mult($mult) {
        $red = $this->red * $mult <= 255 ? $this->red * $mult : 255;
        $green = $this->green * $mult <= 255 ? $this->green * $mult : 255;
        $blue = $this->blue * $mult <= 255 ? $this->blue * $mult : 255;
        $rgb = array("red"=>$red, "green"=>$green, "blue"=>$blue);
        return (new Color($rgb));
    }

    public function __toString() {
        $str = sprintf("Color( red: %3d, green: %3d, blue: %3d )", 
        $this->red, $this->green, $this->blue);
        return ($str);
    }

    public static function doc() {
        $doc = file_get_contents("Color.doc.txt");
        echo "\n";
        echo $doc."\n";
    }

    public function __destruct() {
        if (self::$verbose == TRUE) {
            printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", 
            $this->red, $this->green, $this->blue);
        }
    }
}

$newRed = new Color(array("rgb" => 16711680));