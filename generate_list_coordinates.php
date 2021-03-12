<?php


require __DIR__ . '/../common_funcs.php';
init_console();

require_once 'index.php';

$fileRoot = $argv[1];
$fileResultRoot = $argv[2];
$lastObject = (int)$argv[3];
function callback(string $id, string $name, string $coords): string
{
    return $id . ';' . $name . ';' . $coords . PHP_EOL;
}

$dataFromFile = json_decode(file_get_contents($fileRoot), true);

$blackList = [
    'Россия' => function ($id, $name) {
        return callback($id, $name, "55.753215;37.622504");
    },
    'Центральный федеральный округ' => function ($id, $name) {
        return callback($id, $name, "55.753215;37.622504");
    },
    'Ненецкий автономный округ' => function ($id, $name) {
        return callback($id, $name, "67.638050;53.006926");
    },
    'Южный федеральный округ' => function ($id, $name) {
        return callback($id, $name, "47.222078;39.720349");
    },
    'Приволжский федеральный округ' => function ($id, $name) {
        return callback($id, $name, "56.326887;44.005986");
    },
    'Уральский федеральный округ' => function ($id, $name) {
        return callback($id, $name, "56.838011;60.597465");
    },
    'Ханты-Мансийский автономный округ - Югра' => function ($id, $name) {
        return callback($id, $name, "61.003180;69.018902");
    },
    'Ямало-Ненецкий автономный округ' => function ($id, $name) {
        return callback($id, $name, "66.529844;66.614399");
    },
    'Сибирский федеральный округ' => function ($id, $name) {
        return callback($id, $name, "55.030199;82.920430");
    },
    'Северо-Западный федеральный округ' => function ($id, $name) {
        return callback($id, $name, "59.938951;30.315635");
    },
    'Дальневосточный федеральный округ' => function ($id, $name) {
        return callback($id, $name, "43.115536;131.885485");
    },
    'Чукотский автономный округ' => function ($id, $name) {
        return callback($id, $name, "64.733115;177.508924");
    },
    'Северо-Кавказский федеральный округ' => function ($id, $name) {
        return callback($id, $name, "44.039290;43.070840");
    },
    'Крымский федеральный округ' => function ($id, $name) {
        return callback($id, $name, "44.948237;34.100318");
    },
    'Москва и Московская область' => function ($id, $name) {
        return callback($id, $name, "55.750683;37.617496");
    },
    'Санкт-Петербург и Ленинградская область' => function ($id, $name) {
        return callback($id, $name, "59.938951;30.315635");
    },
];

$result = '';
$errors = [];
$normalData = [];


try {
    $urlAPI = "http://search.maps.sputnik.ru/search/addr?";
    $parameters = [
        'q' => 'Москва и Московская область',
        'addr_limit' => '1',
    ];
    foreach ($dataFromFile as $data) {
        $paths = explode(', ', $data["path"]);
        if (count($paths) > 4) {
            foreach ($paths as $path) {
                if(isset($dataFromFile[$path])){
                    $str .= $dataFromFile[$path]['name'] . ' ,';
                }
            }
        }
    }
    dd($normalData);

    for ($i = $lastObject; $i < count($dataFromFile); $i++) {
        $lastObject = $i;
        $id = $dataFromFile[$i]['id'];
        $name = $dataFromFile[$i]['name'];
        $parameters['q'] = $name;
        $url = $urlAPI . http_build_query($parameters);
        $result = json_decode(file_get_contents($url), true);
        $coords = array_reverse($result['result']['address'][0]['features'][0]['geometry']['geometries'][0]['coordinates']);
        $coords = implode(';', $coords); // широта; долгота
        $fp = fopen($fileResultRoot, 'ab');
        fwrite($fp, isset($blackList[$name]) ? $blackList[$name]($id, $name) : callback($id, $name, $coords));
        fclose($fp);
    }
} catch (Throwable $throwable) {
    dd($result, $throwable, "последний искомый объект " . $lastObject);
}
//Ошибки с
//51
//67
//425
//833
//1030
//1228
