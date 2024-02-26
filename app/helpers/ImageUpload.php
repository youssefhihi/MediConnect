<?php
namespace App;
use App\Models\Image;

trait ImageUpload
{
    public function storeImg(object $obj , $image)
    {
        $imageName = $this->move($image);
        Image::create([
            "url" => $imageName,
            "pictureable_id" => $obj->id,
            "pictureable_type" => get_class($obj)
        ]);
    }
    public function updateImg(object $obj, $image)
    {
        $imageName = $this->move($image);

        Image::where('pictureable_id' , $obj->id )
                ->where('pictureable_type', get_class($obj))
                ->update(['url' => $imageName]);

    }
    public function move($image)
    {
        $imageName = time() . "." . $image->extension();
        $image->storeAs('public/', $imageName);
        return $imageName;
    }
}