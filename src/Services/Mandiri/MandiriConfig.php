<?php

namespace Niandev\SnapBI\Services\Mandiri;

use Niandev\SnapBI\Interfaces\ConfigInterface;
use Niandev\SnapBI\Traits\HasConfig;
use Niandev\SnapBI\Traits\HasSelfCall;


final class MandiriConfig implements ConfigInterface
{
    use HasConfig, HasSelfCall;
}