<?php

namespace Unleash\Client\Event;

use Symfony\Contracts\EventDispatcher\Event;
use Unleash\Client\Configuration\Context;

final class FeatureToggleNotFoundEvent extends Event
{
    /**
     * @readonly
     * @var \Unleash\Client\Configuration\Context
     */
    private $context;
    /**
     * @readonly
     * @var string
     */
    private $featureName;
    /**
     * @internal
     */
    public function __construct(Context $context, string $featureName)
    {
        $this->context = $context;
        $this->featureName = $featureName;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getContext(): Context
    {
        return $this->context;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getFeatureName(): string
    {
        return $this->featureName;
    }
}
