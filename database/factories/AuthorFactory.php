<?php

namespace Database\Factories;

use App\Models\Author;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        return [
            'name' =>  $name ,
            'email' => $this->faker->safeEmail(),
            'bio' => $this->faker->text(),
            'photo' =>  "pineapple.jpg",
            'slug' => $this->faker->slug(),
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (Author $author) {
    //         // $faker = FakerFactory::create();

    //         $dir = storage_path('app' . DIRECTORY_SEPARATOR . 'public');
            
    //         /** FIXME: HAX TO BYPASS FAKER IMAGE PROVIDER (placeholder.com is discontinued) */
    //         // adapted from faker

    //         $filename = $author->photo;
    //         $filepath = $dir . DIRECTORY_SEPARATOR . $filename;
    //         echo $filepath;
    //         $url = "https://picsum.photos/seed/" . urlencode($author->name) . "/640/640.jpg";

    //         if (function_exists('curl_exec')) {
    //             // use cURL
    //             $fp = fopen($filepath, 'w');
    //             $ch = curl_init($url);
    //             curl_setopt($ch, CURLOPT_FILE, $fp);
    //             $success = curl_exec($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) === 200;
    //             fclose($fp);
    //             curl_close($ch);
    
    //             if (!$success) {
    //                 unlink($filepath);
    //                 echo "failed to download image";
    //                 // could not contact the distant URL or HTTP error - fail silently.
    //                 return false;
    //             }
    //         } elseif (ini_get('allow_url_fopen')) {
    //             // use remote fopen() via copy()
    //             $success = copy($url, $filepath);
    
    //             if (!$success) {
    //                 // could not contact the distant URL or HTTP error - fail silently.
    //                 return false;
    //             }
    //         } else {
    //             return new \RuntimeException('The image formatter downloads an image from a remote HTTP server. Therefore, it requires that PHP can request remote hosts, either via cURL or fopen()');
    //         }
            
    //         $author->photo = $filename;

    //         $author->save();

    //     });
    // }
}