<?php

namespace App\Http\Livewire\Backend\Pagestyleedit;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{

    use WithFileUploads;

    public $test2;
    public $header;

    public function save()
    {

        $aa = dbisp()->table('web_domain')->first();
        dd($aa);
        $getdb = db2()->table('settings')->where('id', 2)->first();
        if ($this->header) {
            $oriname = $this->header->getClientOriginalName();

            $this->validate([
                'header' => 'image|max:10000024', // 1MB Max
            ]);

            $this->header->storeAs('img', 'header_oldweb.jpg', 'oldweb');

        } else {
            $name = $getdb->header_bg_img;
        }
    }


    public function render()
    {

        return view('livewire.backend.pagestyleedit.index');
    }
}
