<?php

namespace App\Modules\Ranking\Contracts;

interface RankingService
{

    public function getRating(int $id): ?float;

    public function getRatingCnt(int $id) : int;

    public function setRating(int $id, float $rating): void;

    public function setRatingCnt(int $id, int $cnt): void;

    public function addRating(int $id, float $rating): void;

    public function forget(int $id): void;

}