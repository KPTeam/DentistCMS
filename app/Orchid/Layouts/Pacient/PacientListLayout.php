<?php

namespace App\Orchid\Layouts\Pacient;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Persona;
use App\Models\Pacient;

class PacientListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'pacients';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('pacient', 'Pacienti')
                ->render(function (Pacient $pacient) {
                    return new Persona($pacient->presenter());
                }),
            TD::make('date_of_birth', 'Ditelindja')
                ->render(function (Pacient $pacient) {
                    return  $pacient->first_name.' '.$pacient->fathers_name.' '.$pacient->last_name;
                }),
            TD::make('pacient', 'Pacienti')
                ->render(function (Pacient $pacient) {
                    return  $pacient->first_name.' '.$pacient->fathers_name.' '.$pacient->last_name;
                }),
            TD::make('created_at', 'Krijua'),
            TD::make('updated_at', 'Ndryshua'),
        ];
    }
}
