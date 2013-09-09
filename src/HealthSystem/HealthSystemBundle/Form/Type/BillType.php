<?php
// HealthSystem\HealthSystemBundle\Form\Type\BillType.php

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
use HealthSystem\HealthSystemBundle\Form\Type\Base\BillTypeBase;
// <user-additions part="use">
// </user-additions>

class BillType extends BillTypeBase
    // <user-additions part="implements">
    // </user-additions>
{
    // <user-additions part="traitsUse">
    // </user-additions>

    // <user-additions part="constructorDeclaration">
    public function __construct()
    // </user-additions>
    {
        //$this->fields['appointmentId'] = $this->getAppointmentIdField();
        //$this->fields['appointmentId']
        //    ->setParentForm($this);
        //$this->fields['appointmentId']
        //    ->setSymfonyExpanded(true)
        //    ->setSymfonyProperty('xxx'); // Possible choices:  id time date reason
        //
        //$this->fields['date']    = $this->getDateField();
        //$this->fields['amount']  = $this->getAmountField();
        //$this->fields['purpose'] = $this->getPurposeField();
        // <user-additions part="constructor">
        $this->fields['appointmentId'] = $this->getAppointmentIdField();
        $this->fields['date']          = $this->getDateField();
        $this->fields['amount']        = $this->getAmountField();
        $this->fields['purpose']       = $this->getPurposeField();
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
