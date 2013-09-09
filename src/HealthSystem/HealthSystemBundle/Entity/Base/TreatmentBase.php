<?php
// HealthSystem\HealthSystemBundle\Entity\Base\TreatmentBase.php

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
use HealthSystem\HealthSystemBundle\Entity\Treatment;
use HealthSystem\HealthSystemBundle\Entity\Symptom;
use HealthSystem\HealthSystemBundle\Entity\Illness;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Treatment
 *
 * @ORM\MappedSuperclass
 */
abstract class TreatmentBase
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
     * @var Symptom $symptomName
     *
     * @ORM\ManyToOne(targetEntity="HealthSystem\HealthSystemBundle\Entity\Symptom", inversedBy="treatments", cascade={"persist"})
     * @ORM\JoinColumn(name="symptomName", referencedColumnName="name")
     *
     * @Assert\Type(type="object", message="Symptom Name should be of type Symptom.")
     * @Assert\NotBlank(message="Symptom Name should not be blank.")
     * @Assert\Length(
     *     max = "50",
     *     maxMessage = "Symptom Name is too long. It should have 50 characters or less."
     * )
     */
    protected $symptomName;

    /**
     * @var Illness $illnessCode
     *
     * @ORM\ManyToOne(targetEntity="HealthSystem\HealthSystemBundle\Entity\Illness", inversedBy="treatments", cascade={"persist"})
     * @ORM\JoinColumn(name="illnessCode", referencedColumnName="code")
     *
     * @Assert\Type(type="object", message="Illness Code should be of type Illness.")
     * @Assert\NotBlank(message="Illness Code should not be blank.")
     * @Assert\Length(
     *     max = "20",
     *     maxMessage = "Illness Code is too long. It should have 20 characters or less."
     * )
     */
    protected $illnessCode;

    /**
     * @var string|null $medication
     *
     * @ORM\Column(name="medication", type="string", length=100, nullable=true)
     *
     * @Assert\Type(type="string", message="Medication should be of type string.")
     * @Assert\Length(
     *     max = "100",
     *     maxMessage = "Medication is too long. It should have 100 characters or less."
     * )
     */
    protected $medication;

    /**
     * @var string|null $instructions
     *
     * @ORM\Column(name="instructions", type="text", nullable=true)
     *
     * @Assert\Type(type="string", message="Instructions should be of type string.")
     */
    protected $instructions;

    /**
     * @var string|null $symptomSeverity
     *
     * @ORM\Column(name="symptomSeverity", type="text", nullable=true)
     *
     * @Assert\Type(type="string", message="Symptom Severity should be of type string.")
     */
    protected $symptomSeverity;

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
     * Set symptomName
     *
     * @param SymptomBase|Symptom $symptomName
     * @param bool                $_reverseCall
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setSymptomName($symptomName, $_reverseCall = true)
    {
        if (!$symptomName instanceof Symptom && null !== $symptomName) {
            throw new \InvalidArgumentException('The attribute symptomName on the class Treatment has to be Symptom or null (' . gettype($symptomName) . ('object' === gettype($symptomName) ? ' ' . get_class($symptomName) : '') . ' given).');
        }

        if ($symptomName !== $this->symptomName) {
            if ($_reverseCall) {
                $this->symptomName = $symptomName;
            } else {
                if (null !== $this->symptomName) {
                    $this->symptomName->removeTreatment($this);
                }

                $this->symptomName = $symptomName;

                if (null !== $this->symptomName && !$this->symptomName->containsTreatment($this)) {
                    $this->symptomName->addTreatment($this);
                }
            }
        }

        return $this;
    }

    /**
     * Get symptomName
     *
     * @return SymptomBase|Symptom
     */
    public function getSymptomName()
    {
        return $this->symptomName;
    }

    /**
     * Set illnessCode
     *
     * @param IllnessBase|Illness $illnessCode
     * @param bool                $_reverseCall
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setIllnessCode($illnessCode, $_reverseCall = true)
    {
        if (!$illnessCode instanceof Illness && null !== $illnessCode) {
            throw new \InvalidArgumentException('The attribute illnessCode on the class Treatment has to be Illness or null (' . gettype($illnessCode) . ('object' === gettype($illnessCode) ? ' ' . get_class($illnessCode) : '') . ' given).');
        }

        if ($illnessCode !== $this->illnessCode) {
            if ($_reverseCall) {
                $this->illnessCode = $illnessCode;
            } else {
                if (null !== $this->illnessCode) {
                    $this->illnessCode->removeTreatment($this);
                }

                $this->illnessCode = $illnessCode;

                if (null !== $this->illnessCode && !$this->illnessCode->containsTreatment($this)) {
                    $this->illnessCode->addTreatment($this);
                }
            }
        }

        return $this;
    }

    /**
     * Get illnessCode
     *
     * @return IllnessBase|Illness
     */
    public function getIllnessCode()
    {
        return $this->illnessCode;
    }

    /**
     * Set medication
     *
     * @param string|null $medication
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setMedication($medication)
    {
        if (!is_string($medication) && null !== $medication) {
            throw new \InvalidArgumentException('The attribute medication on the class Treatment has to be string or null (' . gettype($medication) . ('object' === gettype($medication) ? ' ' . get_class($medication) : '') . ' given).');
        }

        $this->medication = $medication;

        return $this;
    }

    /**
     * Get medication
     *
     * @return string|null
     */
    public function getMedication()
    {
        return $this->medication;
    }

    /**
     * Set instructions
     *
     * @param string|null $instructions
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setInstructions($instructions)
    {
        if (!is_string($instructions) && null !== $instructions) {
            throw new \InvalidArgumentException('The attribute instructions on the class Treatment has to be string or null (' . gettype($instructions) . ('object' === gettype($instructions) ? ' ' . get_class($instructions) : '') . ' given).');
        }

        $this->instructions = $instructions;

        return $this;
    }

    /**
     * Get instructions
     *
     * @return string|null
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * Set symptomSeverity
     *
     * @param string|null $symptomSeverity
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setSymptomSeverity($symptomSeverity)
    {
        if (!is_string($symptomSeverity) && null !== $symptomSeverity) {
            throw new \InvalidArgumentException('The attribute symptomSeverity on the class Treatment has to be string or null (' . gettype($symptomSeverity) . ('object' === gettype($symptomSeverity) ? ' ' . get_class($symptomSeverity) : '') . ' given).');
        }

        $this->symptomSeverity = $symptomSeverity;

        return $this;
    }

    /**
     * Get symptomSeverity
     *
     * @return string|null
     */
    public function getSymptomSeverity()
    {
        return $this->symptomSeverity;
    }
    // </editor-fold>

    // <editor-fold desc="Other methods">
    /**
     * Treatment to string (Default)
     *
     * @return string
     */
    public function __toString()
    {
        return 'Treatment(' . $this->id . ')';
    }
    // </editor-fold>
}
