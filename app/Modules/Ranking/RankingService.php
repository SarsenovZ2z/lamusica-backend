<?php

namespace App\Modules\Ranking;

use App\Modules\Ranking\Contracts\RankingService as RankingServiceContract;
use Illuminate\Support\Facades\Redis;

class RankingService implements RankingServiceContract
{

    public function getRating(int $id): ?float
    {
        $key = $this->getRedisKey($id);

        return Redis::get($key);
    }

    public function getRatingCnt(int $id): int
    {
        $key = $this->getRedisKey($id);

        return Redis::get("{$key}:cnt") ?: 0;
    }

    public function setRating(int $id, float $rating): void
    {
        $key = $this->getRedisKey($id);

        Redis::set($key, $rating);
    }

    public function setRatingCnt(int $id, int $cnt): void
    {
        $key = $this->getRedisKey($id);

        Redis::set("{$key}:cnt", $cnt);
    }

    public function addRating(int $id, float $rating): void
    {
        $prevRating = $this->getRating($id) ?? 0;
        $cnt = $this->getRatingCnt($id) + 1;

        $newRating = $prevRating + ($rating - $prevRating) / $cnt;

        $this->setRating($id, $newRating);
        $this->setRatingCnt($id, $cnt);
    }

    public function forget(int $id): void
    {
        $key = $this->getRedisKey($id);

        Redis::del($key);
        Redis::del("{$key}:cnt");
    }

    protected function getRedisKey(int $id)
    {
        return "ranking:user:{$id}";
    }
    

}