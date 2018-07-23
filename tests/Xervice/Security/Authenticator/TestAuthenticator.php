<?php


namespace XerviceTest\Security\Authenticator;


use DataProvider\SimpleCredentialsDataProvider;
use Xervice\DataProvider\DataProvider\DataProviderInterface;
use Xervice\Security\Business\Authenticator\AuthenticatorInterface;
use Xervice\Security\Business\Exception\SecurityException;

class TestAuthenticator implements AuthenticatorInterface
{
    /**
     * @param \Xervice\DataProvider\DataProvider\DataProviderInterface $dataProvider
     *
     * @throws \Xervice\Security\Business\Exception\SecurityException
     */
    public function authenticate(DataProviderInterface $dataProvider): void
    {
        if (!($dataProvider instanceof SimpleCredentialsDataProvider)) {
            throw new SecurityException('Incorrect DataProvider for authenticator');
        }

        if ($dataProvider->getUsername() !== 'unit' && $dataProvider->getPassword() !== 'test') {
            throw new SecurityException('Authorization failed');
        }
    }

}