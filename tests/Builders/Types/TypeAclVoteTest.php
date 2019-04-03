<?php

declare(strict_types=1);

namespace Tests\Builders\Types;

use PHPUnit\Framework\TestCase;
use WebDebug\Builders\Types\TypeAclVote;

/**
 * Class TypeAclVoteTest.
 */
class TypeAclVoteTest extends TestCase
{
    public function test__construct()
    {
        $vote = new TypeAclVote(TypeAclVote::GRANT);
        $this->assertSame('GRANT', $vote->export(1));
        $this->assertSame('GRANT', $vote->getValue());
    }
}
