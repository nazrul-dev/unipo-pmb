
<?php
function isAssoc(array $arr)
{
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
}

function quickRandom($length = 16)
{
    $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}

if (!function_exists('includesArray')) {
    function includesArray($array, $id)
    {


        $found = false;
        if (isAssoc($array) === true) {

            $found = current(array_filter($array, function ($item) use ($id) {
                return isset($item) && $id === $item;
            }));
        }

        if ($found) {
            return true;
        }
    }
}


function getManifestAssets()
{

    $path = public_path() . "/build/manifest.json";
    $json = json_decode(file_get_contents($path), true);
   return [
    'js' => $json['resources/js/app.js']['file'],
    'css' => $json['resources/css/app.css']['file']
   ];
}
