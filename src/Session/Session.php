<?php declare(strict_types=1);
/**
 * Interface for session classes
 *
 * PHP version 7.0
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Session
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 * @copyright  Copyright (c) 2015 Pieter Hordijk <https://github.com/PeeHaa>
 * @license    See the LICENSE file
 * @version    1.0.0
 */
namespace CodeCollab\Http\Session;

/**
 * Interface for session classes
 *
 * @category   CodeCollab
 * @package    Http
 * @subpackage Session
 * @author     Pieter Hordijk <info@pieterhordijk.com>
 */
interface Session
{
    /**
     * Checks whether an offset exists
     *
     * @param mixed $offset The offset to check
     *
     * @return bool True when the offset exists
     */
    public function exists($offset): bool;

    /**
     * Gets a value
     *
     * @param mixed $offset The offset
     *
     * @return mixed The value
     */
    public function get($offset);

    /**
     * Sets a value
     *
     * @param mixed $offset The offset to set
     * @param mixed $value  The value to set
     */
    public function set($offset, $value);

    /**
     * Unsets an offset
     *
     * @param mixed $offset The offset to unset
     */
    public function unset($offset);

    /**
     * Regenerates the session id
     */
    public function regenerate();

    /**
     * Destroys a session including all data
     */
    public function destroy();
}
