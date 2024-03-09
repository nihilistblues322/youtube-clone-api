<?php

namespace App\Traits;

trait WithRelationships
{
    public function scopeWithRelationships($query, array|string $relationships)
    {
        $validRelationships = collect($relationships)
            ->map(fn (string $relationships): array => explode('.', $relationships))
            ->filter(fn (array $relationships): bool => (new static)->hasRelationships($relationships))
            ->map(fn (array $relationships): string => implode('.', $relationships))
            ->all();

        return $query->with($validRelationships);
    }

    public function hasRelationships(array $relationships)
    {
        return (bool) collect($relationships)->reduce(fn ($model, $relationship) => optional($model)->hasRelationship($relationship), $this);
    }

    public function hasRelationship($relationship)
    {
        return $this->isValidRelationship($relationship) ? $this->$relationship()->getRelated() : null;

    }

    public function isValidRelationship(string $relationship)
    {
        return method_exists($this, $relationship) && in_array($relationship, static::$relationships);
    }
}
