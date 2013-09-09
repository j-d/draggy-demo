<?php
// HealthSystem\HealthSystemBundle\Form\Type\NurseType.php

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
use HealthSystem\HealthSystemBundle\Form\Type\Base\NurseTypeBase;
// <user-additions part="use">
// </user-additions>

class NurseType extends NurseTypeBase
    // <user-additions part="implements">
    // </user-additions>
{
    // <user-additions part="traitsUse">
    // </user-additions>

    // <user-additions part="constructorDeclaration">
    public function __construct()
    // </user-additions>
    {
        //$this->fields['lastname']  = $this->getLastnameField();
        //$this->fields['firstname'] = $this->getFirstnameField();
        //$this->fields['address']   = $this->getAddressField();
        //$this->fields['phone']     = $this->getPhoneField();
        //$this->fields['birthdate'] = $this->getBirthdateField();
        // <user-additions part="constructor">
        $this->fields['lastname']  = $this->getLastnameField();
        $this->fields['firstname'] = $this->getFirstnameField();
        $this->fields['address']   = $this->getAddressField();
        $this->fields['phone']     = $this->getPhoneField();
        $this->fields['birthdate'] = $this->getBirthdateField();
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
