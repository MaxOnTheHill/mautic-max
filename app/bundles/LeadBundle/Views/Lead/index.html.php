<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

$view->extend('MauticCoreBundle:Default:content.html.php');
$view['slots']->set('mauticContent', 'lead');
$view['slots']->set("headerTitle", $view['translator']->trans('mautic.lead.leads'));

$buttons = $preButtons = array();
if ($permissions['lead:leads:create']) {
    $preButtons[] = array(
        'attr'      => array(
            'class'       => 'btn btn-default btn-nospin',
            'data-toggle' => 'ajaxmodal',
            'data-target' => '#MauticSharedModal',
            'href'        => $view['router']->generate('mautic_lead_action', array('objectAction' => 'quickAdd')),
            'data-header' => $view['translator']->trans('mautic.lead.lead.menu.quickadd'),
        ),
        'iconClass' => 'fa fa-bolt',
        'btnText'   => 'mautic.lead.lead.menu.quickadd'
    );

    $buttons[] = array(
        'attr'      => array(
            'href'  => $view['router']->generate('mautic_lead_action', array('objectAction' => 'import')),
        ),
        'iconClass' => 'fa fa-upload',
        'btnText'   => 'mautic.lead.lead.import'
    );
}

$extraHtml = <<<button
<div class="btn-group ml-5">
    <span data-toggle="tooltip" title="{$view['translator']->trans('mautic.lead.tooltip.list')}" data-placement="left"><a id="table-view" href="{$view['router']->generate('mautic_lead_index', array('page' => $page, 'view' => 'list'))}" data-toggle="ajax" class="btn btn-default"><i class="fa fa-fw fa-table"></i></span></a>
    <span data-toggle="tooltip" title="{$view['translator']->trans('mautic.lead.tooltip.grid')}" data-placement="left"><a id="card-view" href="{$view['router']->generate('mautic_lead_index', array('page' => $page, 'view' => 'grid'))}" data-toggle="ajax" class="btn btn-default"><i class="fa fa-fw fa-th-large"></i></span></a>
</div>
button;

$view['slots']->set('actions', $view->render('MauticCoreBundle:Helper:page_actions.html.php', array(
    'templateButtons' => array(
        'new' => $permissions['lead:leads:create']
    ),
    'routeBase' => 'lead',
    'langVar'   => 'lead.lead',
    'preCustomButtons' => $preButtons,
    'customButtons'    => $buttons
)));
?>

<div class="panel panel-default bdr-t-wdh-0 mb-0">
    <?php echo $view->render('MauticCoreBundle:Helper:bulk_actions.html.php', array(
        'searchValue' => $searchValue,
        'searchHelp'  => 'mautic.lead.lead.help.searchcommands',
        'action'      => $currentRoute,
        'langVar'     => 'lead.lead',
        'routeBase'   => 'lead',
        'templateButtons' => array(
            'delete' => $permissions['lead:leads:deleteown'] || $permissions['lead:leads:deleteother']
        )
    )); ?>
    <div class="page-list">
        <?php $view['slots']->output('_content'); ?>
    </div>
</div>
