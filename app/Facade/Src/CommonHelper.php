<?php

namespace App\Facade\Src;
use App\Entities\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Translation\Translator;

class CommonHelper
{

    /**
     * Get a constant with translate label
     * If constant is array, return array with format: key => value
     * If constant is single, return translate label of this constant
     *
     * @param string $configName
     *
     * @return array|Translator|null|string
     */
    public static function getConstants($configName, $locale = null)
    {
        // get translate key from config name. Remove `constants` if has
        $translateKey = trim(str_replace('constants', '', $configName), '.');

        // get correct config name. Add `constants` if not has
        $configName = 'constants.' . $translateKey;

        // get config with config name
        $config = config($configName);

        // return null if empty config
        if (empty($config)) {
            return [];
        }

        // check type of config and return config translate
        if (is_array($config)) {
            return self::getConstant($translateKey, $config, $locale);
        } else {
            return trans('constants.' . $translateKey, [], $locale);
        }
    }

    public static function getConstant($translateKey, $config = [], $locale = null)
    {
        $arrayConfig = [];
        foreach ($config as $key => $value) {
            if($key != 'waiting'){
                if (is_array($value)) {
                    $arrayConfig[$key] = self::getConstant($translateKey . '.' . $key, $value, $locale);
                } else {
                    $arrayConfig[$value] = trans('constants.' . $translateKey . '.' . $value, [], $locale);
                }
            }

        }

        return $arrayConfig;
    }

    public static function generateStrongPassword($length = 12, $addDashes = false, $availableSets = 'luds')
    {
        $sets = array();
        if (strpos($availableSets, 'l') !== false) {
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        }

        if (strpos($availableSets, 'u') !== false) {
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        }

        if (strpos($availableSets, 'd') !== false) {
            $sets[] = '23456789';
        }

        if (strpos($availableSets, 's') !== false) {
            $sets[] = '!@#$%&*?';
        }

        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $password .= $all[array_rand($all)];
        }

        $password = str_shuffle($password);
        if (!$addDashes) {
            return $password;
        }

        $dashLen = floor(sqrt($length));
        $dashStr = '';
        while (strlen($password) > $dashLen) {
            $dashStr .= substr($password, 0, $dashLen) . '-';
            $password = substr($password, $dashLen);
        }

        $password .= $dashStr;

        return $password;
    }

    public static function getSizeImage( $filePath)
    {
        try {
            return Storage::disk(config('filesystems.default'))->size($filePath);

        } catch (\Exception $exception) {
            return 0;
        }
    }

    public static function convertHumanFileSize( $size)
    {
        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;

        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }

    public static function fileNameGenerator( $fileName, $ext = 'csv')
    {
        return $fileName . '-' . now()->format('d-m-Y'). '-' .time(). '.' . $ext;
    }

    public static function convertIntoSelectBoxData(collection $objects, $key = 'id', $value = 'name')
    {
        return collect($objects)->mapWithKeys(function ($item) use ($key, $value) {
            return [$item[$key] => $item[$value]];
        });
    }


    public static function isUser()
    {
        return Auth::check() && (Auth::user() instanceof User && Auth::user()->role_id == config('constants.user.roles.user'));
    }

    public static function isAdmin()
    {
        return Auth::check() && (Auth::user() instanceof User && Auth::user()->role_id == config('constants.user.roles.admin'));
    }

    public static function isMakerOrAdminLogin()
    {
        return Auth::check() && Auth::user() instanceof User;
    }

    function generateSortField( $label,  $fieldName,  $orderBy, $request, $classesForTh = '')
    {
        $label = htmlspecialchars($label);
        $fieldName = htmlspecialchars($fieldName);
        $orderBy = htmlspecialchars($orderBy);
        $classesForTh = htmlspecialchars($classesForTh);

        $sortActive = @$request['field_order_by'] === $orderBy ? 'active' : '';
        $sortIcon = '<i class="fa fa-sort table-column-sort-icon float-right pt-1"></i>';

        if (@$request['field_order_by'] === $orderBy && $request['field_name'] == $fieldName) {
            $sortIcon = @$request['field_order_by'] === 'desc'
                ? '<i class="fa fa-caret-up table-column-sort-icon float-right pt-1"></i>'
                : '<i class="fa fa-caret-down table-column-sort-icon float-right pt-1"></i>';
        }

        return "<th class='$classesForTh $sortActive' "
            . "data-order-by='$orderBy' "
            . "data-field='$fieldName'> "
            . "$label $sortIcon"
            . "</th>";

    }

    public static function listMessageGenerator(array $messages = [])
    {
        $list = '';
        foreach ($messages as $message) {
            $list .= "<li>". $message ."</li>";
        }

        return $list;
    }

    public static function getDateTimeFormat($datetime, $type = 'date')
    {
        $locale = App::getLocale();
        $time = Carbon::parse($datetime);

        if ($type == 'export') {

            return $time->format('Y/m/d');
        }

        if ($locale == 'ja') {
            $time = Carbon::parse($datetime);

            if ($type == 'date') {

                return $time->locale($locale)->isoFormat('YYYY 年 MMMM Do');
            }

            return $time->locale($locale)->isoFormat('YYYY 年 MMMM Do h時mm分 a');
        }

        return $time->toDateString();
    }

    public static function getFirstLetter($str)
    {
        return implode('', array_map(function($v) { return $v[0]; },array_filter(array_map('trim',explode(' ', $str)))));
    }

    public static function convert_vi_to_en($str)
    {
        setlocale(LC_ALL, "en_US.utf8");
        return iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
    }

    public static function convertHideString($str) {
        $len = strlen($str);
        return $len > 0 ? str_repeat('*', $len) : null;
    }
}
