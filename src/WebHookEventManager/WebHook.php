<?php
/**
 * WebHook event manager
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
namespace WebHookEventManager;

use WebHookEventManager\Service\GitHub\Request;

/**
 * Class WebHook
 *
 * @package WebHookEventManager
 */
class WebHook
{
    protected $service = null;
    protected $webHookService = null;

    /**
     * Get GitHub service
     *
     * @return Service\GitHub\WebHook
     */
    public function getGitHubService()
    {
        $request = new Request();

        if ($request->isValidOrigin()) {
            $data = $request->getContent();
        } else {
            $data = null;
        }

        $payload = new \WebHookEventManager\Service\GitHub\WebHook($data);

        return $payload;
    }
}
