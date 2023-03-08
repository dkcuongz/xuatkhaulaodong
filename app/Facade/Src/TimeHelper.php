<?php

namespace App\Facade\Src;

use Carbon\Carbon;

class TimeHelper
{
    public static function getDateFormatYmd()
    {
        return 'Y-m-d';
    }

    public static function getDateFormatYmdHis()
    {
        return 'Y-m-d H:i:s';
    }

    public static function getDateFormatYmdHi()
    {
        return 'Y-m-d H:i';
    }

    public static function getDateFormatDB()
    {
        return 'Y-m-d';
    }

    public static function getDateFormatHis()
    {
        return 'H:i:s';
    }

    public static function calculateDays($fromDate, $toDate = '')
    {
        $fromDate = Carbon::parse($fromDate);
        $toDate = Carbon::parse($toDate);

        return $fromDate->diffInDays($toDate);
    }

    public static function calculateMinutes($fromTime, $toTime = '')
    {
        $fromTime = Carbon::parse($fromTime);
        $toTime = Carbon::parse($toTime);

        return $fromTime->diffInMinutes($toTime);
    }

    public static function getCurrentDateTime()
    {
        return Carbon::now();
    }

    public static function convertToTimeZone($format, $dateTime)
    {
        return Carbon::parse(date_create_from_format($format, $dateTime));
    }

    public static function convertToYmd($format, $dateTime)
    {
        return self::convertToTimeZone($format, $dateTime)
            ->format(self::getDateFormatYmd());
    }

    public static function convertToYmdHis($format, $dateTime)
    {
        return self::convertToTimeZone($format, $dateTime)
            ->format(self::getDateFormatYmdHis());
    }

    public static function convertDateToDB($date)
    {
        return Carbon::parse($date)->format(self::getDateFormatYmdHis());
    }

    public static function getStartMonth()
    {
        return Carbon::now()->startOfMonth()->format(self::getDateFormatYmd());
    }

    public static function getEndMonth()
    {
        return Carbon::now()->endOfMonth()->format(self::getDateFormatYmd());
    }

    public static function getStartOfDay()
    {
        return Carbon::now()->startOfDay();
    }

    public static function getEndOfDay()
    {
        return Carbon::now()->endOfMonth();
    }

    public static function convertTimeToDate($date)
    {
        return Carbon::parse($date)->format(self::getDateFormatYmd());
    }

    public static function convertDateTimeToUTC($date)
    {
        return Carbon::parse($date)->setTimezone('UTC')->format('Y-m-d\TH:i:s\Z');
    }

    public static function convertDateTimeProduct($date)
    {
        return empty($date) ? null : Carbon::parse($date)->format(self::getDateFormatYmdHi());
    }

    public static function convertDateTimeOrderErrorCSV()
    {
        return Carbon::now()->format(self::getDateFormatHis());
    }
}
