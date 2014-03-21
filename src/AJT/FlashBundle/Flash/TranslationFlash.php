<?php
namespace AJT\FlashBundle\Flash;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface;

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
     */
    public function success($message)
    {
        parent::success($this->translator->trans($message));
    }

    /**
     * @param string $message
     */
    public function error($message)
    {
        parent::error($this->translator->trans($message));
    }

    /**
     * @param string $message
     */
    public function info($message)
    {
        parent::info($this->translator->trans($message));
    }

    /**
     * @param string $message
     */
    public function warning($message)
    {
        parent::warning($this->translator->trans($message));
    }

} 