<?php

// Author: Peter Forret (toolstud-io, peter@forret.com)

namespace ToolstudIo\SiFormat;

class SiFormat
{
    private array $prefixes;
    private string $unit;
    private int $base;
    private string $separator;

    public function __construct(bool $long = false, string $unit = "m", int $base = 1000, string $separator="")
    {
        $this->unit = $unit;
        $this->base = $base;
        $this->separator=$separator;
        if (!$long) {
            $this->prefixes = [
                -8 => "y",
                -7 => "z",
                -6 => "a",
                -5 => "f",
                -4 => "p",
                -3 => "n",
                -2 => "µ",
                -1 => "m",
                0 => "",
                1 => "K",
                2 => "M",
                3 => "G",
                4 => "T",
                5 => "P",
                6 => "E",
                7 => "Z",
                8 => "Y",
            ];
        } else {
            if($base==1000){
                $this->prefixes = [
                    -8 => "yocto",
                    -7 => "zepto",
                    -6 => "atto",
                    -5 => "femto",
                    -4 => "pico",
                    -3 => "nano",
                    -2 => "micro",
                    -1 => "milli",
                    0 => "",
                    1 => "Kilo",
                    2 => "Mega",
                    3 => "Giga",
                    4 => "Tera",
                    5 => "Peta",
                    6 => "Exa",
                    7 => "Zetta",
                    8 => "Yotta",
                ];

            } else {
                $this->prefixes = [
                    -8 => "yocto",
                    -7 => "zepto",
                    -6 => "atto",
                    -5 => "femto",
                    -4 => "pico",
                    -3 => "nano",
                    -2 => "micro",
                    -1 => "milli",
                    0 => "",
                    1 => "Kibi",
                    2 => "Mibi",
                    3 => "Gibi",
                    4 => "Tibi",
                    5 => "Pibi",
                    6 => "Exibi",
                    7 => "Zibi",
                    8 => "Yibi",
                ];

            }
        }
        printf("\n");
    }

    public function format(float $number, int $places = 2): string
    {
        $negative = false;
        if ($number < 0) {
            $number = -1 * $number;
            $negative = true;
        }
        $log = log($number, $this->base);
        switch (true) {
            case $log > 8:
                $power = 8;
                break;
            case $log < -8:
                $power = -8;
                break;
            case $log < 0:
                $power = (int)($log - .5);
                break;
            default:
                $power = (int)$log;
        }

        if ($power === 0) {
            $formatted = round($number, $places);
            $formatted .= $this->separator . $this->unit;
        } else {
            $formatted = round($number / ($this->base ** $power), $places);
            $formatted .= $this->separator . $this->prefixes[$power] . $this->unit;
        }

        if ($negative) {
            $formatted = "-$formatted";
        }
        return $formatted;
    }
}
