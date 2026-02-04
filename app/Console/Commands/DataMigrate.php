<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\VideoGallery;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Http;
use Str;
use App\Models\Department;
use App\Models\Project;
use App\Models\PersonalProfile;
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
        $sql = "SELECT * from ombadc_banner where SectorID=0 and Status=1";
        $data = DB::connection('mysql_main')->select($sql);

        foreach ($data as $key => $value) {
            $name = $value->Caption;
            $image = explode(".", $value->Image);
            $media = Media::where([
                ['model_type', "like", "%Banner%"],
                ['model_id', 4],
                ['name', $image[0]]
            ])->first();

            if(!empty($media)){
                $media->order_column = $value->Odr;
                $media->update();
            }
            

            // $video = [
            //     'name' => $value->Name,
            //     'code' => $value->Code,
            //     'order' => $value->Odr
            // ];
            // $video_data = new VideoGallery($video);
            // $video_data->save();
            // $kalia = [
            //     'name' => $value->per_name,
            //     'designation' => $value->per_desig,
            //     'staff_category' => $value->per_type,
            //     'email' => $value->per_email,
            //     'phone_number' => $value->per_phone,
            //     'date_of_birth' => date('Y-m-d', strtotime($value->per_dob)),
            //     'qualification' => $value->per_qualification,
            //     'short_brief' => $value->per_exp,
            //     'order' => $value->pos
            // ];

            // $personal = PersonalProfile::where('name', $value->per_name)->first();
            // $personal->order = $value->pos;
            // $personal->update();

            // $personal = new PersonalProfile($kalia);
            // $personal->save();

            // $url = "https://www.ombadc.in/images/profile_images/".$value->per_photo;
            // if($this->imageUrlExists($url)){
            //     $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
            //     $personal->addMediaFromUrl($url)->usingFileName(Str::random(16). ($extension ? '.' . $extension : ''))->toMediaCollection('personal_profile');
            // }
        }


        // dd($data);
        // foreach ($data as $key => $value) {
        //     $d = [
        //         'department_id' => 19,
        //         'name' => $value->Name,
        //         // 'short_name' => $value->ShortName,
        //         'sanctioned' => trim(str_replace([',', '₹', 'Cr.', 'Cr'], '', $value->Sanctioned)),
        //         'released' => trim(str_replace([',', '₹', 'Cr.', 'Cr'], '', $value->Released)),
        //         'utilized' => trim(str_replace([',', '₹', 'Cr.', 'Cr'], '', $value->Utilised)),
        //     ];
        //     $dis = New Project($d);
        //     // $dis->save();
        // }
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

    private function imageUrlExists($url) {
        $headers = @get_headers($url);
        return $headers && strpos($headers[0], '200') !== false;
    }
}
