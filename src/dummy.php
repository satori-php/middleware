<?php
declare(strict_types=1);

/**
 * @author    Yuriy Davletshin <yuriy.davletshin@gmail.com>
 * @copyright 2017 Yuriy Davletshin
 * @license   MIT
 */
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
