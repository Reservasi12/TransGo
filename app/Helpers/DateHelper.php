<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * Format a date for display.
     *
     * @param string|\DateTime $date
     * @param string $format
     * @return string
     */
    public static function formatDate($date, string $format = 'd M Y'): string
    {
        return Carbon::parse($date)->format($format);
    }

    /**
     * Format a datetime for display.
     *
     * @param string|\DateTime $datetime
     * @param string $format
     * @return string
     */
    public static function formatDateTime($datetime, string $format = 'd M Y H:i'): string
    {
        return Carbon::parse($datetime)->format($format);
    }

    /**
     * Calculate the difference between two dates in days.
     *
     * @param string|\DateTime $startDate
     * @param string|\DateTime $endDate
     * @return int
     */
    public static function daysDifference($startDate, $endDate): int
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        return $start->diffInDays($end);
    }

    /**
     * Check if a date is in the future.
     *
     * @param string|\DateTime $date
     * @return bool
     */
    public static function isFutureDate($date): bool
    {
        return Carbon::parse($date)->isFuture();
    }

    /**
     * Check if a date is in the past.
     *
     * @param string|\DateTime $date
     * @return bool
     */
    public static function isPastDate($date): bool
    {
        return Carbon::parse($date)->isPast();
    }

    /**
     * Check if a date is today.
     *
     * @param string|\DateTime $date
     * @return bool
     */
    public static function isToday($date): bool
    {
        return Carbon::parse($date)->isToday();
    }

    /**
     * Get the next business day (excluding weekends).
     *
     * @param string|\DateTime $date
     * @return string
     */
    public static function getNextBusinessDay($date): string
    {
        $date = Carbon::parse($date)->addDay();

        while ($date->isWeekend()) {
            $date->addDay();
        }

        return $date->format('Y-m-d');
    }

    /**
     * Format time for display.
     *
     * @param string|\DateTime $time
     * @param string $format
     * @return string
     */
    public static function formatTime($time, string $format = 'H:i'): string
    {
        return Carbon::parse($time)->format($format);
    }
}
