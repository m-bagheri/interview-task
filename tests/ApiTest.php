<?php

class ApiTest extends TestCase
{

    /**
     * A test to check status and structure of the returned result
     *
     * @return void
     */
    public function testNumberOfDays()
    {
        $this->get('/api/numberOfDays/01-01-2020/01-02-2020')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfDays'
                ]);

        $this->get('/api/numberOfDays/01-01-2020/01-02-2020/second')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfDays',
                    'daysInSecond'
                ]);

        $this->get('/api/numberOfDays/01-01-2020/01-02-2020/minute')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfDays',
                    'daysInMinute'
                ]);

        $this->get('/api/numberOfDays/01-01-2020/01-02-2020/hour')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfDays',
                    'daysInHour'
                ]);

        $this->get('/api/numberOfDays/01-01-2020/01-02-2020/year')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfDays',
                    'daysInYear'
                ]);
    }


    /**
     * A test to check status and structure of the returned result
     *
     * @return void
     */
    public function testNumberOfWeekdays()
    {
        $this->get('/api/numberOfWeekdays/01-01-2020/01-02-2020')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'WeekDays' => ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'WorkingDays',
                    'WeekendDays'
                ]);
    }

    /**
     * A test to check status and structure of the returned result
     *
     * @return void
     */
    public function testNumberOfWeeks()
    {
        $this->get('/api/numberOfWeeks/01-01-2020/01-02-2020')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfWeeks'
                ]);

        $this->get('/api/numberOfWeeks/01-01-2020/01-02-2020/second')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfWeeks',
                    'weeksInSecond'
                ]);

        $this->get('/api/numberOfWeeks/01-01-2020/01-02-2020/minute')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfWeeks',
                    'weeksInMinute'
                ]);

        $this->get('/api/numberOfWeeks/01-01-2020/01-02-2020/hour')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfWeeks',
                    'weeksInHour'
                ]);

        $this->get('/api/numberOfWeeks/01-01-2020/01-02-2020/year')
                ->seeStatusCode(200)
                ->seeJsonStructure([
                    'numberOfWeeks',
                    'weeksInYear'
                ]);
    }


}
