<?php

namespace Niandev\SnapBI\Services\BCA;

use Niandev\SnapBI\Core\SnapApiCore;
use Niandev\SnapBI\Exception\SnapBiException;
use Niandev\SnapBI\Interfaces\SnapApiInterface;
use Niandev\SnapBI\Services\BCA\Traits\HasAccessToken;
use Niandev\SnapBI\Services\BCA\Traits\HasTransaction;
use Niandev\SnapBI\Services\BCA\Traits\HasVirtualAccount;
use Niandev\SnapBI\Traits\HasSelfCall;

class BcaSnapApi extends SnapApiCore implements SnapApiInterface
{
    use HasSelfCall;
    use HasAccessToken;
    use HasTransaction;
    use HasVirtualAccount;

    function __construct()
    {
        if (!count(BcaConfig::all())) {
            throw new SnapBiException("Please register configuration first. See https://php-snap-bi.gitbook.io/docs/getting-started/configuration", 1);
        }
    }
}