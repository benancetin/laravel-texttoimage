    <?php
    namespace benancetin\texttoimage;

    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Config;
    use Illuminate\Http\Request;
    use App\Http\Requests;

    class TextToImage extends Controller
    {
        public function index($string='null')
        {
            $imageWidth = Config::get('texttoimage.imageWidth');
            $imageHeight = Config::get('texttoimage.imageHeight');
            $image = ImageCreate($imageWidth, $imageHeight); 

            $colorBackground = ImageColorAllocate($image, 
                Config::get('texttoimage.colorBackground.R'), 
                Config::get('texttoimage.colorBackground.G'), 
                Config::get('texttoimage.colorBackground.B')
            );

            $colorText = ImageColorAllocate($image, 
                Config::get('texttoimage.colorText.R'), 
                Config::get('texttoimage.colorText.G'), 
                Config::get('texttoimage.colorText.B')
            );

            $colorFrame = ImageColorAllocate($image, 
                Config::get('texttoimage.colorFrame.R'), 
                Config::get('texttoimage.colorFrame.G'), 
                Config::get('texttoimage.colorFrame.B')
            );

            ImageFill($image, 0, 0, $colorBackground);
            ImageString($image, 3, 20, 3, $string, $colorText);
            ImageRectangle($image,0,0,$imageWidth-1,$imageHeight-1,$colorFrame); 
            header("Content-Type: image/jpeg"); 
            ImageJpeg($image);
            ImageDestroy($image);
        }
    }