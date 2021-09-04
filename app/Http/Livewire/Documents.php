<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;


class Documents extends Component
{

    use WithPagination;

    public $term;

    public function render()
    {

        if($this->term){

            $documents = Document::search($this->term)
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
        } else {

            $documents = Document::with('user')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
        }


        return view('livewire.documents', compact('documents'));
    }
}
