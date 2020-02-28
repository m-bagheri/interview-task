<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateTimeController extends Controller
{
    
    private $acceptableTypes = [
        'second',
        'minute',
        'hour',
        'year',
    ];

    /**
     * numberOfDays Controller
     *
     * @param string $first_datetime datetime parameter
     * @param string $second_datetime datetime parameter
     * @param string $type (second, minute, hour, year or NULL)
     *
     * @return json string
     */
    public function numberOfDays($first_datetime, $second_datetime, $type = NULL)
    {
        $first_datetime_object = $this->convertStringToDateTime($first_datetime);
        $second_datetime_object = $this->convertStringToDateTime($second_datetime);

        $diff = $first_datetime_object->diff($second_datetime_object);
        $numberOfDays = $diff->format("%a");

        $output = [
            'numberOfDays' => $numberOfDays
        ];

        if(in_array($type, $this->acceptableTypes)) {
            $value = 0;
            switch ($type) {
                case 'second':
                    $value = ($numberOfDays * 24 * 60 * 60) + ($diff->h * 60 * 60) + ($diff->m * 60) + ($diff->s);
                    break;
                case 'minute':
                    $value = ($numberOfDays * 24 * 60) + ($diff->h * 60) + ($diff->m);
                    break;
                case 'hour':
                    $value = ($numberOfDays * 24) + ($diff->h);
                    break;
                case 'year':
                    $value = $diff->y;
                    break;
            }
            $output['daysIn'.ucfirst($type)] = $value;
        }
        return response()->json($output, 200);
    }

    /**
     * numberOfWeekdays Controller
     *
     * @param string $first_datetime datetime parameter
     * @param string $second_datetime datetime parameter
     * @param string $type (second, minute, hour, year or NULL)
     *
     * @return json string
     */
    public function numberOfWeekdays($first_datetime, $second_datetime, $type = NULL)
    {
        $first_datetime_object = $this->convertStringToDateTime($first_datetime);
        $second_datetime_object = $this->convertStringToDateTime($second_datetime);

        // if first datetime parameter is after second one then swap them
        if($first_datetime_object > $second_datetime_object) {
            $temp_datetime_object = clone $second_datetime_object;
            $second_datetime_object = clone $first_datetime_object;
            $first_datetime_object = clone $temp_datetime_object;
            unset($temp_datetime_object);
        }

        $workingDays = [1, 2, 3, 4, 5];
        $weekendDays = [6, 7];
        $numberOfWeekdays = [
            'WeekDays' => [
                'Saturday' => 0,
                'Sunday' => 0,
                'Monday' => 0,
                'Tuesday' => 0,
                'Wednesday' => 0,
                'Thursday' => 0,
                'Friday' => 0,
            ],
            'WorkingDays' => 0,
            'WeekendDays' => 0,
        ];

        $interval = new \DateInterval('P1D');
        $periods = new \DatePeriod($first_datetime_object, $interval, $second_datetime_object);

        foreach ($periods AS $period) :
            $numberOfWeekdays['WeekDays'][$period->format('l')]++;
            if (in_array($period->format('N'), $workingDays)) $numberOfWeekdays['WorkingDays']++;
            if (in_array($period->format('N'), $weekendDays)) $numberOfWeekdays['WeekendDays']++;
        endforeach;
        
        return response()->json($numberOfWeekdays, 200);
    }

    /**
     * numberOfWeeks Controller
     *
     * @param string $first_datetime datetime parameter
     * @param string $second_datetime datetime parameter
     * @param string $type (second, minute, hour, year or NULL)
     *
     * @return json string
     */
    public function numberOfWeeks($first_datetime, $second_datetime, $type = NULL)
    {
        $first_datetime_object = $this->convertStringToDateTime($first_datetime);
        $second_datetime_object = $this->convertStringToDateTime($second_datetime);

        $diff = $first_datetime_object->diff($second_datetime_object);
        $numberOfDays = $diff->format("%a");
        $numberOfWeeks = floor($numberOfDays / 7);

        $output = ['numberOfWeeks' => $numberOfWeeks];

        if(in_array($type, $this->acceptableTypes)) {
            $value = 0;
            switch ($type) {
                case 'second':
                    $value = $numberOfWeeks * 7 * 24 * 60 * 60;
                    break;
                case 'minute':
                    $value = $numberOfWeeks * 7 * 24 * 60;
                    break;
                case 'hour':
                    $value = $numberOfWeeks * 7 * 24;
                    break;
                case 'year':
                    $value = floor($numberOfWeeks / 52);
                    break;
            }
            $output['weeksIn'.ucfirst($type)] = $value;
        }
        return response()->json($output, 200);
    }


    /**
     * convertStringToDateTime
     *
     * @param string $string datetime parameter
     *
     * @return DateTime object
     */
    private function convertStringToDateTime(string $string) {
        $string = urldecode($string);
        $datetime_possible_formats = [
            "Y-m-d",
            "Y-m-d H:i:s",
            "Y-m-d H:i:s O",
            "Y-m-d H:i:sO",
            "Y-m-d H:i:s P",
            "Y-m-d H:i:sP",
            "Y-m-d H:i:s T",
            "Y-m-d H:i:sT",
            "Y-m-d H:i",
            "Y-m-d H:i O",
            "Y-m-d H:iO",
            "Y-m-d H:i P",
            "Y-m-d H:iP",
            "Y-m-d H:i T",
            "Y-m-d H:iT",
            "Y-m-d H",
            "Y-m-d H O",
            "Y-m-d HO",
            "Y-m-d H P",
            "Y-m-d HP",
            "Y-m-d H T",
            "Y-m-d HT",
            "d-m-Y",
            "d-m-Y H:i:s",
            "d-m-Y H:i:s O",
            "d-m-Y H:i:sO",
            "d-m-Y H:i:s P",
            "d-m-Y H:i:sP",
            "d-m-Y H:i:s T",
            "d-m-Y H:i:sT",
            "d-m-Y H:i",
            "d-m-Y H:i O",
            "d-m-Y H:iO",
            "d-m-Y H:i P",
            "d-m-Y H:iP",
            "d-m-Y H:i T",
            "d-m-Y H:iT",
            "d-m-Y H",
            "d-m-Y H O",
            "d-m-Y HO",
            "d-m-Y H P",
            "d-m-Y HP",
            "d-m-Y H T",
            "d-m-Y HT",
        ];

        foreach($datetime_possible_formats AS $format):

            if(\DateTime::CreateFromFormat($format, $string))
                return \DateTime::CreateFromFormat($format, $string);

        endforeach;
    }
}