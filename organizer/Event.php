<?php

class Event
{
    public static $EVENTID_PRIMARY = 0;
    private $eventID;
    private $eventName;
    private $eventType;
    private $eventDescription;
    private $eventThumbnail;
    private $eventEntries;
    private $precondition;
    private $attendingCost;
    private $locationInfo;

    /**
     * Event constructor.
     * @param $eventID
     * @param $eventName
     * @param $eventType
     * @param $eventDescription
     * @param $eventEntries
     * @param $precondition
     * @param $attendingCost
     * @param $locationInfo
     */
    public function __construct($eventName, $eventType, $eventDescription,
                                $eventEntries, $precondition, $attendingCost, $locationInfo)
    {
        self::$EVENTID_PRIMARY++;
        $this->eventID = self::$EVENTID_PRIMARY;
        $this->eventName = $eventName;
        $this->eventType = $eventType;
        $this->eventDescription = $eventDescription;
        $this->eventEntries = $eventEntries;
        $this->precondition = $precondition;
        $this->attendingCost = $attendingCost;
        $this->locationInfo = $locationInfo;
    }

    public function addThumbnail($thumbnailName)
    {
        $this->eventThumbnail = $thumbnailName;
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
     * @return Event
     */
    public function setEventID(int $eventID): Event
    {
        $this->eventID = $eventID;
        return $this;
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
     * @return Event
     */
    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
        return $this;
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
     * @return Event
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEventDescription()
    {
        return $this->eventDescription;
    }

    /**
     * @param mixed $eventDescription
     * @return Event
     */
    public function setEventDescription($eventDescription)
    {
        $this->eventDescription = $eventDescription;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEventEntries()
    {
        return $this->eventEntries;
    }

    /**
     * @param mixed $eventEntries
     * @return Event
     */
    public function setEventEntries($eventEntries)
    {
        $this->eventEntries = $eventEntries;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecondition()
    {
        return $this->precondition;
    }

    /**
     * @param mixed $precondition
     * @return Event
     */
    public function setPrecondition($precondition)
    {
        $this->precondition = $precondition;
        return $this;
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
     * @return Event
     */
    public function setAttendingCost($attendingCost)
    {
        $this->attendingCost = $attendingCost;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocationInfo()
    {
        return $this->locationInfo;
    }

    /**
     * @param mixed $locationInfo
     * @return Event
     */
    public function setLocationInfo($locationInfo)
    {
        $this->locationInfo = $locationInfo;
        return $this;
    }



}