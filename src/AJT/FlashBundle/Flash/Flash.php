<?php
namespace AJT\FlashBundle\Flash;

use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Wrapper for flash messages
 *
 */
class Flash implements FlashInterface
{

    private $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Set a flash message
     *
     * @param string $message
     * @param string $type
     */
    public function set($message, $type)
    {
        $this->session->getFlashBag()->add($type, $message);
    }

    /**
     * Set a success message
     *
     * @param string $message
     */
    public function success($message)
    {
        $this->set($message, self::SUCCESS);
    }

    /**
     * Set an error message
     *
     * @param string $message
     */
    public function error($message)
    {
        $this->set($message, self::ERROR);
    }

    /**
     * Set an info message
     *
     * @param string $message
     */
    public function info($message)
    {
        $this->set($message, self::INFO);
    }

    /**
     * Set a warning message
     *
     * @param string $message
     */
    public function warning($message)
    {
        $this->set($message, self::WARNING);
    }
}
