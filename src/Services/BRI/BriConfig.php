<?php

namespace Niandev\SnapBI\Services\BRI;

use Niandev\SnapBI\Interfaces\ConfigInterface;
use Niandev\SnapBI\Traits\HasConfig;
use Niandev\SnapBI\Traits\HasSelfCall;


final class BriConfig implements ConfigInterface
{
    use HasConfig, HasSelfCall;
}