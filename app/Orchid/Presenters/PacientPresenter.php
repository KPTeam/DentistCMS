<?php

namespace App\Orchid\Presenters;

use Laravel\Scout\Builder;
use Orchid\Screen\Contracts\Personable;
use Orchid\Screen\Contracts\Searchable;
use Orchid\Support\Presenter;

class PacientPresenter extends Presenter implements Searchable, Personable
{

     /**
     * @return string
     */
    public function label(): string
    {
        return 'Pacientët';
    }

    public function title(): string
    {
        return $this->entity->first_name.' '.$this->entity->fathers_name.' '.$this->entity->last_name;
    }

    /**
     * @return string
     */
    public function subTitle(): string
    {
        return $this->entity->personal_number;
    }

    public function image(): ?string
    {
        return "    ";
    }
    /**
     * @return string
     */
    public function name(): string
    {
        return $this->entity->first_name.' '.$this->entity->last_name;
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        return $this->entity->first_name.' '.$this->entity->fathers_name.' '.$this->entity->last_name;
    }

    public function fullAdress(): string
    {
        return $this->entity->address.' '.$this->entity->residence.' '.$this->entity->city;
    }

    /**
     * @return string
     */
    public function url(): string
    {
        return route('platform.pacient.edit', $this->entity);
    }

    /**
     * The number of models to return for show compact search result.
     *
     * @return int
     */
    public function perSearchShow(): int
    {
        return 3;
    }

    /**
     * @param string|null $query
     *
     * @return Builder
     */
    public function searchQuery(string $query = null): Builder
    {
        return $this->entity->search($query);
    }
}
