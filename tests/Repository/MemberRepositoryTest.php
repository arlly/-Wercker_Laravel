<?php
namespace Tests\Repository;

use Tests\TestCase;
use App\package\Infrastructure\Eloquents\Member;
use App\Package\Domain\Member\MemberRepositoryInterface;
use App\Package\Infrastructure\Repositories\MemberRepository;
use Illuminate\Foundation\Testing\Concerns\MocksApplicationServices as Mockery;
use Illuminate\Support\Facades\Cache;

class MemberRepositoryTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        
        // $this->mock = Cache::mock(Member::class);
        $this->mock = $this->getMockBuilder(Member::class)
            ->setMethods([
            'find'
        ])
            ->getMock();
        ;
    }

    public function testFind()
    {
        $expected = 500;
        
        $this->mock = $this->getMockBuilder(Member::class)
            ->disableOriginalConstructor()
            ->setMethods ( array (
                'find'
            ))
            ->getMock();
        
        $this->mock->method('find')->will($this->returnValue($expected));
        
        // $this->mock->method('find')->andReturn($expected);
        
        $target = new MemberRepository($this->mock);
        
        $this->assertEquals($expected, $target->findByID(1));
    }

    public function testCreate()
    {
        /*
         * $repo = $this->app->make(MemberRepositoryInterface::class);
         * $data = [
         * 'email' => 'arimoto@n-di.co.jp'
         * ];
         *
         * $this->assertNotNull($repo->create($data));
         */
    }

    public function tearDown()
    {
        parent::tearDown();
        // Mockery::close();
    }
}