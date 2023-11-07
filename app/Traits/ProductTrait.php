<?php

namespace App\Traits;

trait  ProductTrait
{
    private function convertArrayToList($array)
    {
        if (isset($array)) {
            $string = "";
            foreach ($array as $item) {
                $string .= $item->name . ", ";
            }
            return substr($string, 0, -2);
        }

        return;
    }

    public function getColors()
    {
        return $this->convertArrayToList($this->colors);
    }

    public function getMaterials()
    {
        return $this->convertArrayToList($this->materials);
    }

    public function getArrayList()
    {
        $sizes=[];
        foreach ($this->sizes as $size) {
            array_push($sizes,['id'=>$size->id,'size'=> $size->high . $size->unit->name . " x " . $size->width . $size->unit->name]);
        }

        return $sizes;
    }

    public function getSizes($color)
    {
        if (isset($this->sizes)) {
            $string = "";
            $index = 1;
            $count = count($this->sizes);
            foreach ($this->sizes as $size) {
                $string .= $size->high . $size->unit->name . " x " . $size->width . $size->unit->name;
                if ($index !== $count) {
                    $string .= '<i class="fas fa-circle" style="color:' . $color . ';"></i>';
                }
                $index++;
            }
            return $string;
        }

        return;
    }


     
}
