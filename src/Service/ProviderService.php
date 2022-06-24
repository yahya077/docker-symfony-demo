<?php

namespace App\Service;

use App\Abstracts\ProviderAbstract;

class ProviderService extends ProviderAbstract {

    public function getFirstProviderResponse():array
    {
        return $this
            ->prepareResourceKeys('estimated_duration','level')
            ->usesKeyAsName()
            ->setEndpoint('5d47f235330000623fa3ebf7')
            ->send();
    }

    public function getSecondProviderResponse():array
    {
        return $this
            ->setEndpoint('5d47f24c330000623fa3ebfa')
            ->send();
    }

}
