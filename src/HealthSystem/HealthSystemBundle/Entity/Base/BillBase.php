<?php
// HealthSystem\HealthSystemBundle\Entity\Base\BillBase.php

/************************************************************************************************
 **  THIS IS AN AUTOMATICALLY GENERATED BASE FILE AND SHOULD NOT BE MANUALLY EDITED            **
 **  All user content should be placed within <user-additions part="(name)"></user-additions>  **
 ************************************************************************************************/

/*
 * This file was automatically generated with 'Autocode'
 * by Jose Diaz-Angulo <jose@diazangulo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with the package's source code.
 */

namespace HealthSystem\HealthSystemBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use HealthSystem\HealthSystemBundle\Entity\Bill;
use HealthSystem\HealthSystemBundle\Entity\Appointment;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Bill
 *
 * @ORM\MappedSuperclass
 */
abstract class BillBase
{
    // <editor-fold desc="Attributes">
    /**
     * @var Appointment $appointmentId
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="HealthSystem\HealthSystemBundle\Entity\Appointment", inversedBy="bill", cascade={"persist"})
     * @ORM\JoinColumn(name="appointmentId", referencedColumnName="id")
     *
     * @Assert\Type(type="object", message="Appointment Id should be of type Appointment.")
     * @Assert\NotBlank(message="Appointment Id should not be blank.")
     */
    protected $appointmentId;

    /**
     * @var \DateTime $date
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     *
     * @Assert\Type(type="object", message="Date should be of type \DateTime.")
     * @Assert\NotBlank(message="Date should not be blank.")
     */
    protected $date;

    /**
     * @var float $amount
     *
     * @ORM\Column(name="amount", type="decimal", nullable=false)
     *
     * @Assert\Type(type="float", message="Amount should be of type float.")
     * @Assert\NotBlank(message="Amount should not be blank.")
     */
    protected $amount;

    /**
     * @var string $purpose
     *
     * @ORM\Column(name="purpose", type="string", length=50, nullable=false)
     *
     * @Assert\Type(type="string", message="Purpose should be of type string.")
     * @Assert\NotBlank(message="Purpose should not be blank.")
     * @Assert\Length(
     *     max = "50",
     *     maxMessage = "Purpose is too long. It should have 50 characters or less."
     * )
     */
    protected $purpose;

    // </editor-fold>

    // <editor-fold desc="Constructor">
    public function __construct()
    {
    }
    // </editor-fold>

    // <editor-fold desc="Setters and getters">
    /**
     * Set appointmentId
     *
     * @param AppointmentBase|Appointment $appointmentId
     * @param bool                        $_reverseCall
     *
     * @return $this
     */
    public function setAppointmentId(Appointment $appointmentId, $_reverseCall = true)
    {
        if ($appointmentId !== $this->appointmentId) {
            if (!$_reverseCall) {
                $this->appointmentId = $appointmentId;
            } else {
                if (null !== $this->appointmentId) {
                    $this->appointmentId->clearBill();
                }

                $this->appointmentId = $appointmentId;

                if (null !== $appointmentId) {
                    $appointmentId->setBill($this);
                }
            }
        }

        return $this;
    }

    /**
     * Clear appointmentId
     *
     * @return $this
     */
    public function clearAppointmentId()
    {
        $this->appointmentId = null;

        return $this;
    }

    /**
     * Get appointmentId
     *
     * @return AppointmentBase|Appointment
     */
    public function getAppointmentId()
    {
        return $this->appointmentId;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setAmount($amount)
    {
        if (!is_numeric($amount)) {
            throw new \InvalidArgumentException('The attribute amount on the class Bill has to be float (' . gettype($amount) . ('object' === gettype($amount) ? ' ' . get_class($amount) : '') . ' given).');
        }

        $this->amount = floatval($amount);

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set purpose
     *
     * @param string $purpose
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setPurpose($purpose)
    {
        if (!is_string($purpose)) {
            throw new \InvalidArgumentException('The attribute purpose on the class Bill has to be string (' . gettype($purpose) . ('object' === gettype($purpose) ? ' ' . get_class($purpose) : '') . ' given).');
        }

        $this->purpose = $purpose;

        return $this;
    }

    /**
     * Get purpose
     *
     * @return string
     */
    public function getPurpose()
    {
        return $this->purpose;
    }
    // </editor-fold>

    // <editor-fold desc="Other methods">
    /**
     * Bill to string (Default)
     *
     * @return string
     */
    public function __toString()
    {
        return 'Bill(' . $this->appointmentId . ')';
    }
    // </editor-fold>
}
