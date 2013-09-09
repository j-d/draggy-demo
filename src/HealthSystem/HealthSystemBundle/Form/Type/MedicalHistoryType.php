<?php
// HealthSystem\HealthSystemBundle\Form\Type\MedicalHistoryType.php

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

namespace HealthSystem\HealthSystemBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use HealthSystem\HealthSystemBundle\Form\Type\Base\MedicalHistoryTypeBase;
// <user-additions part="use">
// </user-additions>

class MedicalHistoryType extends MedicalHistoryTypeBase
    // <user-additions part="implements">
    // </user-additions>
{
    // <user-additions part="traitsUse">
    // </user-additions>

    // <user-additions part="constructorDeclaration">
    public function __construct()
    // </user-additions>
    {
        //$this->fields['patientId'] = $this->getPatientIdField();
        //$this->fields['patientId']
        //    ->setParentForm($this);
        //$this->fields['patientId']
        //    ->setSymfonyExpanded(true)
        //    ->setSymfonyProperty('xxx'); // Possible choices:  id lastname firstname address phone birthdate
        //
        //$this->fields['heartDisease']      = $this->getHeartDiseaseField();
        //$this->fields['highBloodPressure'] = $this->getHighBloodPressureField();
        //$this->fields['diabetes']          = $this->getDiabetesField();
        //$this->fields['allergies']         = $this->getAllergiesField();
        // <user-additions part="constructor">
        $this->fields['patientId']         = $this->getPatientIdField();
        $this->fields['heartDisease']      = $this->getHeartDiseaseField();
        $this->fields['highBloodPressure'] = $this->getHighBloodPressureField();
        $this->fields['diabetes']          = $this->getDiabetesField();
        $this->fields['allergies']         = $this->getAllergiesField();
        // </user-additions>
    }

    // <user-additions part="methods">
    // </user-additions>

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // parent::buildForm($builder, $options);

        // <user-additions part="buildForm">
        parent::buildForm($builder, $options);

        $builder->add('save', 'submit', ['attr' => ['class' => 'btn btn-primary']]);
        // </user-additions>
    }
}
