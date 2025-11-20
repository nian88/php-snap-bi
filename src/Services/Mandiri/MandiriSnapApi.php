<?php

namespace Niandev\SnapBI\Services\Mandiri;

use Niandev\SnapBI\Core\SnapApiCore;
use Niandev\SnapBI\Exception\SnapBiException;
use Niandev\SnapBI\Interfaces\SnapApiInterface;
use Niandev\SnapBI\Services\Mandiri\Traits\HasAccessToken;
use Niandev\SnapBI\Services\Mandiri\Traits\HasTransaction;
use Niandev\SnapBI\Traits\HasSelfCall;

class MandiriSnapApi extends SnapApiCore implements SnapApiInterface
{
    use HasSelfCall;
    use HasAccessToken;
    use HasTransaction;

    function __construct()
    {
        if (!count(MandiriConfig::all())) {
            throw new SnapBiException("Please register configuration first. See https://php-snap-bi.gitbook.io/docs/getting-started/configuration", 1);
        }
    }
}