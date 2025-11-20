<?php

namespace Niandev\SnapBI\Services\DANA;

use Niandev\SnapBI\Core\SnapApiCore;
use Niandev\SnapBI\Exception\SnapBiException;
use Niandev\SnapBI\Interfaces\SnapApiInterface;
use Niandev\SnapBI\Services\DANA\Traits\HasAccessToken;
use Niandev\SnapBI\Services\DANA\Traits\HasTransaction;
use Niandev\SnapBI\Traits\HasSelfCall;

class DanaSnapApi extends SnapApiCore implements SnapApiInterface
{
    use HasSelfCall;
    use HasAccessToken;
    use HasTransaction;

    function __construct()
    {
        if (!count(DanaConfig::all())) {
            throw new SnapBiException("Please register configuration first. See https://php-snap-bi.gitbook.io/docs/getting-started/configuration", 1);
        }
    }
}