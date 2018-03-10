<?php
/**
 * Created by PhpStorm.
 * User: XANNIEZ
 * Date: 10/3/2561
 * Time: 2:10
 */

class Location
{
    private $locationName;
    private $streetNumber;
    private $route;
    private $subDistrict;
    private $District;
    private $city;
    private $postalCode;
    private $country;

    /**
     * Location constructor.
     * @param $locationName
     * @param $streetNumber
     * @param $route
     * @param $subDistrict
     * @param $District
     * @param $city
     * @param $postalCode
     * @param $country
     */
    public function __construct($locationName, $streetNumber, $route, $subDistrict, $District, $city, $postalCode, $country)
    {
        $this->locationName = $locationName;
        $this->streetNumber = $streetNumber;
        $this->route = $route;
        $this->subDistrict = $subDistrict;
        $this->District = $District;
        $this->city = $city;
        $this->postalCode = $postalCode;
        $this->country = $country;
    }


    /**
     * @return mixed
     */
    public function getLocationName()
    {
        return $this->locationName;
    }

    /**
     * @param mixed $locationName
     * @return Location
     */
    public function setLocationName($locationName)
    {
        $this->locationName = $locationName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param mixed $streetNumber
     * @return Location
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     * @return Location
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubDistrict()
    {
        return $this->subDistrict;
    }

    /**
     * @param mixed $subDistrict
     * @return Location
     */
    public function setSubDistrict($subDistrict)
    {
        $this->subDistrict = $subDistrict;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->District;
    }

    /**
     * @param mixed $District
     * @return Location
     */
    public function setDistrict($District)
    {
        $this->District = $District;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Location
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     * @return Location
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @return Location
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
    
}