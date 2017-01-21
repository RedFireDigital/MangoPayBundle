<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    20/01/17
 * Time:    09:13
 * Project: fruitful-property-investments
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
     * @ORM\Column(name="hookId",type="string", length=255, unique=true, nullable=false);
     *
     */

    private $hookId;

    /**
     * @ORM\Column(name="hook_creation_date",type="string", length=255, nullable=false);
     *
     */

    private $hookCreationDate;

    /**
     * @ORM\Column(name="hook_tag",type="string", length=255, nullable=false);
     *
     */

    private $hookTag;

    /**
     * @ORM\Column(name="hook_url",type="string", length=255, nullable=false);
     *
     */

    private $hookUrl;

    /**
     * @ORM\Column(name="hook_status",type="string", length=255, nullable=false);
     *
     */

    private $hookStatus;

    /**
     * @ORM\Column(name="hook_validity",type="string", length=255, nullable=false);
     *
     */

    private $hookValidity;

    /**
     * @ORM\Column(name="hook_event_type",type="string", length=255, nullable=false);
     *
     */

    private $hookEventType;

    /**
     * @ORM\Column(name="raw_hook_data",type="string", length=500, nullable=false);
     *
     */

    private $rawHookData;

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
    public function getHookId()
    {
        return $this->hookId;
    }

    /**
     * @param mixed $hookId
     */
    public function setHookId($hookId)
    {
        $this->hookId = $hookId;
    }

    /**
     * @return mixed
     */
    public function getHookCreationDate()
    {
        return $this->hookCreationDate;
    }

    /**
     * @param mixed $hookCreationDate
     */
    public function setHookCreationDate($hookCreationDate)
    {
        $this->hookCreationDate = $hookCreationDate;
    }

    /**
     * @return mixed
     */
    public function getHookTag()
    {
        return $this->hookTag;
    }

    /**
     * @param mixed $hookTag
     */
    public function setHookTag($hookTag)
    {
        $this->hookTag = $hookTag;
    }

    /**
     * @return mixed
     */
    public function getHookUrl()
    {
        return $this->hookUrl;
    }

    /**
     * @param mixed $hookUrl
     */
    public function setHookUrl($hookUrl)
    {
        $this->hookUrl = $hookUrl;
    }

    /**
     * @return mixed
     */
    public function getHookStatus()
    {
        return $this->hookStatus;
    }

    /**
     * @param mixed $hookStatus
     */
    public function setHookStatus($hookStatus)
    {
        $this->hookStatus = $hookStatus;
    }

    /**
     * @return mixed
     */
    public function getHookValidity()
    {
        return $this->hookValidity;
    }

    /**
     * @param mixed $hookValidity
     */
    public function setHookValidity($hookValidity)
    {
        $this->hookValidity = $hookValidity;
    }

    /**
     * @return mixed
     */
    public function getHookEventType()
    {
        return $this->hookEventType;
    }

    /**
     * @param mixed $hookEventType
     */
    public function setHookEventType($hookEventType)
    {
        $this->hookEventType = $hookEventType;
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


}