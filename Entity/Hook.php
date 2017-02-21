<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    20/01/17
 * Time:    09:13
 * Project: PartFire MangoPay Bundle
 * File:    Hook.php
 *
 **/

namespace PartFire\MangoPayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use PartFire\CommonBundle\Entity\CommonBaseEntity;
use PartFire\MangoPayBundle\MangoPayConstants;


/**
 * @ORM\Entity
 * @ORM\Table(name="partfire_mango_hook", indexes={
 *  @ORM\Index(name="index_enabled", columns={"enabled", "deleted", "status"}) })
 * @ORM\Entity(repositoryClass="PartFire\MangoPayBundle\Entity\Repository\HookRepository")
 * @ExclusionPolicy("all")
 */

class Hook extends CommonBaseEntity
{
    /**
     * @ORM\Column(name="resource_id",type="string", length=255, nullable=false);
     *
     */

    private $resourceId;

    /**
     * @ORM\Column(name="date",type="string", length=255, nullable=false);
     *
     */

    private $date;


    /**
     * @ORM\Column(name="event_type",type="string", length=255, nullable=false);
     *
     */

    private $eventType;

    /**
     * @ORM\Column(name="raw_hook_data",type="string", length=500, nullable=false);
     *
     */

    private $rawHookData;

    /**
     * @ORM\Column(name="raw_dto_data",type="text", nullable=true);
     *
     */

    private $dto;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=200, nullable=false)
     */
    protected $status;

    public function __construct()
    {
        parent::__construct();
        $this->status = MangoPayConstants::HOOK_NEW;
    }

    /**
     * @return mixed
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @param mixed $resourceId
     */
    public function setResourceId($resourceId)
    {
        $this->resourceId = $resourceId;
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
    public function setDate($date)
    {
        $this->date = $date;
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
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }

    /**
     * @return mixed
     */
    public function getRawHookData()
    {
        return $this->rawHookData;
    }

    /**
     * @param mixed $rawHookData
     */
    public function setRawHookData($rawHookData)
    {
        $this->rawHookData = $rawHookData;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDto()
    {
        return unserialize($this->dto);
    }

    /**
     * @param mixed $dto
     */
    public function setDto($dto)
    {
        $this->dto = serialize($dto);
    }


}