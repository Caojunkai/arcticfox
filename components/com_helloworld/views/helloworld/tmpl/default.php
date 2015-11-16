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
?>
<h1><?php echo $this->msg; ?></h1>
<!--    <iframe src="http://arcticfox.sinaapp.com/Admin/Login/index.html" scrolling="no" width="100%" height="700px"></iframe>-->
<!--<iframe src="http://crapcha.com/embed/" frameborder="0" scrolling="0" width="300" height="150"></iframe>-->
<form action="">
    <label for="username">用户名</label><input id="username" type="text" placeholder=<?php echo $this->msg ?>>
    <label for="password">密码</label><input id="password" type="password" placeholder="*********"><br />
    <button type="submit">登录</button>
</form>
