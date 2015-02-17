<?php
namespace AJT\FlashBundle\Tests\Flash;

use AJT\FlashBundle\Flash\Flash;
use PHPUnit_Framework_TestCase;
use Symfony\Component\HttpFoundation\Session\Session;

class FlashTest extends PHPUnit_Framework_Testcase {

    private $session;
    private $flash;

    public function setUp()
    {
        $this->session = \Mockery::mock('Symfony\Component\HttpFoundation\Session\Session');
        $this->session->shouldReceive('getFlashBag->add')->once();

        $this->flash = new Flash($this->session);
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * @test
     * @group unit
     */
    public function set()
    {
        $this->flash->set('OK', 'error');
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