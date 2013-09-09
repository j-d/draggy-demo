<?php
// HealthSystem\HealthSystemBundle\Form\Type\Base\AppointmentTypeBase.php

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

use HealthSystem\HealthSystemBundle\Form\Type\PatientType;
use HealthSystem\HealthSystemBundle\Form\Type\DoctorType;

abstract class AppointmentTypeBase extends AbstractType
{
    /**
     * @var array Form fields
     */
    protected $fields = [];

    /**
     * @var string
     */
    protected $defaultOptionsDataClass = 'HealthSystem\HealthSystemBundle\Entity\Appointment';

    /**
     * @var null|string|callable
     */
    protected $defaultOptionsEmptyData;

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return PatientType
     */
    protected function getPatientIdFieldParentFormConstructor($arguments)
    {
        return new PatientType();
    }

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return array
     */
    public function getPatientIdField($arguments = [])
    {
        return [
            'name' => 'patientId',
            'type' => 'entity',
            'options' => [
                'class'          => 'HealthSystemBundle:Patient',
                'multiple'       => false, // ManyToOne
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return DoctorType
     */
    protected function getDoctorIdFieldParentFormConstructor($arguments)
    {
        return new DoctorType();
    }

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return array
     */
    public function getDoctorIdField($arguments = [])
    {
        return [
            'name' => 'doctorId',
            'type' => 'entity',
            'options' => [
                'class'          => 'HealthSystemBundle:Doctor',
                'multiple'       => false, // ManyToOne
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getTimeField()
    {
        return [
            'name' => 'time',
            'type' => 'time',
            'options' => [
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getDateField()
    {
        return [
            'name' => 'date',
            'type' => 'date',
            'options' => [
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getReasonField()
    {
        return [
            'name' => 'reason',
            'type' => 'text',
            'options' => [
                'max_length'     => 50,
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
        return 'healthsystem_healthsystem_appointment';
    }

    public function getFields()
    {
        return $this->fields;
    }
}
