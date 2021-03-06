<?php
// HealthSystem\HealthSystemBundle\Form\Type\Base\NurseTypeBase.php

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

namespace HealthSystem\HealthSystemBundle\Form\Type\Base;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

abstract class NurseTypeBase extends AbstractType
{
    /**
     * @var array Form fields
     */
    protected $fields = [];

    /**
     * @var string
     */
    protected $defaultOptionsDataClass = 'HealthSystem\HealthSystemBundle\Entity\Nurse';

    /**
     * @var null|string|callable
     */
    protected $defaultOptionsEmptyData;

    /**
     * @return array
     */
    public function getLastnameField()
    {
        return [
            'name' => 'lastname',
            'type' => 'text',
            'options' => [
                'max_length'     => 25,
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getFirstnameField()
    {
        return [
            'name' => 'firstname',
            'type' => 'text',
            'options' => [
                'max_length'     => 25,
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getAddressField()
    {
        return [
            'name' => 'address',
            'type' => 'textarea',
            'options' => [
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getPhoneField()
    {
        return [
            'name' => 'phone',
            'type' => 'text',
            'options' => [
                'required'       => false,
                'max_length'     => 20,
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getBirthdateField()
    {
        return [
            'name' => 'birthdate',
            'type' => 'date',
            'options' => [
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @param string $defaultOptionsDataClass
     */
    public function setDefaultOptionsDataClass($defaultOptionsDataClass)
    {
        $this->defaultOptionsDataClass = $defaultOptionsDataClass;
    }

    /**
     * @return string
     */
    public function getDefaultOptionsDataClass()
    {
        return $this->defaultOptionsDataClass;
    }

    /**
     * @param null|string|callable $defaultOptionsEmptyData
     */
    public function setDefaultOptionsEmptyData($defaultOptionsEmptyData)
    {
        $this->defaultOptionsEmptyData = $defaultOptionsEmptyData;
    }

    /**
     * @return null|string|callable
     */
    public function getDefaultOptionsEmptyData()
    {
        return $this->defaultOptionsEmptyData;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        foreach ($this->fields as $field) {
            $builder->add(
                $field['name'],
                $field['type'],
                $field['options']
            );
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $defaults = [
            'data_class' => $this->getDefaultOptionsDataClass()
        ];

        if (null !== $this->getDefaultOptionsEmptyData()) {
            $defaults['empty_data'] = $this->getDefaultOptionsEmptyData();
        }

        $resolver->setDefaults($defaults);
    }

    public function getName()
    {
        return 'healthsystem_healthsystem_nurse';
    }

    public function getFields()
    {
        return $this->fields;
    }
}
