<?php

namespace App;

class Validation
{
    /**
     * Fonction de verification des données
     * 
     * Si donnee = null, vide, ""
     * retour 'no_data'
     * Fin si
     * 
     * Sinon 
     *  Selon datatype faire
     *      cas 'number'
     *      Vérifier si data est un nombre
     *          Si vNumber = number faire good + 1 Sinon 
     *              retour 'bad_number'
     *      Cas 'string' faire good + 1
     *  Fin Selon 
     * Fin sinon
     * 
     * retour [good, errorMsg]
     */
    public static function validate($data, string $datatype)
    {
        $good = 0;
        $errorMsg = "";
        $vNumber = 0;

        if ($data == "") {
            $errorMsg = "no_data";
        } else {
            switch ($datatype) {
                case 'number':
                    $vNumber = -1 * $data;
                    if (!$vNumber) {
                        $errorMsg = "bad_number";
                    } else {
                        $good += 1;
                        $errorMsg = "good_number";
                    }
                    break;
                case 'string':
                    $good += 1;
                    $errorMsg = "good_string";
                    break;
                case 'email':
                    break;
                default:
                    break;
            }
        }
        return [$good, $errorMsg];
    }

    public static function generateEndDate(string $start_date)
    {

        $time_input = strtotime($start_date);
        $date_input = getDate($time_input);

        print_r($date_input);
    }
}
