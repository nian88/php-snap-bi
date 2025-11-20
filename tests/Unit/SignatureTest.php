<?php
use Niandev\SnapBI\Support\Signature;
use Niandev\SnapBI\Fixtures\Fixture;
use Niandev\SnapBI\Services\Config;
use PHPUnit\Framework\TestCase;

final class SignatureTest extends TestCase
{
    function testAsymmetric()
    {
        Config::bca(Fixture::configFixture());
        $res = Signature::asymmetric(Config::bca()::class);

        $this->assertIsString($res);
        $this->assertNotEmpty($res);
    }

    function testSymmetric()
    {
        Config::bca(Fixture::configFixture());
        $res = Signature::symmetric(
            Config::bca()::class,
            'POST',
            '/api/path',
            ['name' => 'Niandev'],
            currentTimestamp(),
            'accessToken'
        );

        $this->assertIsString($res);
        $this->assertNotEmpty($res);
    }
}