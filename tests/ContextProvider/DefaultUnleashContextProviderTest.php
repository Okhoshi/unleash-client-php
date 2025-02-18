<?php

namespace Unleash\Client\Tests\ContextProvider;

use PHPUnit\Framework\TestCase;
use Unleash\Client\Configuration\UnleashContext;
use Unleash\Client\ContextProvider\DefaultUnleashContextProvider;

final class DefaultUnleashContextProviderTest extends TestCase
{
    public function testGetContext()
    {
        unset($_SERVER['REMOTE_ADDR']);

        $instance = new DefaultUnleashContextProvider();
        self::assertInstanceOf(UnleashContext::class, $instance->getContext());
        self::assertNull($instance->getContext()->getCurrentUserId());
        self::assertNull($instance->getContext()->getIpAddress());
        self::assertNull($instance->getContext()->getSessionId());
        self::assertNull($instance->getContext()->getEnvironment());
        self::assertNotSame($instance->getContext(), $instance->getContext());

        $instance = new DefaultUnleashContextProvider(new UnleashContext('123', '456', '789', [], null, 'dev'));
        self::assertInstanceOf(UnleashContext::class, $instance->getContext());
        self::assertEquals('123', $instance->getContext()->getCurrentUserId());
        self::assertEquals('456', $instance->getContext()->getIpAddress());
        self::assertEquals('789', $instance->getContext()->getSessionId());
        self::assertEquals('dev', $instance->getContext()->getEnvironment());
        self::assertNotSame($instance->getContext(), $instance->getContext());
    }

    public function testSetDefaultContext()
    {
        $instance = new DefaultUnleashContextProvider();
        $context = new UnleashContext('123', '456', '789', [], null, 'dev');
        $instance->setDefaultContext($context);

        self::assertInstanceOf(UnleashContext::class, $instance->getContext());
        self::assertEquals('123', $instance->getContext()->getCurrentUserId());
        self::assertEquals('456', $instance->getContext()->getIpAddress());
        self::assertEquals('789', $instance->getContext()->getSessionId());
        self::assertEquals('dev', $instance->getContext()->getEnvironment());
        self::assertNotSame($instance->getContext(), $instance->getContext());
    }
}
