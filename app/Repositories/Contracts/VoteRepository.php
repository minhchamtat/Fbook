<?php

namespace App\Repositories\Contracts;

use App\Eloquent\Vote;

interface VoteRepository extends AbstractRepository
{
    public function voteUp($review);

    public function voteDown($review);
}
