<?php

namespace App\Repositories;

use App\Contracts\DomainContract;
use App\Models\Domain;
use App\Enums\Domain\Status;

class DomainRepository extends BaseRepository implements DomainContract {

    protected Domain $domain;

    public function __construct(Domain $domain)
    {
        $this->domain = $domain;
        parent::__construct($domain);
    }

    public function create(array $data)
    {
        $data["status"] = Status::ACTIVE;

        $domain = $this->domain->create($data);

        return $domain;
    }

    public function update($domain , array $data)
    {
        $domain = $this->findById($domain);

        $domain->update($data);

        return $domain;
    }

    public function destroy($id)
    {
        $domain = $this->findById($id);

        $domain->delete($domain);
    }

}