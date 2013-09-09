<?php
// HealthSystem\HealthSystemBundle\Entity\Base\SymptomBase.php

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
use HealthSystem\HealthSystemBundle\Entity\Symptom;
use HealthSystem\HealthSystemBundle\Entity\Patient;
use HealthSystem\HealthSystemBundle\Entity\Treatment;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Symptom
 *
 * @ORM\MappedSuperclass
 */
abstract class SymptomBase
{
    // <editor-fold desc="Attributes">
    /**
     * @var string $name
     *
     * @ORM\Id
     * @ORM\Column(name="name", type="string", length=50)
     *
     * @Assert\Type(type="string", message="Name should be of type string.")
     * @Assert\NotBlank(message="Name should not be blank.")
     * @Assert\Length(
     *     max = "50",
     *     maxMessage = "Name is too long. It should have 50 characters or less."
     * )
     */
    protected $name;

    /**
     * @var Patient[]|Collection $patients
     *
     * @ORM\ManyToMany(targetEntity="HealthSystem\HealthSystemBundle\Entity\Patient", mappedBy="symptoms")
     *
     * @Assert\NotBlank(message="Patients should not be blank.")
     */
    protected $patients;

    /**
     * @var Treatment[]|Collection $treatments
     *
     * @ORM\OneToMany(targetEntity="HealthSystem\HealthSystemBundle\Entity\Treatment", mappedBy="symptomName", cascade={"persist", "remove"})
     */
    protected $treatments;

    // </editor-fold>

    // <editor-fold desc="Constructor">
    public function __construct()
    {
        $this->patients   = new ArrayCollection();
        $this->treatments = new ArrayCollection();
    }
    // </editor-fold>

    // <editor-fold desc="Setters and getters">
    /**
     * Set name
     *
     * @param string $name
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setName($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException('The attribute name on the class Symptom has to be string (' . gettype($name) . ('object' === gettype($name) ? ' ' . get_class($name) : '') . ' given).');
        }

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set patients
     *
     * @param PatientBase[]|Patient[]|Collection $patients
     * @param bool                               $_reverseCall
     *
     * @return $this
     */
    public function setPatients(Collection $patients, $_reverseCall = true)
    {
        foreach ($this->patients as $patient) {
            if (!$patients->contains($patient)) {
                $this->removePatient($patient, $_reverseCall);
            } else {
                $patients->removeElement($patient);
            }
        }

        $this->addPatients($patients, false, $_reverseCall);

        return $this;
    }

    /**
     * Add patient
     *
     * @param PatientBase|Patient $patient
     * @param bool                $_allowRepeatedValues
     * @param bool                $_reverseCall
     *
     * @return $this
     */
    public function addPatient(Patient $patient, $_allowRepeatedValues = false, $_reverseCall = true)
    {
        if ($_allowRepeatedValues || !$this->patients->contains($patient)) {
            $this->patients[] = $patient;

            if ($_reverseCall) {
                $patient->addSymptom($this, $_allowRepeatedValues, false);
            }
        }

        return $this;
    }

    /**
     * Add patients
     *
     * @param PatientBase[]|Patient[]|Collection $patients
     * @param bool                               $_allowRepeatedValues
     * @param bool                               $_reverseCall
     *
     * @return $this
     */
    public function addPatients(Collection $patients, $_allowRepeatedValues = false, $_reverseCall = true)
    {
        foreach ($patients as $patient) {
            $this->addPatient($patient, $_allowRepeatedValues, $_reverseCall);
        }

        return $this;
    }

    /**
     * Contains patient
     *
     * @param PatientBase|Patient $patient
     *
     * @return bool
     */
    public function containsPatient(Patient $patient)
    {
        return $this->patients->contains($patient);
    }

