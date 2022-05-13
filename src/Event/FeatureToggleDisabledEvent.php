<?php

namespace Unleash\Client\Event;

use Unleash\Client\Configuration\Context;
use Unleash\Client\DTO\Feature;

final class FeatureToggleDisabledEvent
{
    /**
     * @readonly
     * @var \Unleash\Client\DTO\Feature
     */
    private $feature;
    /**
     * @readonly
     * @var \Unleash\Client\Configuration\Context
     */
    private $context;
    /**
     * @internal
     */
    public function __construct(Feature $feature, Context $context)
    {
        $this->feature = $feature;
        $this->context = $context;
    }
    /**
     * @codeCoverageIgnore
     */
    public function getFeature(): Feature
    {
        return $this->feature;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getContext(): Context
    {
        return $this->context;
    }
}
