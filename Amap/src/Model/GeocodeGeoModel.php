<?php


namespace Amap\model;


class GeocodeGeoModel
{


    //地址
    private $formatted_address;
    //city
    private $country;
    private $province;
    private $city;

    private $citycode;
    private $district;
    private $street;
    private $number;
    private $adcode;
    private $location;
    private $level;

    private $pintkey = 'geocodes';

    public function __construct($response)
    {
        $response = $response[$this->pintkey];
        foreach ($response as $key => $item) {
            if ($key == 'formatted_address') {
                foreach ($item as $formatted_key => $item2) {
                    $this->$formatted_key = $item2;
                }
            }
            $this->$key = $item;
        }
    }


    /**
     * @return mixed
     */
    public function getFormattedAddress()
    {
        return $this->formatted_address;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getCitycode()
    {
        return $this->citycode;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getAdcode()
    {
        return $this->adcode;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }


}