    /**
     * Contains patients
     *
     * @param PatientBase[]|Patient[]|Collection $patients
     *
     * @return bool
     */
    public function containsPatients(Collection $patients)
    {
        foreach ($patients as $patient) {
            if (!$this->containsPatient($patient)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Remove patient
     *
     * @param PatientBase|Patient $patient
     * @param bool                $_reverseCall
     *
     * @return $this
     */
    public function removePatient(Patient $patient, $_reverseCall = true)
    {
        if ($this->patients->removeElement($patient) && $_reverseCall) {
            $patient->removeSymptom($this, false);
        }

        return $this;
    }

    /**
     * Remove patients
     *
     * @param PatientBase[]|Patient[]|Collection $patients
     * @param bool                               $_reverseCall
     *
     * @return $this
     */
    public function removePatients(Collection $patients, $_reverseCall = true)
    {
        foreach ($patients as $patient) {
            $this->removePatient($patient, $_reverseCall);
        }

        return $this;
    }

    /**
     * Get patients
     *
     * @return PatientBase[]|Patient[]|Collection
     */
    public function getPatients()
    {
        return $this->patients;
    }

    /**
     * Set treatments
     *
     * @param TreatmentBase[]|Treatment[]|Collection $treatments
     * @param bool                                   $_reverseCall
     *
     * @return $this
     */
    public function setTreatments(Collection $treatments, $_reverseCall = true)
    {
        foreach ($this->treatments as $treatment) {
            if (!$treatments->contains($treatment)) {
                $this->removeTreatment($treatment, $_reverseCall);
            } else {
                $treatments->removeElement($treatment);
            }
        }

        $this->addTreatments($treatments, false, $_reverseCall);

        return $this;
    }

    /**
     * Add treatment
     *
     * @param Treatment $treatment
     * @param bool      $_allowRepeatedValues
     * @param bool      $_reverseCall
     *
     * @return $this
     */
    public function addTreatment(Treatment $treatment, $_allowRepeatedValues = false, $_reverseCall = true)
    {
        if ($_allowRepeatedValues || !$this->treatments->contains($treatment)) {
            $this->treatments[] = $treatment;

            if ($_reverseCall) {
                $treatment->setSymptomName($this, false);
            }
        }

        return $this;
    }

    /**
     * Add treatments
     *
     * @param TreatmentBase[]|Treatment[]|Collection $treatments
     * @param bool                                   $_allowRepeatedValues
     * @param bool                                   $_reverseCall
     *
     * @return $this
     */
    public function addTreatments(Collection $treatments, $_allowRepeatedValues = false, $_reverseCall = true)
    {
        foreach ($treatments as $treatment) {
            $this->addTreatment($treatment, $_allowRepeatedValues, $_reverseCall);
        }

        return $this;
    }

    /**
     * Contains treatment
     *
     * @param Treatment $treatment
     *
     * @return bool
     */
    public function containsTreatment(Treatment $treatment)
    {
        return $this->treatments->contains($treatment);
    }

    /**
     * Contains treatments
     *
     * @param TreatmentBase[]|Treatment[]|Collection $treatments
     *
     * @return bool
     */
    public function containsTreatments(Collection $treatments)
    {
        foreach ($treatments as $treatment) {
            if (!$this->containsTreatment($treatment)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Remove treatment
     *
     * @param Treatment $treatment
     * @param bool      $_reverseCall
     *
     * @return $this
     */
    public function removeTreatment(Treatment $treatment, $_reverseCall = true)
    {
        if ($this->treatments->removeElement($treatment) && $_reverseCall) {
            $treatment->setSymptomName(null, false);
        }

        return $this;
    }

    /**
     * Remove treatments
     *
     * @param TreatmentBase[]|Treatment[]|Collection $treatments
     * @param bool                                   $_reverseCall
     *
     * @return $this
     */
    public function removeTreatments(Collection $treatments, $_reverseCall = true)
    {
        foreach ($treatments as $treatment) {
            $this->removeTreatment($treatment, $_reverseCall);
        }

        return $this;
    }

    /**
     * Get treatments
     *
     * @return TreatmentBase[]|Treatment[]|Collection
     */
    public function getTreatments()
    {
        return $this->treatments;
    }
    // </editor-fold>

    // <editor-fold desc="Other methods">
    /**
     * Symptom to string (name)
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->name);
    }
    // </editor-fold>
}
