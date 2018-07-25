<?php


namespace XerviceTest\Security\Authenticator;


use DataProvider\AuthenticatorDataProvider;
use DataProvider\SimpleCredentialsDataProvider;
use Xervice\Security\Business\Authenticator\AuthenticatorInterface;
use Xervice\Security\Business\Exception\SecurityException;

class TestAuthenticator implements AuthenticatorInterface
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

        if ($dataProvider->getAuthData()->getUsername() !== 'unit' && $dataProvider->getAuthData()->getPassword() !== 'test') {
            throw new SecurityException('Authorization failed');
        }
    }

}