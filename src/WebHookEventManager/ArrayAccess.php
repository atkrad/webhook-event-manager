<?php
/**
 * ArrayAccess trait
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

/**
 * Class ArrayAccess
 *
 * @package WebHookEventManager
 */
trait ArrayAccess
{
    protected $container;

    /**
     * Whether a offset exists
     *
     * @param mixed $offset An offset to check for.
     *
     * @return boolean true on success or false on failure. The return value will be casted to boolean if non-boolean was returned.
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->container);
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset The offset to retrieve.
     *
     * @return mixed Can return all value types.
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     */
    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->container[$offset];
        } else {
            return null;
        }
    }

    /**
     * Offset to set
     *
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value  The value to set.
     *
     * @return void
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     */
    public function offsetSet($offset, $value)
    {
        $this->container[$offset] = $value;
    }

    /**
     * Offset to unset
     *
     * @param mixed $offset The offset to unset.
     *
     * @return void
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Alias for __toString
     *
     * @return string
     */
    public function toString()
    {
        return $this->__toString();
    }

    /**
     * export internal array into string(json)
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->container);
    }

    /**
     * return internal array
     *
     * @return array
     */
    public function toArray()
    {
        return $this->container;
    }

    /**
     * Load internal from array
     *
     * @param array $array Array data
     */
    public function fromArray($array)
    {
        $this->container = $array;
    }

    /**
     * Load internal array from string
     *
     * @param string $str Json data
     */
    public function fromString($str)
    {
        $this->container = json_decode($str, true);
    }
}
