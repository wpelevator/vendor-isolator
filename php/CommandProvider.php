<?php

namespace WPElevator\Vendor_Isolator;

use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;

final class CommandProvider implements CommandProviderCapability
{
    /**
     * {@inheritdoc}
     */
    public function getCommands()
    {
        return [new Command()];
    }
}
