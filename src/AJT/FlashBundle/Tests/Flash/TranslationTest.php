<?php
namespace AJT\FlashBundle\Tests\Flash;

use AJT\FlashBundle\Flash\TranslationFlash;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\TranslatorInterface;

class TranslationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Mockery\MockInterface
     */
    private $session;

    /**
     * @var \Mockery\MockInterface
     */
    private $trans;

    private $flash;

    public function setUp()
    {
        $this->session = \Mockery::mock('Symfony\Component\HttpFoundation\Session\Session');
        $this->session->shouldReceive('getFlashBag->add')->once();

        $this->trans = \Mockery::mock('Symfony\Component\Translation\TranslatorInterface');
        $this->trans->shouldReceive('trans')->once()->andReturn('message');

        $this->flash = new TranslationFlash($this->session, $this->trans);
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * @test
     * @group unit
     */
    public function success()
    {
        $this->flash->success('OK');
    }

    /**
     * @test
     * @group unit
     */
    public function error()
    {
        $this->flash->error('OK');
    }

    /**
     * @test
     * @group unit
     */
    public function info()
    {
        $this->flash->info('OK');
    }

    /**
     * @test
     * @group unit
     */
    public function warning()
    {
        $this->flash->warning('OK');
    }
} 