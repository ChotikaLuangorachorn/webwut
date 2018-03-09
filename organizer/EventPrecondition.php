<?php
/**
 * Created by PhpStorm.
 * User: XANNIEZ
 * Date: 10/3/2561
 * Time: 2:09
 */

class EventPrecondition
{
    private $age;
    private $gender;

    /**
     * EventPrecondition constructor.
     * @param $age
     * @param $gender
     */
    public function __construct($age, $gender)
    {
        $this->age = $age;
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return EventPrecondition
     */
    public function setAge($age)
    {
        $this->age = $age;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @return EventPrecondition
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }
}