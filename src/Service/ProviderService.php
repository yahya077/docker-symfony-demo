<?php

namespace App\Service;

use App\Abstracts\ProviderAbstract;

class ProviderService extends ProviderAbstract {

    public function getFirstProviderResponse()
    {
        return $this
            ->prepareResourceKeys('estimated_duration','level')
            ->usesKeyAsName()
            ->setEndpoint('5d47f235330000623fa3ebf7')
            ->send();
    }

}
