<?php
/**
 * Created by PhpStorm.
 * User: Alisher advaster@gmail.com
 */

namespace BlogBundle\Pagerfanta;

use Pagerfanta\View\DefaultView as BaseDefaultView;

/**
 *
 * DefaultView
 */
class DefaultView extends BaseDefaultView
{
    protected function createDefaultTemplate()
    {
        return new DefaultTemplate();
    }

    protected function getDefaultProximity()
    {
        return 3;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'app_pagerfanta_template_default';
    }
}