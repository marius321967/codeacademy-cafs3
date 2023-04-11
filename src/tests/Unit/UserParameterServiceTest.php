<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\UserParameterService;
use Mockery;
use Tests\TestCase;
use UserRepository;

class UserParameterServiceTest extends TestCase
{

    private $id = '123';
    private $user;
    
    protected function setUp(): void {
        $this->user = new User([
            'name' => 'John',
            'email' => 'john@example.com',
        ]);
    }

    public function testGetUserNameUserExists(): void
    {
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $userRepositoryMock->shouldReceive('getUser')->andReturn($this->user);

        $service = new UserParameterService($userRepositoryMock);

        $result = $service->getUserName($this->id);

        $this->assertEquals($result, 'John');
    }

    public function testGetUserNameDoesNotExist(): void
    {
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $userRepositoryMock->shouldReceive('getUser')->andReturn(null);

        $service = new UserParameterService($userRepositoryMock);

        $result = $service->getUserName($this->id);

        $this->assertEquals($result, null);
    }

    public function testGetUserEmailUserExists(): void
    {
        // given
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $userRepositoryMock->shouldReceive('getUser')->andReturn($this->user);

        $service = new UserParameterService($userRepositoryMock);

        // when
        $result = $service->getUserEmail($this->id);

        // then
        $this->assertEquals($result, 'john@example.com');
    }

    public function testGetUserEmailUserDoesNotExist(): void
    {
        $userRepositoryMock = Mockery::mock(UserRepository::class);
        $userRepositoryMock->shouldReceive('getUser')->andReturn(null);

        $service = new UserParameterService($userRepositoryMock);

        $result = $service->getUserEmail($this->id);

        $this->assertEquals($result, null);
    }
}
