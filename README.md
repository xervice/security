Xervice: Security
====================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xervice/security/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xervice/security/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/xervice/security/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xervice/security/?branch=master)

Implement security service to xervice.


Installation
--------------
```
composer require xervice/security
```


Configuration
----------------
The security module is only to provide your own authentication methods. You can define them by extending the SecurityDataProvider::getAuthenticatorList.

```php
<?php

namespace App\Security;

use Xervice\Security\SecurityDependencyProvider as XerviceSecurityDependencyProvider;

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
            'myauth' => MyAuthenticator::class
        ];
    }

}
```

Authenticator
---------------

To define own authenticator, you have to implement the interface \Xervice\Security\Business\Authenticator\AuthenticatorInterface.

***Example***
```php
<?php

namespace App\MyModule\Business\Authenticator;

use DataProvider\AuthenticatorDataProvider;
use DataProvider\SimpleCredentialsDataProvider;
use Xervice\Security\Business\Dependency\Authenticator\AuthenticatorInterface;
use Xervice\Security\Business\Exception\SecurityException;

class MyAuthenticator implements AuthenticatorInterface
{
    /**
     * @param \DataProvider\AuthenticatorDataProvider $dataProvider
     *
     * @throws \Xervice\Security\Business\Exception\SecurityException
     */
    public function authenticate(AuthenticatorDataProvider $dataProvider): void
    {
        if (!($dataProvider->getAuthData() instanceof SimpleCredentialsDataProvider)) {
            throw new SecurityException('Incorrect DataProvider for authenticator');
        }

        if (
            $dataProvider->getAuthData()->getUsername() !== 'staticusername'
            && $dataProvider->getAuthData()->getPassword() !== 'staticpassword'
        ) {
            throw new SecurityException('Authorization failed');
        }
    }
}
```

Usage
---------------------

To use the security module, you can authorize with the facade:

```php
$credentials = new SimpleCredentialsDataProvider();
$credentials
    ->setUsername('staticusername')
    ->setPassword('staticpassword');

$auth = new AuthenticatorDataProvider();
$auth->setAuthData($credentials);

$securityFacade = Locator::getInstance()->security()->facade()->authenticate(
    'myauthenticator',
    $auth
);
```