<?php

namespace Unicaen\Uniweb\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UniwebUserBundle extends Bundle
{
    /**
     * @return string The inherited class
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
