<?php

namespace Destiny;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use League\ColorExtractor\Color;
use League\ColorExtractor\ColorExtractor;
use League\ColorExtractor\Palette;

trait Destined
{
    public function setAvatarHex()
    {
        $pal = Palette::fromFilename(storage_path('app/avatars/' . $this->avatar));
        $most = $pal->getMostUsedColors(1);

        $ext = new ColorExtractor($pal);
        $colors = $ext->extract(1);

        $color = Color::fromIntToHex($colors[0]);

        $this->avatar_hex = $color;
        $this->save();

        return;
    }

    public function setBanner()
    {
        $this->setColorLoverPattern();
    }

    public function setColorLoverPattern()
    {
        $pal = Palette::fromFilename(storage_path('app/avatars/' . $this->avatar));
        $most = $pal->getMostUsedColors(5);

        $ext = new ColorExtractor($pal);
        $colors = $ext->extract(5);

        $hex = '';

        foreach ($colors as $color) {

            echo(ltrim(Color::fromIntToHex($color), '#') . PHP_EOL);
        }

        foreach ($colors as $color) {
            $hex = ltrim(Color::fromIntToHex($color), '#');
            $request = 'http://www.colourlovers.com/api/patterns?hex=' . $hex . '&numResults=1&format=json&orderCol=score&sortBy=DESC';
            $api_response = json_decode(file_get_contents($request));

            if (count($api_response) > 0) {
                $pattern = file_get_contents($api_response[0]->imageUrl);


                $banner = $this->id . '.jpg';

                file_put_contents(storage_path('app/banners/' . $banner), $pattern);

                $this->banner = $banner;
                $this->save();

                return;
            }
        }
    }
}