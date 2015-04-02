<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return array(
    'routes'   => array(
        'main' => array(
            'mautic_category_index'  => array(
                'path'       => '/categories/{bundle}/{page}',
                'controller' => 'MauticCategoryBundle:Category:index'
            ),
            'mautic_category_action' => array(
                'path'       => '/categories/{bundle}/{objectAction}/{objectId}',
                'controller' => 'MauticCategoryBundle:Category:executeCategory'
            )
        )
    ),

    'services' => array(
        'events' => array(
            'mautic.category.subscriber' => array(
                'class' => 'Mautic\CategoryBundle\EventListener\CategorySubscriber'
            )
        ),
        'forms'  => array(
            'mautic.form.type.category'      => array(
                'class'     => 'Mautic\CategoryBundle\Form\Type\CategoryListType',
                'arguments' => 'mautic.factory',
                'alias'     => 'category'
            ),
            'mautic.form.type.category_form' => array(
                'class'     => 'Mautic\CategoryBundle\Form\Type\CategoryType',
                'arguments' => 'mautic.factory',
                'alias'     => 'category_form'
            )
        )
    )
);