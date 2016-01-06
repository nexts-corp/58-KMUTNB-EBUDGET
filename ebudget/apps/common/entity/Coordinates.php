<?php

namespace apps\common\entity;

/**
 * @Entity
 * @Table(name="Coordinates")
 */
class Coordinates  extends EntityBase {

    /**
     * @Id
     * @Column(type="integer",length=11,name="CoordinatesId")
     * @GeneratedValue
     */
    public $id;

    /** @Column(type="decimal",length=18, name="Latitude") */
    public $latitude;

    /** @Column(type="decimal",length=18, name="Longitude") */
    public $longitude;

    /** @Column(type="integer",length=11, name="BuildingId") */
    public $buildingId;

    function getId(){
        return $this->id;
    }

    function getLatitude(){
        return $this->latitude;
    }

    function getLongitude(){
        return $this->longitude;
    }

    function getBuildingId(){
        return $this->buildingId;
    }

    function setId($id){
        $this->id = $id;
    }

    function setLatitude($latitude){
        $this->latitude = $latitude;
    }

    function setLongitude($longitude){
        $this->longitude = $longitude;
    }

    function setBuildingId($buildingId){
        $this->buildingId = $buildingId;
    }
}