<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 11:43
 */

class Phone
{
    public $id;
    public $Name;
    public $IMEI;
    public $OSVersion;


    /**
     * @return string
     */
    public function printPhone()
    {
        $echoString = 'id = ' . $this->id . ' '
            . 'name = ' . $this->Name . ' '
            . 'IMEI = ' . $this->IMEI . ' '
            . 'OS version = ' . $this->OSVersion;
        return $echoString;
    }
}