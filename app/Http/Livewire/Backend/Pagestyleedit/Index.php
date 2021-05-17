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

    public $marquee;
    public $menutop;

    public function save()
    {


        $webURL = url('/');
        $parse = parse_url($webURL);
        $parseURL = $parse['host'];   //check url parse http and www
        $_documentroot = dbisp()->table('web_domain')->where('domain', $parseURL)->first('document_root');
        $documentroot = substr($_documentroot->document_root, 17);
        $uploadpath = "" . $documentroot . "/web/upload/img/";

        $getdb = db2()->table('settings')->where('id', 2)->first();
        if ($this->header) {
            $oriname = $this->header->getClientOriginalName();

            $this->validate([
                'header' => 'image|max:10000024', // 1MB Max
            ]);

            $this->header->storeAs($uploadpath, 'header_oldweb.jpg', 'oldweb');

        } else {
            $name = $getdb->header_bg_img;
        }
    }


    public function render()
    {

        $this->menutop = db2()->table('tb_menutop')->get();
        $this->marquee = getCss()->marquee_text;

        return view('livewire.backend.pagestyleedit.index');
    }
}
