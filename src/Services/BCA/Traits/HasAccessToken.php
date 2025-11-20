<?php

namespace Niandev\SnapBI\Services\BCA\Traits;

use Niandev\SnapBI\Exception\AuthenticateException;
use Niandev\SnapBI\Interfaces\HttpResponseInterface;
use Niandev\SnapBI\Services\BCA\BcaConfig;
use Niandev\SnapBI\Support\HttpResponse;
use Niandev\SnapBI\Support\Signature;
use Niandev\SnapBI\Support\Http;


trait HasAccessToken
{

    protected static $token;

    /**
     * Set token if needed
     *
     * @param string $token
     * @return self
     */
    public static function withTokenB2b(string $token = null): self
    {
        if ($token) {
            self::$token = $token;
        } else {
            self::$token = self::accessTokenB2b()->object()->accessToken;
        }

        return new self;
    }

    /**
     * Throw error if not authenticated
     *
     * @return void
     */
    public static function authenticated()
    {
        if (!self::$token) {
            throw new AuthenticateException("Unauthorized: Please provide an access token", 400);
        }
    }

    /**
     * Get access token
     *
     * @return HttpResponse
     */
    public static function accessTokenB2b(): HttpResponseInterface
    {
        $path    = BcaConfig::get('base_url') . "/openapi/v1.0/access-token/b2b";
        $headers = [
            'X-TIMESTAMP'  => currentTimestamp()->toIso8601String(),
            'X-CLIENT-KEY' => BcaConfig::get('client_id'),
            'X-SIGNATURE'  => Signature::asymmetric(BcaConfig::class),
        ];

        $body = ['grantType' => 'client_credentials'];
        return Http::withHeaders($headers)->post($path, $body);
    }
}