<?php

class Event
{
    public static $EVENTID_PRIMARY = 0;
    private $eventID;
    private $eventName;
    private $eventType;
    private $detail;
    private $startDate;
    private $age;
    private $gender;
    private $currentEntries;
    private $maxEntries;
    private $attendingCost;
    private $indoorName;
    private $location;
    private $googleForm;
    private $thumbnail;

    /**
     * Event constructor.
     * @param $eventName
     * @param $eventType
     * @param $detail
     * @param $startDate
     * @param $age
     * @param $gender
     * @param $currentEntries
     * @param $maxEntries
     * @param $attendingCost
     * @param $indoorName
     * @param $location
     * @param $googleForm
     */
    public function __construct($eventName, $eventType, $detail, $startDate, $age, $gender, $maxEntries, $attendingCost, $indoorName, $location, $googleForm)
    {
        self::$EVENTID_PRIMARY++;
        $this->eventID = self::$EVENTID_PRIMARY;
        $this->eventName = $eventName;
        $this->eventType = $eventType;
        $this->detail = $detail;
        $this->startDate = $startDate;
        $this->age = $age;
        $this->gender = $gender;
        $this->currentEntries = 0;
        $this->maxEntries = $maxEntries;
        $this->attendingCost = $attendingCost;
        $this->indoorName = $indoorName;
        $this->location = $location;
        $this->googleForm = $googleForm;
    }

    /**
     * @return int
     */
    public static function getEVENTIDPRIMARY(): int
    {
        return self::$EVENTID_PRIMARY;
    }

    /**
     * @param int $EVENTID_PRIMARY
     */
    public static function setEVENTIDPRIMARY(int $EVENTID_PRIMARY): void
    {
        self::$EVENTID_PRIMARY = $EVENTID_PRIMARY;
    }

    /**
     * @return int
     */
    public function getEventID(): int
    {
        return $this->eventID;
    }

    /**
     * @param int $eventID
     */
    public function setEventID(int $eventID): void
    {
        $this->eventID = $eventID;
    }

    /**
     * @return mixed
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @param mixed $eventName
     */
    public function setEventName($eventName): void
    {
        $this->eventName = $eventName;
    }

    /**
     * @return mixed
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param mixed $eventType
     */
    public function setEventType($eventType): void
    {
        $this->eventType = $eventType;
    }

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param mixed $detail
     */
    public function setDetail($detail): void
    {
        $this->detail = $detail;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
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
     */
    public function setAge($age): void
    {
        $this->age = $age;
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
     */
    public function setGender($gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getCurrentEntries()
    {
        return $this->currentEntries;
    }

    /**
     * @param mixed $currentEntries
     */
    public function setCurrentEntries($currentEntries): void
    {
        $this->currentEntries = $currentEntries;
    }

    /**
     * @return mixed
     */
    public function getMaxEntries()
    {
        return $this->maxEntries;
    }

    /**
     * @param mixed $maxEntries
     */
    public function setMaxEntries($maxEntries): void
    {
        $this->maxEntries = $maxEntries;
    }

    /**
     * @return mixed
     */
    public function getAttendingCost()
    {
        return $this->attendingCost;
    }

    /**
     * @param mixed $attendingCost
     */
    public function setAttendingCost($attendingCost): void
    {
        $this->attendingCost = $attendingCost;
    }

    /**
     * @return mixed
     */
    public function getIndoorName()
    {
        return $this->indoorName;
    }

    /**
     * @param mixed $indoorName
     */
    public function setIndoorName($indoorName): void
    {
        $this->indoorName = $indoorName;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getGoogleForm()
    {
        return $this->googleForm;
    }

    /**
     * @param mixed $googleForm
     */
    public function setGoogleForm($googleForm): void
    {
        $this->googleForm = $googleForm;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail): void
    {
        $this->thumbnail = $thumbnail;
    }

    public function  getAttendingCostStr(){
        if($this->attendingCost <= 0){
            return "Free";
        } else {
            return "$this->attendingCost ฿";
        }
    }

    public function getEntries(){
        $remainEntries = ($this->maxEntries - $this->currentEntries);
        if($remainEntries <= 0){
            return "No available entry";
        } else {
            return "$this->currentEntries/$this->maxEntries ($remainEntries Entries left)";
        }
    }

    public function getAgeCondition(){
        if($this->age < 0){
            return 'Any Age';
        } else {
            return "Must be above $this->age";
        }
    }

    public function getGenderCondition(){
        switch ($this->gender){
            case 'a':
                return 'Any Gender';
            case 'f':
                return 'Female';
            case 'm':
                return 'Male';
            default:
                return "Shouldn't be executed this, some error occurs";
        }
    }

    public function getLocationName(){
        return $this->indoorName . ' - ' . $this->location;
    }
}