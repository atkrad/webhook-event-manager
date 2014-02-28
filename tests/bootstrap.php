<?php
/**
 * PHPUnit bootstrap
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) 2014, Mohammad Abdoli Rad
 * @author    Mohammad Abdoli Rad <m.abdolirad@gmail.com>
 * @since     Version 0.1.0
 * @license   http://opensource.org/licenses/MIT MIT license
 */
define('DS', DIRECTORY_SEPARATOR);
define('FIXTURES_DIR', __DIR__ . DS . 'WebHookEventManager' . DS . 'Fixtures');
define('GITHUB_FIXTURES_DIR', FIXTURES_DIR . DS . 'GitHub');

include __DIR__ . DS . '..' . DS . 'vendor' . DS . 'autoload.php';
