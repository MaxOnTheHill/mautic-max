<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic Contributors. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.org
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
$searchBtnClass = (!empty($searchValue)) ? "fa-eraser" : "fa-search";
?>

<div class="input-group ma-5">
    <input type="search" class="form-control" id="pageBuilderTokenSearch" name="search" placeholder="<?php echo $view['translator']->trans('mautic.core.search.placeholder'); ?>" value="<?php echo $searchValue; ?>" autocomplete="off" data-toggle="livesearch" data-target="#pageBuilderTokens" data-action="<?php echo $view['router']->generate('mautic_page_buildertoken_index', array('page' => $page)); ?>" />
    <div class="input-group-btn">
        <button type="button" class="btn btn-default btn-search btn-filter btn-nospin" data-livesearch-parent="pageBuilderTokenSearch">
            <i class="fa <?php echo $searchBtnClass; ?> fa-fw"></i>
        </button>
    </div>
</div>
<?php $view['slots']->output('_content'); ?>

<div class="list-group mt-sm">
    <a href="#" class="list-group-item" data-token='<a href="{externallink=%url%}">%text%</a>' data-drop="showBuilderLinkModal">
        <div>
            <span><i class="fa fa-external-link fa-fw"></i><?php echo $view['translator']->trans('mautic.page.builder.externallink'); ?></span>
        </div>
    </a>
</div>