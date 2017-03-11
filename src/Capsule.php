<?php

/**
 * @author    Yuriy Davletshin <yuriy.davletshin@gmail.com>
 * @copyright 2017 Yuriy Davletshin
 * @license   MIT
 */

declare(strict_types=1);

namespace Satori\Middleware;

class Capsule implements \ArrayAccess
{
    /**
     * @var mixed[] Contains granules.
     */
    private $granules = [];

    /**
     * @var int Error code.
     */
    private $errorCode;

    /**
     * @var string Error message.
     */
    private $errorMessage;

    /**
     * Checks if a granule is set.
     *
     * @param string $key The unique key of the granule.
     *
     * @return bool
     */
    public function offsetExists($key)
    {
        return isset($this->granules[$key]);
    }

    /**
     * Returns a granule.
     *
     * @param string $key The unique key of the granule.
     *
     * @throws \LogicException If the granule is not defined.
     *
     * @return mixed
     */
    public function offsetGet($key)
    {
        if (isset($this->granules[$key])) {

            return $this->granules[$key];
        }
        throw new \LogicException(sprintf('Granule "%s" is not defined.', $key));
    }

    /**
     * Sets a granule.
     *
     * @param string $key   The unique key of the granule.
     * @param mixed  $value The value of the granule.
     */
    public function offsetSet($key, $value)
    {
        $this->granules[$key] = $value;
    }

    /**
     * Removes a granule.
     *
     * @param string $key The unique key of the granule.
     */
    public function offsetUnset($key)
    {
        unset($this->granules[$key]);
    }

    /**
     * Checks if an error is set.
     *
     * @return bool
     */
    public function hasError(): bool
    {
        return isset($this->errorCode);
    }

    /**
     * Returns error code.
     *
     * @return int Error code.
     */
    public function getErrorCode(): int
    {
        if (isset($this->errorCode)) {

            return $this->errorCode;
        }
        throw new \LogicException('Error is not defined.');
    }

    /**
     * Returns error message.
     *
     * @return string Error message.
     */
    public function getErrorMessage(): string
    {
        if (isset($this->errorMessage)) {

            return $this->errorMessage;
        }
        throw new \LogicException('Error is not defined.');
    }

    /**
     * Sets an error.
     *
     * @param int    $code    Error code.
     * @param string $message Error message.
     */
    public function setError(int $code, string $message = null)
    {
        $this->errorCode = $code;
        $this->errorMessage = $message ?? '';
    }
}
