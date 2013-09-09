<?php
// HealthSystem\HealthSystemBundle\Entity\Base\AppointmentBase.php

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
use HealthSystem\HealthSystemBundle\Entity\Appointment;
use HealthSystem\HealthSystemBundle\Entity\Patient;
use HealthSystem\HealthSystemBundle\Entity\Doctor;
use HealthSystem\HealthSystemBundle\Entity\Bill;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Appointment
 *
 * @ORM\MappedSuperclass
 */
abstract class AppointmentBase
{
    // <editor-fold desc="Attributes">
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Patient $patientId
     *
     * @ORM\ManyToOne(targetEntity="HealthSystem\HealthSystemBundle\Entity\Patient", inversedBy="appointments", cascade={"persist"})
     * @ORM\JoinColumn(name="patientId", referencedColumnName="id")
     *
     * @Assert\Type(type="object", message="Patient Id should be of type Patient.")
     * @Assert\NotBlank(message="Patient Id should not be blank.")
     */
    protected $patientId;

    /**
     * @var Doctor $doctorId
     *
     * @ORM\ManyToOne(targetEntity="HealthSystem\HealthSystemBundle\Entity\Doctor", inversedBy="appointments", cascade={"persist"})
     * @ORM\JoinColumn(name="doctorId", referencedColumnName="id")
     *
     * @Assert\Type(type="object", message="Doctor Id should be of type Doctor.")
     * @Assert\NotBlank(message="Doctor Id should not be blank.")
     */
    protected $doctorId;

    /**
     * @var \DateTime $time
     *
     * @ORM\Column(name="time", type="time", nullable=false)
     *
     * @Assert\Type(type="object", message="Time should be of type \DateTime.")
     * @Assert\NotBlank(message="Time should not be blank.")
     */
    protected $time;

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
     * @var string $reason
     *
     * @ORM\Column(name="reason", type="string", length=50, nullable=false)
     *
     * @Assert\Type(type="string", message="Reason should be of type string.")
     * @Assert\NotBlank(message="Reason should not be blank.")
     * @Assert\Length(
     *     max = "50",
     *     maxMessage = "Reason is too long. It should have 50 characters or less."
     * )
     */
    protected $reason;

    /**
     * @var Bill $bill
     *
     * @ORM\OneToOne(targetEntity="HealthSystem\HealthSystemBundle\Entity\Bill", mappedBy="appointmentId", cascade={"persist", "remove"})
     */
    protected $bill;

    // </editor-fold>

    // <editor-fold desc="Constructor">
    public function __construct()
    {
    }
    // </editor-fold>

    // <editor-fold desc="Setters and getters">
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set patientId
     *
     * @param PatientBase|Patient $patientId
     * @param bool                $_reverseCall
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setPatientId($patientId, $_reverseCall = true)
    {
        if (!$patientId instanceof Patient && null !== $patientId) {
            throw new \InvalidArgumentException('The attribute patientId on the class Appointment has to be Patient or null (' . gettype($patientId) . ('object' === gettype($patientId) ? ' ' . get_class($patientId) : '') . ' given).');
        }

        if ($patientId !== $this->patientId) {
            if ($_reverseCall) {
                $this->patientId = $patientId;
            } else {
                if (null !== $this->patientId) {
                    $this->patientId->removeAppointment($this);
                }

                $this->patientId = $patientId;

                if (null !== $this->patientId && !$this->patientId->containsAppointment($this)) {
                    $this->patientId->addAppointment($this);
                }
            }
        }

        return $this;
    }

    /**
     * Get patientId
     *
     * @return PatientBase|Patient
     */
    public function getPatientId()
    {
        return $this->patientId;
    }

    /**
     * Set doctorId
     *
     * @param DoctorBase|Doctor $doctorId
     * @param bool              $_reverseCall
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setDoctorId($doctorId, $_reverseCall = true)
    {
        if (!$doctorId instanceof Doctor && null !== $doctorId) {
            throw new \InvalidArgumentException('The attribute doctorId on the class Appointment has to be Doctor or null (' . gettype($doctorId) . ('object' === gettype($doctorId) ? ' ' . get_class($doctorId) : '') . ' given).');
        }

        if ($doctorId !== $this->doctorId) {
            if ($_reverseCall) {
                $this->doctorId = $doctorId;
            } else {
                if (null !== $this->doctorId) {
                    $this->doctorId->removeAppointment($this);
                }

                $this->doctorId = $doctorId;

                if (null !== $this->doctorId && !$this->doctorId->containsAppointment($this)) {
                    $this->doctorId->addAppointment($this);
                }
            }
        }

        return $this;
    }

    /**
     * Get doctorId
     *
     * @return DoctorBase|Doctor
     */
    public function getDoctorId()
    {
        return $this->doctorId;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
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
     * Set reason
     *
     * @param string $reason
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setReason($reason)
    {
        if (!is_string($reason)) {
            throw new \InvalidArgumentException('The attribute reason on the class Appointment has to be string (' . gettype($reason) . ('object' === gettype($reason) ? ' ' . get_class($reason) : '') . ' given).');
        }

        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set bill
     *
     * @param BillBase|Bill $bill
     * @param bool          $_reverseCall
     *
     * @return $this
     */
    public function setBill(Bill $bill, $_reverseCall = true)
    {
        if ($bill !== $this->bill) {
            if (!$_reverseCall) {
                $this->bill = $bill;
            } else {
                if (null !== $this->bill) {
                    $this->bill->clearAppointmentId();
                }

                $this->bill = $bill;

                if (null !== $bill) {
                    $bill->setAppointmentId($this);
                }
            }
        }

        return $this;
    }

    /**
     * Clear bill
     *
     * @return $this
     */
    public function clearBill()
    {
        $this->bill = null;

        return $this;
    }

    /**
     * Get bill
     *
     * @return BillBase|Bill
     */
    public function getBill()
    {
        return $this->bill;
    }
    // </editor-fold>

    // <editor-fold desc="Other methods">
    /**
     * Appointment to string (Default)
     *
     * @return string
     */
    public function __toString()
    {
        return 'Appointment(' . $this->id . ')';
    }
    // </editor-fold>
}
