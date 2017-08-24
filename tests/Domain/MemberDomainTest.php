<?php
namespace Tests\Domain;

use Tests\TestCase;

use App\Package\Domain\Member\Members;
use App\Package\Domain\Member\MemberId;
use App\Package\Infrastructure\Repositories\MemberRepository;
use Illuminate\Foundation\Testing\Concerns\MocksApplicationServices as Mockery;
use Illuminate\Support\Facades\Cache;

class MemberDomainTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        
    }

    public function testMember()
    {
        $expected = 500;
        
        $Member = new Members();
        $Member->setId(new MemberId($expected));
        
        $this->assertEquals($expected, $Member->getId()->getMemberId());
        
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