<?php
namespace Persla\Hundred;

/**
 * A trait implementing histogram for integers.
 */
trait HistogramTrait
{
    /**
     * @var array $serie  The numbers stored in sequence.
     */
    public $serie = [];

    function setSomestuff($value) {
        $this->serie[] = [9999];
        // array_push($this->serie, $value);
        return $this->serie;
    }
    function getSomestuff () {
        return $this->$serie;
    }




    /**
     * Get the serie.
     *
     * @return array with the serie.
     */
    public function getHistogramSerie()

    {
        // array_push($this->serie, 999);
        return $this->serie;
    }



    /**
     * Print out the histogram, default is to print out only the numbers
     * in the serie, but when $min and $max is set then print also empty
     * values in the serie, within the range $min, $max.
     *
     * @param int $min The lowest possible integer number.
     * @param int $max The highest possible integer number.
     *
     * @return string representing the histogram.
     */
    public function printHistogram(int $min = null, int $max = null)
    {
        $histogram = "";
        $current_serie = array_count_values($this->serie);
        foreach (range($min, $max) as $key) {
            if($key != null && !array_key_exists($key, $current_serie)){
                $current_serie[$key] = 0;
                }
        }

        ksort($current_serie);
        foreach ($current_serie as $key => $value) {
            $histogram .= "\n$key: " . str_repeat("*", $value);
        }
        return $histogram;
    }
}
