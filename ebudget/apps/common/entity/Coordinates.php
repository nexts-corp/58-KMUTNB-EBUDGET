<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="COORDINATES")
 */
class Coordinates  extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="COORDINATES_ID")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="decimal",length=18, name="LATITUDE") */
    public $latitude;

    /** @Column(type="decimal",length=18, name="LONGITUDE") */
    public $longitude;

    /** @Column(type="integer",length=11, name="BUILDINGID") */
    public $buildingId;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getLatitude()
    {
        return $this->latitude;
    }


    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }


    public function getLongitude()
    {
        return $this->longitude;
    }


    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }


    public function getBuildingId()
    {
        return $this->buildingId;
    }


    public function setBuildingId($buildingId)
    {
        $this->buildingId = $buildingId;
    }




}