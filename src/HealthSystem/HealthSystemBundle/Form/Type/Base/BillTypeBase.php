<?php
// HealthSystem\HealthSystemBundle\Form\Type\Base\BillTypeBase.php

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

use HealthSystem\HealthSystemBundle\Form\Type\AppointmentType;
use HealthSystem\HealthSystemBundle\Entity\Appointment;

abstract class BillTypeBase extends AbstractType
{
    /**
     * @var array Form fields
     */
    protected $fields = [];

    /**
     * @var string
     */
    protected $defaultOptionsDataClass = 'HealthSystem\HealthSystemBundle\Entity\Bill';

    /**
     * @var null|string|callable
     */
    protected $defaultOptionsEmptyData;

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return AppointmentType
     */
    protected function getAppointmentIdFieldParentFormConstructor($arguments)
    {
        return new AppointmentType();
    }

    /**
     * @param array $arguments Arguments to pass down to the ParentFormConstructor method
     *
     * @return array
     */
    public function getAppointmentIdField($arguments = [])
    {
        return [
            'name' => 'appointmentId',
            'type' => 'entity',
            'options' => [
                'class' => 'HealthSystemBundle:Appointment',
                'query_builder' => function (EntityRepository $er) {
                    $alreadyAssignedAppointments = $er
                        ->createQueryBuilder('appointment')
                        ->innerJoin('HealthSystemBundle:Bill', 'bill', 'WITH', 'bill.appointmentId = appointment.id')
                        ->getQuery()
                        ->getResult();

                    $alreadyAssignedIds = [];

                    foreach ($alreadyAssignedAppointments as $appointment) {
                        /** @var Appointment $appointment */

                        $alreadyAssignedIds[] = $appointment->getId();
                    }

                    $qb = $er->createQueryBuilder('appointment');

                    return 0 !== count($alreadyAssignedIds)
                        ? $qb->where($qb->expr()->notIn('appointment', $alreadyAssignedIds))
                        : $qb;
                },
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
    public function getAmountField()
    {
        return [
            'name' => 'amount',
            'type' => 'text',
            'options' => [
                'error_bubbling' => true
            ]
        ];
    }

    /**
     * @return array
     */
    public function getPurposeField()
    {
        return [
            'name' => 'purpose',
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
        return 'healthsystem_healthsystem_bill';
    }

    public function getFields()
    {
        return $this->fields;
    }
}
