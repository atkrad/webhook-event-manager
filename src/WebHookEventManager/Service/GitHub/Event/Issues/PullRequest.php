<?php
/**
 * GitHub pull request on issues event
 *
 * Issue opened or closed.
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
namespace WebHookEventManager\Service\GitHub\Event\Issues;

use WebHookEventManager\Accessor;

/**
 * Class PullRequest
 *
 * @method string getDiffUrl() Get diff url
 * @method string getHtmlUrl() Get html url
 * @method string getPatchUrl() Get patch url
 *
 * @package WebHookEventManager\Service\GitHub\Event\Issues
 */
class PullRequest
{
    use Accessor;

    protected $diffUrl;
    protected $htmlUrl;
    protected $patchUrl;

    /**
     * Pull request constructor
     *
     * @param array $dataArray Pull request data
     */
    public function __construct($dataArray)
    {
        $this->fillFromArray($dataArray);
    }
}
