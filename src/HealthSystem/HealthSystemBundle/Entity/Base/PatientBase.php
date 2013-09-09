<?php
// HealthSystem\HealthSystemBundle\Entity\Base\PatientBase.php

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
use HealthSystem\HealthSystemBundle\Entity\Patient;
use HealthSystem\HealthSystemBundle\Entity\Person;
use HealthSystem\HealthSystemBundle\Entity\Symptom;
use HealthSystem\HealthSystemBundle\Entity\MedicalHistory;
use HealthSystem\HealthSystemBundle\Entity\Appointment;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Patient
 *
 * @ORM\MappedSuperclass
 */
abstract class PatientBase extends Person
{
    // <editor-fold desc="Attributes">
    /**
     * @var Symptom[]|Collection $symptoms
     *
     * @ORM\ManyToMany(targetEntity="HealthSystem\HealthSystemBundle\Entity\Symptom", inversedBy="patients")
     * @ORM\JoinTable(
     *     name="PatientToSymptom",
     *     joinColumns={@ORM\JoinColumn(name="patients", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="symptoms", referencedColumnName="name")}
     * )
     *
     * @Assert\NotBlank(message="Symptoms should not be blank.")
     */
    protected $symptoms;

    /**
     * @var MedicalHistory $medicalHistory
     *
     * @ORM\OneToOne(targetEntity="HealthSystem\HealthSystemBundle\Entity\MedicalHistory", mappedBy="patientId", cascade={"persist", "remove"})
     */
    protected $medicalHistory;

    /**
     * @var Appointment[]|Collection $appointments
     *
     * @ORM\OneToMany(targetEntity="HealthSystem\HealthSystemBundle\Entity\Appointment", mappedBy="patientId", cascade={"persist", "remove"})
     */
    protected $appointments;

    // </editor-fold>

    // <editor-fold desc="Constructor">
    public function __construct()
    {
        $this->symptoms     = new ArrayCollection();
        $this->appointments = new ArrayCollection();
    }
    // </editor-fold>

    // <editor-fold desc="Setters and getters">
    /**
     * Set symptoms
     *
     * @param SymptomBase[]|Symptom[]|Collection $symptoms
     * @param bool                               $_reverseCall
     *
     * @return $this
     */
    public function setSymptoms(Collection $symptoms, $_reverseCall = true)
    {
        foreach ($this->symptoms as $symptom) {
            if (!$symptoms->contains($symptom)) {
                $this->removeSymptom($symptom, $_reverseCall);
            } else {
                $symptoms->removeElement($symptom);
            }
        }

        $this->addSymptoms($symptoms, false, $_reverseCall);

        return $this;
    }

    /**
     * Add symptom
     *
     * @param SymptomBase|Symptom $symptom
     * @param bool                $_allowRepeatedValues
     * @param bool                $_reverseCall
     *
     * @return $this
     */
    public function addSymptom(Symptom $symptom, $_allowRepeatedValues = false, $_reverseCall = true)
    {
        if ($_allowRepeatedValues || !$this->symptoms->contains($symptom)) {
            $this->symptoms[] = $symptom;

            if ($_reverseCall) {
                $symptom->addPatient($this, $_allowRepeatedValues, false);
            }
        }

        return $this;
    }

    /**
     * Add symptoms
     *
     * @param SymptomBase[]|Symptom[]|Collection $symptoms
     * @param bool                               $_allowRepeatedValues
     * @param bool                               $_reverseCall
     *
     * @return $this
     */
    public function addSymptoms(Collection $symptoms, $_allowRepeatedValues = false, $_reverseCall = true)
    {
        foreach ($symptoms as $symptom) {
            $this->addSymptom($symptom, $_allowRepeatedValues, $_reverseCall);
        }

        return $this;
    }

    /**
     * Contains symptom
     *
     * @param SymptomBase|Symptom $symptom
     *
     * @return bool
     */
    public function containsSymptom(Symptom $symptom)
    {
        return $this->symptoms->contains($symptom);
    }

    /**
     * Contains symptoms
     *
     * @param SymptomBase[]|Symptom[]|Collection $symptoms
     *
     * @return bool
     */
    public function containsSymptoms(Collection $symptoms)
    {
        foreach ($symptoms as $symptom) {
            if (!$this->containsSymptom($symptom)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Remove symptom
     *
     * @param SymptomBase|Symptom $symptom
     * @param bool                $_reverseCall
     *
     * @return $this
     */
    public function removeSymptom(Symptom $symptom, $_reverseCall = true)
    {
        if ($this->symptoms->removeElement($symptom) && $_reverseCall) {
            $symptom->removePatient($this, false);
        }

        return $this;
    }

    /**
     * Remove symptoms
     *
     * @param SymptomBase[]|Symptom[]|Collection $symptoms
     * @param bool                               $_reverseCall
     *
     * @return $this
     */
    public function removeSymptoms(Collection $symptoms, $_reverseCall = true)
    {
        foreach ($symptoms as $symptom) {
            $this->removeSymptom($symptom, $_reverseCall);
        }

        return $this;
    }

    /**
     * Get symptoms
     *
     * @return SymptomBase[]|Symptom[]|Collection
     */
    public function getSymptoms()
    {
        return $this->symptoms;
    }

    /**
     * Set medicalHistory
     *
     * @param MedicalHistoryBase|MedicalHistory $medicalHistory
     * @param bool                              $_reverseCall
     *
     * @return $this
     */
    public function setMedicalHistory(MedicalHistory $medicalHistory, $_reverseCall = true)
    {
        if ($medicalHistory !== $this->medicalHistory) {
            if (!$_reverseCall) {
                $this->medicalHistory = $medicalHistory;
            } else {
                if (null !== $this->medicalHistory) {
                    $this->medicalHistory->clearPatientId();
                }

                $this->medicalHistory = $medicalHistory;

                if (null !== $medicalHistory) {
                    $medicalHistory->setPatientId($this);
                }
            }
        }

        return $this;
    }

    /**
     * Clear medicalHistory
     *
     * @return $this
     */
    public function clearMedicalHistory()
    {
        $this->medicalHistory = null;

        return $this;
    }

    /**
     * Get medicalHistory
     *
     * @return MedicalHistoryBase|MedicalHistory
     */
    public function getMedicalHistory()
    {
        return $this->medicalHistory;
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
                $appointment->setPatientId($this, false);
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
            $appointment->setPatientId(null, false);
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
     * Patient to string (firstname)
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->firstname);
    }
    // </editor-fold>
}
