<?php
/**
 * GitHub person on issues event
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
 * Class Person
 *
 * @method string getAvatarUrl() Get avatar url
 * @method string getEventsUrl() Get events url
 * @method string getFollowersUrl() Get followers url
 * @method string getFollowingUrl() Get following url
 * @method string getGistsUrl() Get gists url
 * @method string getGravatarId() Get gravatar id
 * @method string getHtmlUrl() Get html url
 * @method string getLogin() Get login
 * @method string getOrganizationsUrl() Get organizations url
 * @method string getReceivedEventsUrl() Get received events url
 * @method string getReposUrl() Get repos url
 * @method string getStarredUrl() Get starred url
 * @method string getSubscriptionsUrl() Get subscriptions url
 * @method string getType() Get type
 * @method string getUrl() Get url
 *
 * @package WebHookEventManager\Service\GitHub\Event\Issues
 */
class Person
{
    use Accessor;

    protected $login;
    protected $avatarUrl;
    protected $gravatarId;
    protected $url;
    protected $htmlUrl;
    protected $followersUrl;
    protected $followingUrl;
    protected $gistsUrl;
    protected $starredUrl;
    protected $subscriptionsUrl;
    protected $organizationsUrl;
    protected $reposUrl;
    protected $eventsUrl;
    protected $receivedEventsUrl;
    protected $type;
    protected $siteAdmin;

    /**
     * Person constructor
     *
     * @param array $dataArray Person data
     */
    public function __construct($dataArray)
    {
        $this->fillFromArray($dataArray);
    }

    /**
     * Is site admin
     *
     * @return boolean
     */
    public function isSiteAdmin()
    {
        return $this->siteAdmin;
    }
}
