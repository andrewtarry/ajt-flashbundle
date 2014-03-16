<?php
namespace AJT\FlashBundle\Flash;

/**
 * Wrapper for the flash session message
 *
 */
interface FlashInterface
{

    /**
     * Set a flash message
     *
     * @param string $message
     * @param string $type
     */
    public function set($message, $type);

    /**
     * Set a success message
     *
     * @param string $message
     */
    public function success($message);

    /**
     * Set an error message
     *
     * @param string $message
     */
    public function error($message);

    /**
     * Set an info message
     *
     * @param string $message
     */
    public function info($message);

    /**
     * Set a warning message
     *
     * @param string $message
     */
    public function warning($message);

} 