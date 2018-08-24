<?php

namespace App\Security;

use Xervice\Security\SecurityDependencyProvider as XerviceSecurityDependencyProvider;
use XerviceTest\Security\Authenticator\TestAuthenticator;

class SecurityDependencyProvider extends XerviceSecurityDependencyProvider
{
    /**
     * @return array
     */
    protected function getAuthenticatorList(): array
    {
        return [
            'test' => TestAuthenticator::class
        ];
    }

}