<?php

/*
 * This file is part of the Moodle Plugin CI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Copyright (c) 2018 Blackboard Inc. (http://www.blackboard.com)
 * License http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace MoodlePluginCI\PluginValidate\Version;

/**
 * Known Moodle branches and the version.php values.
 */
final class MoodleBranches
{
    /** @var array<int, float> Branch number => version of the x.0 release as listed on https://moodledev.io/general/releases, in release order */
    private const STARTS = [
        30  => 2015111600.00,
        31  => 2016052300.00,
        32  => 2016120500.00,
        33  => 2017051500.00,
        34  => 2017111300.00,
        35  => 2018051700.00,
        36  => 2018120300.00,
        37  => 2019052000.00,
        38  => 2019111800.00,
        39  => 2020061500.00,
        310 => 2020110900.00,
        311 => 2021051700.00,
        400 => 2022041900.00,
        401 => 2022112800.00,
        402 => 2023042400.00,
        403 => 2023100900.00,
        404 => 2024042200.00,
        405 => 2024100700.00,
        500 => 2025041400.00,
        501 => 2025100600.00,
        502 => 2026042000.00,
        503 => 2026100500.00,
    ];

    /**
     * Whether the branch number is in the catalogue.
     */
    public static function hasBranch(int $branch): bool
    {
        return array_key_exists($branch, self::STARTS);
    }

    /**
     * Start value of the next catalogued branch after the given one, or null if none or unknown.
     */
    public static function nextStartAfter(int $branch): ?float
    {
        $found = false;
        foreach (self::STARTS as $candidate => $start) {
            if ($found) {
                return $start;
            }
            $found = $candidate === $branch;
        }

        return null;
    }
}
