<?php

namespace App\Orchid\Screens\Pacient;

use App\Models\Pacient;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class PacientEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Krijo Pacient';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'Të dhënat e pacientit';

    public $exists = false;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Pacient $pacient): array
    {
        $this->exists = $pacient->exists;

        if($this->exists){
            $this->name = 'Ndrysho pacientin '.$pacient->first_name.' '.$pacient->last_name;
        }

        return [
            'pacient' => $pacient
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
            Button::make('Krijo pacient')
                ->icon('pencil')
                ->method('create')
                ->canSee(!$this->exists),

            Button::make('Ndrysho')
                ->icon('note')
                ->method('update')
                ->canSee($this->exists),

            Button::make('Fshij')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
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
            Layout::rows([
                Input::make('pacient.first_name')
                    ->title('Emri')
                    ->placeholder('Emri i pacientit')
                    ->required(),

                Input::make('pacient.fathers_name')
                    ->title('Emri i prindit')
                    ->placeholder('Emri i prindit të pacientit')
                    ->required(),

                Input::make('pacient.last_name')
                    ->title('Mbiemri')
                    ->placeholder('Mbiemri i pacientit')
                    ->required(),

                Input::make('pacient.personal_number')
                    ->type('number')
                    ->maxRows(10)
                    ->title('Numri Personal')
                    ->placeholder('Numri Personal i pacientit')
                    ->required(),

                Input::make('pacient.date_of_birth')
                    ->type('date')
                    ->title('Datelindja')
                    ->placeholder('Datelindja i pacientit')
                    ->required(),
                
                Select::make('pacient.gender')
                    ->options([
                        'M'   => 'Mashkull',
                        'F' => 'Femer',
                    ])
                    ->title('Gjinia')
                    ->require(),

                Input::make('pacient.address')
                    ->title('Adresa')
                    ->placeholder('Adresa e pacientit')
                    ->required(),

                Input::make('pacient.residence')
                    ->title('Vendbanimi')
                    ->placeholder('Vendbanimi i pacientit')
                    ->required(),
                
                Input::make('pacient.city')
                    ->title('Qyteti')
                    ->placeholder('Qyteti i pacientit')
                    ->required(),

                Input::make('pacient.phone')
                    ->mask('999 999-999')
                    ->title('Numri i telefonit')
                    ->placeholder('Numri i telefonit të pacientit')
                    ->required(),

                Input::make('pacient.email')
                    ->type('email')
                    ->title('E-Mail')
                    ->placeholder('E-Mail i pacientit'),
            ])
        ];
    }
    
    public function create(Pacient $pacient, Request $request)
    {
        $pacient->fill($request->get('pacient'))->save();
        
        Alert::info('Pacienti u krijua me sukses.');

        return redirect()->route('platform.pacient.list');
    }

    public function update(Pacient $pacient, Request $request)
    {
        $pacient->fill($request->get('pacient'))->save();
        
        Alert::info('Pacienti u ndryshua me sukses.');

        return redirect()->route('platform.pacient.list');
    }
 
    public function remove(Pacient $pacient)
    {
        $pacient->delete();

        Alert::info('Pacienti u fshi me sukses.');

        return redirect()->route('platform.pacient.list');
    }
}
