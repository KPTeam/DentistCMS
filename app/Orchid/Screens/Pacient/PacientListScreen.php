<?php

namespace App\Orchid\Screens\Pacient;

use Orchid\Screen\Action;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use App\Models\Pacient;
use Orchid\Screen\Actions\Link;
use App\Orchid\Layouts\Pacient\PacientListLayout;

class PacientListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Pacientet';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Lista e pacientëve';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'pacients' => Pacient::paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Krijo')
                ->icon('pencil')
                ->route('platform.pacient.edit')
        ];
    }

    /**
     * Views.
     *
     * @return string[]|Layout[]
     */
    public function layout(): array
    {
        return [
            PacientListLayout::class
        ];
    }
}
