<?php

namespace Niandev\SnapBI\Services\DANA;

use Niandev\SnapBI\Interfaces\ConfigInterface;
use Niandev\SnapBI\Traits\HasConfig;
use Niandev\SnapBI\Traits\HasSelfCall;


final class DanaConfig implements ConfigInterface
{
    use HasConfig, HasSelfCall;
}