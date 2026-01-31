<?php

namespace App\Console\Commands;

use App\Models\Page;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Http;
use Illuminate\Support\Facades\Str;
use App\Models\Department;
use App\Models\Project;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DataMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:data-migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate Old Data to new Database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sql = "SELECT * from ombadc_project where Status='1' and DepartmentID='17' AND isDeleted=0 order by ID desc";
        $data = DB::connection('mysql_main')->select($sql);
        // dd($data);
        foreach ($data as $key => $value) {
            $d = [
                'department_id' => 19,
                'name' => $value->Name,
                // 'short_name' => $value->ShortName,
                'sanctioned' => trim(str_replace([',', '₹', 'Cr.', 'Cr'], '', $value->Sanctioned)),
                'released' => trim(str_replace([',', '₹', 'Cr.', 'Cr'], '', $value->Released)),
                'utilized' => trim(str_replace([',', '₹', 'Cr.', 'Cr'], '', $value->Utilised)),
            ];
            $dis = New Project($d);
            // $dis->save();
        }
        // foreach($data as $key => $value){
        //     print($value->Name." \n");
            
        //     $new = [
        //         'name' => $value->Name,
        //         'page_type' => 'Orders',
        //         'page_content' => $value->Description,
        //     ];
        //     $page = New Page($new);
        //     $page->save();
        //     $photo = "https://www.ombadc.in/images/documents/".$value->Photo;
        //     $pdf = "https://www.ombadc.in/images/documents/".$value->Document;
            
        //     // ✅ Check if photo exists before uploading
        //     if (!empty($value->Photo) && Http::head($photo)->ok()) {
        //         $extension = pathinfo($photo, PATHINFO_EXTENSION) ?: 'jpg';
        //         if(!empty($page)){
        //             $existingMedia = $page->getFirstMedia('page_photo');

        //             if (!$existingMedia) {
        //                 // No existing media → add new one
        //                 $page->addMediaFromUrl($photo)
        //                     ->usingFileName(Str::random(16) . '.' . $extension)
        //                     ->toMediaCollection('page_photo');
        //             }
        //         }
        //     }
            
        //     // ✅ Check if PDF exists before uploading
        //     if (!empty($value->Document) && Http::head($pdf)->ok()) {
        //         $extension = pathinfo($pdf, PATHINFO_EXTENSION) ?: 'pdf';
        //         if(!empty($page)){
        //             $existingMedia = $page->getFirstMedia('page_pdf');

        //             if (!$existingMedia) {
        //                 // No existing media → add new one
        //                 $page->addMediaFromUrl($pdf)
        //                     ->usingFileName(Str::random(16) . '.' . $extension)
        //                     ->toMediaCollection('page_pdf');
        //             }
        //         }
        //     }

        // }
        
        // print("// ✅ Gallery Uploaded Successfully.\n");

    }
}
