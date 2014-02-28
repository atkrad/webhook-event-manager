<?php
/**
 * GitHub Request
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
namespace WebHookEventManager\Service\GitHub;

/**
 * Class Request
 *
 * @package WebHookEventManager\Service\GitHub
 */
class Request
{
    protected $origin;
    protected $content;
    const GITHUB_CIDR = '192.30.252.0/22';

    /**
     * Get content
     *
     * @return null|string
     */
    public function getContent()
    {
        if ($this->content === null) {
            switch ($_SERVER['CONTENT_TYPE']) {
                case 'application/json':
                    $this->content = file_get_contents('php://input');

                    return $this->content;
                    break;

                case 'application/x-www-form-urlencoded':
                    if (array_key_exists('payload', $_POST)) {
                        $this->content = $_POST['payload'];
                    }

                    return $this->content;
                    break;
            }
        }

        return $this->content;
    }

    /**
     * Check origin is valid or not
     *
     * @return bool
     */
    public function isValidOrigin()
    {
        $long = ip2long($this->getOrigin());
        list($start, $end) = $this->getIpRang(self::GITHUB_CIDR);

        return ($long >= $start && $long <= $end);
    }

    /**
     * Get origin
     *
     * @return string
     */
    public function getOrigin()
    {
        if ($this->origin === null) {
            if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && filter_var(
                    $_SERVER['HTTP_X_FORWARDED_FOR'],
                    FILTER_VALIDATE_IP
                )
            ) {
                $this->origin = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } elseif (array_key_exists('REMOTE_ADDR', $_SERVER)) {
                $this->origin = $_SERVER['REMOTE_ADDR'];
            }
        }

        return $this->origin;
    }

    /**
     * Get the first ip and last ip from cidr(network id and mask length)
     *
     * @param string $cidr [network id]/[mask length]
     *
     * @return array
     */
    protected function getIpRang($cidr)
    {
        list($ip, $mask) = explode('/', $cidr);

        $maskBinStr = str_repeat("1", $mask) . str_repeat("0", 32 - $mask);
        $inverseMaskBinStr = str_repeat("0", $mask) . str_repeat("1", 32 - $mask);

        $ipLong = ip2long($ip);
        $ipMaskLong = bindec($maskBinStr);
        $inverseIpMaskLong = bindec($inverseMaskBinStr);
        $netWork = $ipLong & $ipMaskLong;

        $start = $netWork + 1;

        $end = ($netWork | $inverseIpMaskLong) - 1;
        return array($start, $end);
    }
}
