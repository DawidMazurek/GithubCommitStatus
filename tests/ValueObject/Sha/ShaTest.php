<?php

namespace DawidMazurek\GithubCommitStatus\ValueObject\Sha;

use InvalidArgumentException;

class ShaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function validValue()
    {
        $expected = sha1('random');
        $sha = new Sha($expected);
        $this->assertEquals(
            $expected,
            $sha->getSha(),
            'Created Sha dont match expected'
        );
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function invalidValueShouldThrowException()
    {
        new Sha(1);
    }
}
