<?php

namespace App\Security;

use Xervice\Security\SecurityDependencyProvider as XerviceSecurityDependencyProvider;
use XerviceTest\Security\Authenticator\TestAuthenticator;

class SecurityDependencyProvider extends XerviceSecurityDependencyProvider
{
    /**
     * Give a list of valid authenticator (string => AuthenticatorInterface::class)
     * e.g.
     * token => tokenAuthenticator::class
     *
     * @return array
     */
    protected function getAuthenticatorList(): array
    {
        return [
            'test' => TestAuthenticator::class
        ];
    }

}