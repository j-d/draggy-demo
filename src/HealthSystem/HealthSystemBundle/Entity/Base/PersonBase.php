<?php
// HealthSystem\HealthSystemBundle\Entity\Base\PersonBase.php

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
use Symfony\Component\Validator\Constraints as Assert;
use HealthSystem\HealthSystemBundle\Entity\Person;

/**
 * HealthSystem\HealthSystemBundle\Entity\Base\Person
 *
 * @ORM\MappedSuperclass
 */
abstract class PersonBase
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
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=25, nullable=false)
     *
     * @Assert\Type(type="string", message="Lastname should be of type string.")
     * @Assert\NotBlank(message="Lastname should not be blank.")
     * @Assert\Length(
     *     max = "25",
     *     maxMessage = "Lastname is too long. It should have 25 characters or less."
     * )
     */
    protected $lastname;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=25, nullable=false)
     *
     * @Assert\Type(type="string", message="Firstname should be of type string.")
     * @Assert\NotBlank(message="Firstname should not be blank.")
     * @Assert\Length(
     *     max = "25",
     *     maxMessage = "Firstname is too long. It should have 25 characters or less."
     * )
     */
    protected $firstname;

    /**
     * @var string $address
     *
     * @ORM\Column(name="address", type="text", nullable=false)
     *
     * @Assert\Type(type="string", message="Address should be of type string.")
     * @Assert\NotBlank(message="Address should not be blank.")
     */
    protected $address;

    /**
     * @var string|null $phone
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     *
     * @Assert\Type(type="string", message="Phone should be of type string.")
     * @Assert\Length(
     *     max = "20",
     *     maxMessage = "Phone is too long. It should have 20 characters or less."
     * )
     */
    protected $phone;

    /**
     * @var \DateTime $birthdate
     *
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     *
     * @Assert\Type(type="object", message="Birthdate should be of type \DateTime.")
     * @Assert\NotBlank(message="Birthdate should not be blank.")
     */
    protected $birthdate;

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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setLastname($lastname)
    {
        if (!is_string($lastname)) {
            throw new \InvalidArgumentException('The attribute lastname on the class Person has to be string (' . gettype($lastname) . ('object' === gettype($lastname) ? ' ' . get_class($lastname) : '') . ' given).');
        }

        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setFirstname($firstname)
    {
        if (!is_string($firstname)) {
            throw new \InvalidArgumentException('The attribute firstname on the class Person has to be string (' . gettype($firstname) . ('object' === gettype($firstname) ? ' ' . get_class($firstname) : '') . ' given).');
        }

        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setAddress($address)
    {
        if (!is_string($address)) {
            throw new \InvalidArgumentException('The attribute address on the class Person has to be string (' . gettype($address) . ('object' === gettype($address) ? ' ' . get_class($address) : '') . ' given).');
        }

        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string|null $phone
     *
     * @return $this
     *
     * @throws \InvalidArgumentException
     */
    public function setPhone($phone)
    {
        if (!is_string($phone) && null !== $phone) {
            throw new \InvalidArgumentException('The attribute phone on the class Person has to be string or null (' . gettype($phone) . ('object' === gettype($phone) ? ' ' . get_class($phone) : '') . ' given).');
        }

        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     *
     * @return $this
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }
    // </editor-fold>

    // <editor-fold desc="Other methods">
    /**
     * Person to string (Default)
     *
     * @return string
     */
    public function __toString()
    {
        return 'Person(' . $this->id . ')';
    }
    // </editor-fold>
}
