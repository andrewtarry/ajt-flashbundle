<?php
namespace AJT\FlashBundle\Twig;

use AJT\FlashBundle\Flash\FlashInterface;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Loader for flash messages a twig extension
 *
 * @package AJT\FlashBundle\Twig
 */
class FlashLoader extends \Twig_Extension
{

    /**
     * @var Session
     */
    private $session;

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @param Session $session
     * @param \Twig_Environment $twig
     */
    public function __construct(Session $session, \Twig_Environment $twig)
    {
        $this->session = $session;
        $this->twig = $twig;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('ajt_flash_css', [$this, 'display'], ['is_safe' => ['html']])
        ];
    }

    /**
     * Display some or all of the error flashes
     *
     * @param array ...$display
     * @return string
     */
    public function display(...$display)
    {
        $all = [
            FlashInterface::SUCCESS, FlashInterface::INFO, FlashInterface::WARNING, FlashInterface::ERROR
        ];
        $tags = count($display) === 0 ? $all : $display;

        $out = '';

        foreach($tags as $tag) {
            foreach($this->session->getFlashBag()->get($tag) as $message) {
                $out .= $this->twig->render('AJTFlashBundle::single.html.twig', [
                    'element' => 'div',
                    'type' => $tag,
                    'message' => $message
                ]);
            }
        }

        return $out;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'ajt.flash.twig.loader';
    }
}