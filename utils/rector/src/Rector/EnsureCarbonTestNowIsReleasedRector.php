<?php

declare(strict_types=1);

namespace Utils\Rector\Rector;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use PhpParser\Node;
use PhpParser\Node\Expr\StaticCall;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\Nop;
use Rector\PhpParser\Node\BetterNodeFinder;
use Rector\PHPUnit\NodeAnalyzer\TestsNodeAnalyzer;
use Rector\Rector\AbstractRector;

final class EnsureCarbonTestNowIsReleasedRector extends AbstractRector
{
    public function __construct(
        private readonly BetterNodeFinder $betterNodeFinder,
        private readonly TestsNodeAnalyzer $testsNodeAnalyzer,
    ) {
    }

    public function getNodeTypes(): array
    {
        return [ClassMethod::class];
    }

    /**
     * @param ClassMethod $node
     */
    public function refactor(Node $node): ?Node
    {
        if (null === $node->stmts || [] === $node->stmts) {
            return null;
        }

        if (!str_starts_with($this->getName($node->name) ?? '', 'test')) {
            return null;
        }

        if (!$this->testsNodeAnalyzer->isTestClassMethod($node)) {
            return null;
        }

        /** @var StaticCall|null $lastStaticCall */
        $lastStaticCall = null;

        $staticCalls = $this->betterNodeFinder->findInstanceOf($node->stmts, StaticCall::class);

        foreach ($staticCalls as $staticCall) {
            if (
                !$this->isName($staticCall->name, 'setTestNow') ||
                !$this->isNames($staticCall->class, [Carbon::class, CarbonImmutable::class])
            ) {
                continue;
            }

            $lastStaticCall = [] !== $staticCall->args ? $staticCall : null;
        }

        if (null === $lastStaticCall) {
            return null;
        }

        $node->stmts[] = new Nop();
        $node->stmts[] = new Expression(new StaticCall(clone $lastStaticCall->class, new Identifier('setTestNow')));

        return $node;
    }
}
