<?php
// HealthSystem\HealthSystemBundle\Form\Type\Base\MedicalHistoryTypeBase.php

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
use Doctrine\ORM\EntityRepository;

use HealthSystem\HealthSystemBundle\Form\Type\PatientType;
use HealthSystem\HealthSystemBundle\Entity\Patient;

abstract class MedicalHistoryTypeBase extends AbstractType
{
    /**
     * @var array Form fields
     */
    protected $fields = [];

    /**
     * @var string
     */
    protected $defaultOptionsDataClass = 'HealthSystem\HealthSystemBundle\Entity\MedicalHistory';

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
                'class' => 'HealthSystemBundle:Patient',
                'query_builder' => function (EntityRepository $er) {
                    $alreadyAssignedPatients = $er
                        ->createQueryBuilder('patient')
                        ->innerJoin('HealthSystemBundle:MedicalHistory', 'medicalHistory', 'WITH', 'medicalHistory.patientId = patient.id')
                        ->getQuery()
                        ->getResult();

                    $alreadyAssignedIds = [];

                    foreach ($alreadyAssignedPatients as $patient) {
                        /** @var Patient $patient */

                        $alreadyAssignedIds[] = $patient->getId();
                    }

                    $qb = $er->createQueryBuilder('patient');

                    return 0 !== count($alreadyAssignedIds)
                        ? $qb->where($qb->expr()->notIn('patient', $alreadyAssignedIds))
                        : $qb;
                },
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getHeartDiseaseField()
    {
        return [
            'name' => 'heartDisease',
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
    public function getHighBloodPressureField()
    {
        return [
            'name' => 'highBloodPressure',
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
    public function getDiabetesField()
    {
        return [
            'name' => 'diabetes',
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
    public function getAllergiesField()
    {
        return [
            'name' => 'allergies',
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
        return 'healthsystem_healthsystem_medicalhistory';
    }

    public function getFields()
    {
        return $this->fields;
    }
}
