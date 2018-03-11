<?php

class Event
{
    private $eventID;
    private $orgID;
    private $eventName;
    private $eventType;
    private $detail;
    private $date;
    private $age;
    private $gender;
    private $currentEntries;
    private $maxEntries;
    private $attendingCost;
    private $indoorName;
    private $location;
    private $surveyLink;
    private $thumbnail;

    /**
     * Event constructor.
     * @param $eventName
     * @param $eventType
     * @param $detail
     * @param $date
     * @param $age
     * @param $gender
     * @param $maxEntries
     * @param $attendingCost
     * @param $indoorName
     * @param $location
     * @param $surveyLink
     */

    public function __construct($eventName, $eventType, $detail, $date, $age,
                                $gender, $maxEntries, $attendingCost, $indoorName, $location, $surveyLink)
    {
        $this->eventName = $eventName;
        $this->eventType = $eventType;
        $this->detail = $detail;
        $this->date = $date;
        $this->age = $age;
        $this->gender = $gender;
        $this->currentEntries = 0;
        $this->maxEntries = $maxEntries;
        $this->attendingCost = $attendingCost;
        $this->indoorName = $indoorName;
        $this->location = $location;
        $this->surveyLink = $surveyLink;
    }

    /**
     * @return int
     */
    public function getEventID(): int
    {
        return $this->eventID;
    }

    /**
     * @param mixed $eventID
     */
    public function setEventID($eventID): void
    {
        $this->eventID = $eventID;
    }

    /**
     * @return mixed
     */
    public function getOrgID()
    {
        return $this->orgID;
    }

    /**
     * @param mixed $orgID
     */
    public function setOrgID($orgID): void
    {
        $this->orgID = $orgID;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
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
     * @return int
     */
    public function getCurrentEntries(): int
    {
        return $this->currentEntries;
    }

    /**
     * @param int $currentEntries
     */
    public function setCurrentEntries(int $currentEntries): void
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
    public function getSurveyLink()
    {
        return $this->surveyLink;
    }

    /**
     * @param mixed $surveyLink
     */
    public function setSurveyLink($surveyLink): void
    {
        $this->surveyLink = $surveyLink;
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


    public function getAgeCondition(): string
    {
        if ($this->age <= 0) {
            return 'Any Age';
        } else {
            return "Must be above $this->age";
        }
    }

    public function getAttendingCostStr(): string
    {
        if ($this->attendingCost <= 0) {
            return "Free";
        } else {
            return "$this->attendingCost ฿";
        }
    }

    public function getEntries(): string
    {
        $remainEntries = ($this->maxEntries - $this->currentEntries);
        if ($remainEntries <= 0) {
            return "No available entry";
        } else {
            if ($remainEntries == 1) {
                return "$this->currentEntries/$this->maxEntries (Only $remainEntries Entry left!)";
            }
            return "$this->currentEntries/$this->maxEntries ($remainEntries Entries left)";
        }
    }

    public function getGenderCondition(): string
    {
        switch ($this->gender) {
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

    public function getLocationName(): string
    {
        return $this->indoorName . ' &raquo; ' . $this->location;
    }
}