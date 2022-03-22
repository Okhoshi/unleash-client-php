<?php

namespace Unleash\Client\ConstraintValidator\Operator\Version;

/**
 * @internal
 */
final class VersionGreaterThanOperatorValidator extends AbstractVersionOperatorValidator
{
    /**
     * @param mixed[]|string $searchInValue
     */
    protected function validate(string $currentValue, $searchInValue): bool
    {
        assert(is_string($searchInValue));

        return version_compare($currentValue, $searchInValue, 'gt');
    }
}