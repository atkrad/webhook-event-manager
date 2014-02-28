<?php
/**
 * GitHub person on push event
 *
 * Git push to the repository.
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
namespace WebHookEventManager\Service\GitHub\Event\Push;

use WebHookEventManager\Accessor;

/**
 * Class Person
 *
 * @method string getUsername() Get username
 * @method string getName() Get name
 * @method string getEmail() Get email
 *
 * @package WebHookEventManager\Service\GitHub\Event\Push
 */
class Person
{
    use Accessor;

    protected $username;
    protected $name;
    protected $email;

    /**
     * Person constructor
     *
     * @param array $dataArray Person data
     */
    public function __construct($dataArray)
    {
        $this->fillFromArray($dataArray);
    }
}
