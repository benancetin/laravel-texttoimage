<?php
namespace benancetin\texttoimage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class TextToImageServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/texttoimage.php', 'texttoimage'
        );

        $this->publishes([
            __DIR__.'/../config/texttoimage.php' => config_path('texttoimage.php'),], 'config'
        );

        Blade::directive('texttoimage', function ($expression) {
            return '<?php echo "<img src=\"/stamp/'.$expression.'\"></img>"; ?>';
        });
    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        include __DIR__.'/routes/web.php';
        $this->app->make('benancetin\texttoimage\TextToImage');
    }
}
