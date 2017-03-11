<?php

/**
 * @author    Yuriy Davletshin <yuriy.davletshin@gmail.com>
 * @copyright 2017 Yuriy Davletshin
 * @license   MIT
 */

declare(strict_types=1);

namespace Satori\Middleware;

/**
 * Blank middleware.
 *
 * @return \Generator
 */
function turnBack(): \Generator
{
    return yield;
}
