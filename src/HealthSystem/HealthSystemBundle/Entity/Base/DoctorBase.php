<?php
// HealthSystem\HealthSystemBundle\Entity\Base\DoctorBase.php

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
use HealthSystem\HealthSystemBundle\Entity\Doctor;
use HealthSystem\HealthSystemBundle\Entity\Employee;
use HealthSystem\HealthSystemBundle\Entity\Appointment;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Doctor
 *
 * @ORM\MappedSuperclass
 */
abstract class DoctorBase extends Employee
{
    // <editor-fold desc="Attributes">
    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     *
     * @Assert\Type(type="string", message="Email should be of type string.")
     * @Assert\NotBlank(message="Email should not be blank.")
     * @Assert\Length(
     *     max = "50",
     *     maxMessage = "Email is too long. It should have 50 characters or less."
     * )
     * @Assert\Email()
     */
    protected $email;

    /**
     * @var Appointment[]|Collection $appointments
     *
     * @ORM\OneToMany(targetEntity="HealthSystem\HealthSystemBundle\Entity\Appointment", mappedBy="doctorId", cascade={"persist", "remove"})
     */
    protected $appointments;

    // </editor-fold>

    // <editor-fold desc="Constructor">
    public function __construct()
    {
        $this->appointments = new ArrayCollection();
    }
    // </editor-fold>

    // <editor-fold desc="Setters and getters">
    /**
     * Set email
     *
     * @param string $email
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setEmail($email)
    {
        if (!is_string($email)) {
            throw new \InvalidArgumentException('The attribute email on the class Doctor has to be string (' . gettype($email) . ('object' === gettype($email) ? ' ' . get_class($email) : '') . ' given).');
        }

        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set appointments
     *
     * @param AppointmentBase[]|Appointment[]|Collection $appointments
     * @param bool                                       $_reverseCall
     *
     * @return $this
     */
    public function setAppointments(Collection $appointments, $_reverseCall = true)
    {
        foreach ($this->appointments as $appointment) {
            if (!$appointments->contains($appointment)) {
                $this->removeAppointment($appointment, $_reverseCall);
            } else {
                $appointments->removeElement($appointment);
            }
        }

        $this->addAppointments($appointments, false, $_reverseCall);

        return $this;
    }

    /**
     * Add appointment
     *
     * @param Appointment $appointment
     * @param bool        $_allowRepeatedValues
     * @param bool        $_reverseCall
     *
     * @return $this
     */
    public function addAppointment(Appointment $appointment, $_allowRepeatedValues = false, $_reverseCall = true)
    {
        if ($_allowRepeatedValues || !$this->appointments->contains($appointment)) {
            $this->appointments[] = $appointment;

            if ($_reverseCall) {
                $appointment->setDoctorId($this, false);
            }
        }

        return $this;
    }

    /**
     * Add appointments
     *
     * @param AppointmentBase[]|Appointment[]|Collection $appointments
     * @param bool                                       $_allowRepeatedValues
     * @param bool                                       $_reverseCall
     *
     * @return $this
     */
    public function addAppointments(Collection $appointments, $_allowRepeatedValues = false, $_reverseCall = true)
    {
        foreach ($appointments as $appointment) {
            $this->addAppointment($appointment, $_allowRepeatedValues, $_reverseCall);
        }

        return $this;
    }

    /**
     * Contains appointment
     *
     * @param Appointment $appointment
     *
     * @return bool
     */
    public function containsAppointment(Appointment $appointment)
    {
        return $this->appointments->contains($appointment);
    }

    /**
     * Contains appointments
     *
     * @param AppointmentBase[]|Appointment[]|Collection $appointments
     *
     * @return bool
     */
    public function containsAppointments(Collection $appointments)
    {
        foreach ($appointments as $appointment) {
            if (!$this->containsAppointment($appointment)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Remove appointment
     *
     * @param Appointment $appointment
     * @param bool        $_reverseCall
     *
     * @return $this
     */
    public function removeAppointment(Appointment $appointment, $_reverseCall = true)
    {
        if ($this->appointments->removeElement($appointment) && $_reverseCall) {
            $appointment->setDoctorId(null, false);
        }

        return $this;
    }

    /**
     * Remove appointments
     *
     * @param AppointmentBase[]|Appointment[]|Collection $appointments
     * @param bool                                       $_reverseCall
     *
     * @return $this
     */
    public function removeAppointments(Collection $appointments, $_reverseCall = true)
    {
        foreach ($appointments as $appointment) {
            $this->removeAppointment($appointment, $_reverseCall);
        }

        return $this;
    }

    /**
     * Get appointments
     *
     * @return AppointmentBase[]|Appointment[]|Collection
     */
    public function getAppointments()
    {
        return $this->appointments;
    }
    // </editor-fold>

    // <editor-fold desc="Other methods">
    /**
     * Doctor to string (lastname)
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->lastname);
    }
    // </editor-fold>
}
