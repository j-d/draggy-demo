<?php
// HealthSystem\HealthSystemBundle\Form\Type\Base\TreatmentTypeBase.php

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

use HealthSystem\HealthSystemBundle\Form\Type\SymptomType;
use HealthSystem\HealthSystemBundle\Form\Type\IllnessType;

abstract class TreatmentTypeBase extends AbstractType
{
    /**
     * @var array Form fields
     */
    protected $fields = [];

    /**
     * @var string
     */
    protected $defaultOptionsDataClass = 'HealthSystem\HealthSystemBundle\Entity\Treatment';

    /**
     * @var null|string|callable
     */
    protected $defaultOptionsEmptyData;

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return SymptomType
     */
    protected function getSymptomNameFieldParentFormConstructor($arguments)
    {
        return new SymptomType();
    }

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return array
     */
    public function getSymptomNameField($arguments = [])
    {
        return [
            'name' => 'symptomName',
            'type' => 'entity',
            'options' => [
                'class'          => 'HealthSystemBundle:Symptom',
                'max_length'     => 50,
                'multiple'       => false, // ManyToOne
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return IllnessType
     */
    protected function getIllnessCodeFieldParentFormConstructor($arguments)
    {
        return new IllnessType();
    }

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return array
     */
    public function getIllnessCodeField($arguments = [])
    {
        return [
            'name' => 'illnessCode',
            'type' => 'entity',
            'options' => [
                'class'          => 'HealthSystemBundle:Illness',
                'max_length'     => 20,
                'multiple'       => false, // ManyToOne
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getMedicationField()
    {
        return [
            'name' => 'medication',
            'type' => 'text',
            'options' => [
                'required'       => false,
                'max_length'     => 100,
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getInstructionsField()
    {
        return [
            'name' => 'instructions',
            'type' => 'textarea',
            'options' => [
                'required'       => false,
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getSymptomSeverityField()
    {
        return [
            'name' => 'symptomSeverity',
            'type' => 'textarea',
            'options' => [
                'required'       => false,
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
        return 'healthsystem_healthsystem_treatment';
    }

    public function getFields()
    {
        return $this->fields;
    }
}
