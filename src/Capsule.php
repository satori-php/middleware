<?php

/**
 * @author    Yuriy Davletshin <yuriy.davletshin@gmail.com>
 * @copyright 2017 Yuriy Davletshin
 * @license   MIT
 */

declare(strict_types=1);

namespace Satori\Middleware;

/**
 * Data capsule for middleware.
 */
class Capsule implements \ArrayAccess
{
    /**
     * @var array<string, mixed> Contains granules.
     */
    private $granules = [];

    /**
     * Constructor.
     *
     * @param array<string, mixed> $initialData The initial data.
     */
    public function __construct(array $initialData = null)
    {
        $this->granules = $initialData ?? [];
    }

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
     * @throws \OutOfBoundsException If the granule is not defined.
     *
     * @return mixed
     */
    public function offsetGet($key)
    {
        if (isset($this->granules[$key])) {

            return $this->granules[$key];
        }
        throw new \OutOfBoundsException(sprintf('Granule "%s" is not defined.', $key));
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
}
