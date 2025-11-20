<?php
namespace Niandev\SnapBI\Traits;

trait HasSelfCall
{

    /**
     * Call and return the current class
     *
     * @return self
     */
    static function call(): self
    {
        return new self;
    }
}