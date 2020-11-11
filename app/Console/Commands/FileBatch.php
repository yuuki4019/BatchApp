<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Storage;
use App\Models\Item;

class FileBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "start file batch\n";


        /*$file_path = Storage::path('public/samplefile.csv');
        
        $file = fopen("$file_path","r");

        if($file){
            while($line = fgets($file)){
                $datas = explode(",",$line);
                //dump($line);
                //dd($datas);
                $item = new Item();
                $item->item_id = $datas[0];
                $item->price = $datas[1];
                $item->num = $datas[2];
                $item->save();
            }
        }*/

        $file_path = Storage::path('public/samplefiles.csv');
        
        try{    
            $file=new \SplFileObject($file_path);
            
        }catch(\RuntimeException $exception){
            echo("Not File\n");
            return(1);
        }
        
        $file->setFlags(
            \SplFileObject::READ_CSV |// CSVとして行を読み込み
            \SplFileObject::READ_AHEAD |// 先読み／巻き戻しで読み込み
            \SplFileObject::SKIP_EMPTY | // 空行を読み飛ばす
            \SplFileObject::DROP_NEW_LINE// 行末の改行を読み飛ばす
        );

        foreach($file as $line){
            $item = new Item();
            $item->item_id = $line[0];
            $item->price = $line[1];
            $item->num = $line[2];
            $item->save();
        }

        echo "end file batch\n";
        
        return 0;
    }
}
