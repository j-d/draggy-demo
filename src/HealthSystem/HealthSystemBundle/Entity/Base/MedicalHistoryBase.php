<?php
// HealthSystem\HealthSystemBundle\Entity\Base\MedicalHistoryBase.php

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
use HealthSystem\HealthSystemBundle\Entity\MedicalHistory;
use HealthSystem\HealthSystemBundle\Entity\Patient;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\MedicalHistory
 *
 * @ORM\MappedSuperclass
 */
abstract class MedicalHistoryBase
{
    // <editor-fold desc="Attributes">
    /**
     * @var Patient $patientId
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="HealthSystem\HealthSystemBundle\Entity\Patient", inversedBy="medicalHistory", cascade={"persist"})
     * @ORM\JoinColumn(name="patientId", referencedColumnName="id")
     *
     * @Assert\Type(type="object", message="Patient Id should be of type Patient.")
     * @Assert\NotBlank(message="Patient Id should not be blank.")
     */
    protected $patientId;

    /**
     * @var string|null $heartDisease
     *
     * @ORM\Column(name="heartDisease", type="text", nullable=true)
     *
     * @Assert\Type(type="string", message="Heart Disease should be of type string.")
     */
    protected $heartDisease;

    /**
     * @var string|null $highBloodPressure
     *
     * @ORM\Column(name="highBloodPressure", type="text", nullable=true)
     *
     * @Assert\Type(type="string", message="High Blood Pressure should be of type string.")
     */
    protected $highBloodPressure;

    /**
     * @var string|null $diabetes
     *
     * @ORM\Column(name="diabetes", type="text", nullable=true)
     *
     * @Assert\Type(type="string", message="Diabetes should be of type string.")
     */
    protected $diabetes;

    /**
     * @var string|null $allergies
     *
     * @ORM\Column(name="allergies", type="text", nullable=true)
     *
     * @Assert\Type(type="string", message="Allergies should be of type string.")
     */
    protected $allergies;

    // </editor-fold>

    // <editor-fold desc="Setters and getters">
    /**
     * Set patientId
     *
     * @param PatientBase|Patient $patientId
     * @param bool                $_reverseCall
     *
     * @return $this
     */
    public function setPatientId(Patient $patientId, $_reverseCall = true)
    {
        if ($patientId !== $this->patientId) {
            if (!$_reverseCall) {
                $this->patientId = $patientId;
            } else {
                if (null !== $this->patientId) {
                    $this->patientId->clearMedicalHistory();
                }

                $this->patientId = $patientId;

                if (null !== $patientId) {
                    $patientId->setMedicalHistory($this);
                }
            }
        }

        return $this;
    }

    /**
     * Clear patientId
     *
     * @return $this
     */
    public function clearPatientId()
    {
        $this->patientId = null;

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
     * Set heartDisease
     *
     * @param string|null $heartDisease
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setHeartDisease($heartDisease)
    {
        if (!is_string($heartDisease) && null !== $heartDisease) {
            throw new \InvalidArgumentException('The attribute heartDisease on the class MedicalHistory has to be string or null (' . gettype($heartDisease) . ('object' === gettype($heartDisease) ? ' ' . get_class($heartDisease) : '') . ' given).');
        }

        $this->heartDisease = $heartDisease;

        return $this;
    }

    /**
     * Get heartDisease
     *
     * @return string|null
     */
    public function getHeartDisease()
    {
        return $this->heartDisease;
    }

    /**
     * Set highBloodPressure
     *
     * @param string|null $highBloodPressure
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setHighBloodPressure($highBloodPressure)
    {
        if (!is_string($highBloodPressure) && null !== $highBloodPressure) {
            throw new \InvalidArgumentException('The attribute highBloodPressure on the class MedicalHistory has to be string or null (' . gettype($highBloodPressure) . ('object' === gettype($highBloodPressure) ? ' ' . get_class($highBloodPressure) : '') . ' given).');
        }

        $this->highBloodPressure = $highBloodPressure;

        return $this;
    }

    /**
     * Get highBloodPressure
     *
     * @return string|null
     */
    public function getHighBloodPressure()
    {
        return $this->highBloodPressure;
    }

    /**
     * Set diabetes
     *
     * @param string|null $diabetes
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setDiabetes($diabetes)
    {
        if (!is_string($diabetes) && null !== $diabetes) {
            throw new \InvalidArgumentException('The attribute diabetes on the class MedicalHistory has to be string or null (' . gettype($diabetes) . ('object' === gettype($diabetes) ? ' ' . get_class($diabetes) : '') . ' given).');
        }

        $this->diabetes = $diabetes;

        return $this;
    }

    /**
     * Get diabetes
     *
     * @return string|null
     */
    public function getDiabetes()
    {
        return $this->diabetes;
    }

    /**
     * Set allergies
     *
     * @param string|null $allergies
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setAllergies($allergies)
    {
        if (!is_string($allergies) && null !== $allergies) {
            throw new \InvalidArgumentException('The attribute allergies on the class MedicalHistory has to be string or null (' . gettype($allergies) . ('object' === gettype($allergies) ? ' ' . get_class($allergies) : '') . ' given).');
        }

        $this->allergies = $allergies;

        return $this;
    }

    /**
     * Get allergies
     *
     * @return string|null
     */
    public function getAllergies()
    {
        return $this->allergies;
    }
    // </editor-fold>

    // <editor-fold desc="Other methods">
    /**
     * MedicalHistory to string (Default)
     *
     * @return string
     */
    public function __toString()
    {
        return 'MedicalHistory(' . $this->patientId . ')';
    }
    // </editor-fold>
}
