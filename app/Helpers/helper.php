<?php
function getCategories($categories,$selected=null, $prefix = ''){
    $html = '';
    foreach ($categories as $key=>$category) {
        if($category->id==$selected){
            $html.="<option selected value='$category->id'>".$prefix.$category->name."</option>";
        }else{
            $html.="<option value='$category->id'>".$prefix.$category->name."</option>";
        }
        $html.=getCategories($category->children, $selected,$prefix.'--');
    }
    return $html;
};


function upload($file)
{
    $name = 'uploads/'.time() .'_'. str_replace(' ','_',$file->getClientOriginalName());


    $file->move('uploads', $name);




    /*//create thumbnail
    $thumb= function ($width,$height) use ($md5,$name,$file,$folder){
        $resize = $folder.'/'.$md5 .'_'.$width.'x'.$height.'.'.strtolower($file->getClientOriginalExtension()); //abc_144x234.png
        Image::make($name)
            ->resize($width*2, $height*2)
            ->save($resize);

    };


    $thumb(100, 62);
    $thumb(290, 290);
    $thumb(468, 468);*/

    //tra ve de luu du lieu

    return $name;


}

function deleteUpload($path)
{
    if (File::isFile(public_path($path))) {
        $img=explode('.', $path);
        foreach (glob( public_path($img[0])."*.".end($img) ) as $filename) {
            unlink($filename);
        }

    }
}

function get_thumbnail($fileName,$suffix,$return=true,$placeholder=false)
{
    if($fileName){
        //      uploads/2019/04/fbf5a4.jpg
         $thumb= preg_replace('/(.*)\.(.*)/', "$1_$suffix.$2", $fileName);
        //   uploads/2019/04/d3f87a_100x62.jpg
    }
    if ($return) {
        //return <img src... />
        $match = explode('x', $suffix);

        if (isset($thumb) && File::isFile(public_path($thumb))) {
            return "<img src=" . asset($thumb) . " width=$match[0] height=$match[1]>";
        } else {
            if($placeholder){
                return "<img src='https://via.placeholder.com/$suffix'/> ";
            }
            return "<img src='".asset('images/no_image.jpg')."' width=$match[0] height=$match[1] >";
        }
    }else{
        return $thumb;
    }

}


function showTimeAgo($time)
{
    return \Carbon\Carbon::createFromTimestamp(strtotime($time))->diffForHumans();
}

function format($num)
{
    return number_format($num, 0, '.', '.') . ' VND';
}
function input($name,$value=null,$type='text',$additional=null){
    $errors = Session::get('errors', new Illuminate\Support\MessageBag);
    $class=$errors->has($name)?'is-invalid':'';
    return ' <div class="form-section">
                    <label >'.ucfirst(str_replace('_',' ',$name)).'</label>
                    <input type="'.$type.'" value="'.old($name,$value).'" class="form-control '.$class.'" name="'.$name.'" '.$additional.'>
                    <div class="invalid-feedback">
                        '.$errors->first($name).'
                    </div>
                </div>';
}
function textarea($name,$value=null,$type='text'){
    $errors = Session::get('errors', new Illuminate\Support\MessageBag);
    $class=$errors->has($name)?'is-invalid':'';
    return ' <div class="form-section">
                    <label >'.ucfirst(str_replace('_',' ',$name)).'</label>
                    <textarea height="300px" class="form-control '.$class.'" name="'.$name.'" >'.old($name,$value).'</textarea>
                    <div class="invalid-feedback">
                        '.$errors->first($name).'
                    </div>
                </div>';
}
function select($name,$arr,$value=null) {
    $html = '';
    foreach($arr as $k=>$v){
        $select =old($name,$value)== $k ? 'selected' : '';
        $html.= "<option value='$k' $select>$v</option>";
    }
    return ' <div class="form-group">
                <label for="">'.ucfirst(str_replace('_',' ',$name)).'</label>
                <select name="'.$name.'" id="" class="form-control">
                    '.$html.'
                </select>
            </div>';
}
function submit($color='warning') {
    return '<br><div class="form-group">
                <input type="submit" class="btn btn-'.$color.' pull-left" value="Submit"></div>';
}
function thumbnail($img,$width=null,$height=null) {


    if ($img) {
        return  "<img src='".asset($img)."' width='$width' height='$height'>";
    }
    return  "<img src='".asset('uploads/no_image.jpg')."'>";
}
