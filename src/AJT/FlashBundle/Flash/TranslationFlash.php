<?php
namespace AJT\FlashBundle\Flash;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * Translator flash
 *
 * @package AJT\FlashBundle\Flash
 */
class TranslationFlash extends Flash
{

    /**
     * @var \Symfony\Component\Translation\TranslatorInterface
     */
    protected $translator;

    /**
     * @param Session             $session
     * @param TranslatorInterface $translator
     */
    public function __construct(Session $session, TranslatorInterface $translator)
    {
        parent::__construct($session);
        $this->translator = $translator;
    }

    /**
     * @param string $message
     * @param string $type
     */
    public function set($message, $type)
    {
        parent::set($this->translator->trans($message), $type);
    }

}