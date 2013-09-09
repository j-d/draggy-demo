<?php
// HealthSystem\HealthSystemBundle\Entity\Base\IllnessBase.php

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
use HealthSystem\HealthSystemBundle\Entity\Illness;
use HealthSystem\HealthSystemBundle\Entity\Treatment;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Illness
 *
 * @ORM\MappedSuperclass
 */
abstract class IllnessBase
{
    // <editor-fold desc="Attributes">
    /**
     * @var string $code
     *
     * @ORM\Id
     * @ORM\Column(name="code", type="string", length=20)
     *
     * @Assert\Type(type="string", message="Code should be of type string.")
     * @Assert\NotBlank(message="Code should not be blank.")
     * @Assert\Length(
     *     max = "20",
     *     maxMessage = "Code is too long. It should have 20 characters or less."
     * )
     */
    protected $code;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     *
     * @Assert\Type(type="string", message="Description should be of type string.")
     * @Assert\NotBlank(message="Description should not be blank.")
     * @Assert\Length(
     *     max = "100",
     *     maxMessage = "Description is too long. It should have 100 characters or less."
     * )
     */
    protected $description;

    /**
     * @var Treatment[]|Collection $treatments
     *
     * @ORM\OneToMany(targetEntity="HealthSystem\HealthSystemBundle\Entity\Treatment", mappedBy="illnessCode", cascade={"persist", "remove"})
     */
    protected $treatments;

    // </editor-fold>

    // <editor-fold desc="Setters and getters">
    /**
     * Set code
     *
     * @param string $code
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setCode($code)
    {
        if (!is_string($code)) {
            throw new \InvalidArgumentException('The attribute code on the class Illness has to be string (' . gettype($code) . ('object' === gettype($code) ? ' ' . get_class($code) : '') . ' given).');
        }

        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setDescription($description)
    {
        if (!is_string($description)) {
            throw new \InvalidArgumentException('The attribute description on the class Illness has to be string (' . gettype($description) . ('object' === gettype($description) ? ' ' . get_class($description) : '') . ' given).');
        }

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
                $treatment->setIllnessCode($this, false);
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
            $treatment->setIllnessCode(null, false);
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
     * Illness to string (code)
     *
     * @return string
     */
    public function __toString()
    {
        return strval($this->code);
    }
    // </editor-fold>
}
