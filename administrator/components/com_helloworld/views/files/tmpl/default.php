<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

JHtml::_('formbehavior.chosen', 'select');

//$listOrder     = $this->escape($this->state->get('list.ordering'));
//$listDirn      = $this->escape($this->state->get('list.direction'));


?>
<form action="index.php?option=com_helloworld&view=helloworlds" method="post" id="adminForm" name="adminForm">
    <div class="row-fluid">
        <div class="span6">
            <?php echo JText::_('COM_HELLOWORLD_HELLOWORLDS_FILTER'); ?>

        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>check</td>
                <td>id</td>
                <td>name</td>
                <td>fullname</td>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($this->items)) : ?>
            <?php foreach ($this->items[1] as $i => $row) :
                $link = JRoute::_('index.php?option=com_helloworld&task=helloworld.edit&id=' . $row['id']);
                ?>
                <tr>
                    <td>
                        <?php echo JHtml::_('grid.id', $i, $row['id']); ?>
                    </td>
                    <td align="center">
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_HELLOWORLD_EDIT_HELLOWORLD'); ?>">
                            <?php echo $row['name']; ?>
                        </a>
                    </td>
                    <td align="center">
                        <?php echo $row['fullname']; ?>
                    </td>

                </tr>
            <?php endforeach; ?>
            <?php foreach($this->items[0] as $i => $row): ?>
                <tr>
                    <td>
                        <?php echo $row ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</form>

