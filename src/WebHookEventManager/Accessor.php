<?php
/**
 * Accessor trait
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
 * Class Accessor
 *
 * @package WebHookEventManager
 */
trait Accessor
{
    /**
     * Magic call
     *
     * @param string $methodName Method name
     * @param array  $arguments  Method arguments
     *
     * @return mixed
     */
    public function __call($methodName, $arguments)
    {
        if ($this->isGetMethod($methodName)) {
            return $this->{$this->getPropertyName($methodName)};
        }

        if ($this->isSetMethod($methodName)) {
            $this->{$this->getPropertyName($methodName)} = $arguments[0];
        }
    }

    /**
     * Fill class from array
     *
     * @param array $dataArray Request data
     */
    protected function fillFromArray($dataArray)
    {
        $properties = get_object_vars($this);

        foreach ($properties as $property => $value) {
            if (!array_key_exists($this->fromCamelCase($property), $dataArray)) {
                continue;
            }

            call_user_func([$this, 'set' . ucfirst($property)], $dataArray[$this->fromCamelCase($property)]);
        }
    }

    /**
     * Is set method
     *
     * @param string $methodName Method name
     *
     * @return bool
     */
    protected function isSetMethod($methodName)
    {
        $pos = strpos($methodName, 'set');

        return ($pos == 0 && $pos !== false);
    }

    /**
     * Is get method
     *
     * @param string $methodName Method name
     *
     * @return bool
     */
    protected function isGetMethod($methodName)
    {
        $pos = strpos($methodName, 'get');

        return ($pos == 0 && $pos !== false);
    }

    /**
     * Get property name
     *
     * @param string $methodName Method name
     *
     * @return null|string
     */
    protected function getPropertyName($methodName)
    {
        if ($this->isGetMethod($methodName)) {
            return lcfirst(str_replace('get', '', $methodName));
        } elseif ($this->isSetMethod($methodName)) {
            return lcfirst(str_replace('set', '', $methodName));
        }

        return null;
    }

    /**
     * Change from camelCase to camel_case
     *
     * @param string $input String input
     *
     * @return string
     */
    protected function fromCamelCase($input)
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $input));
    }
}
