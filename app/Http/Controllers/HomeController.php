<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function home()
    {
        $output = "
        <h1>Welcome to Interview Task</h1>

        <h2>User Guide</h2>
        
        <div>
            This API will help you to calculate number of days, weeks and weekdays between 2 given datetime parameters.
        </div>

        <div>
            <p>
                Available URLs/Commands are as follow:
            </p>

            <p>
                http://localhost:8000/api/<span style='color: blue;'>{parameter1}</span>/<span style='color: green;'>{parameter2}</span>/<span style='color: green;'>{parameter3}</span>/<span style='color: red;'>{parameter4}</span><br/>
            </p>

            <p>
                parameter1 could be any of the following terms:
            </p>

            <p>
                <span style='color: blue;'>numberOfDays</span>: to claculate number of days</br>
                <span style='color: blue;'>numberOfWeekdays</span>: to claculate number of week days</br>
                <span style='color: blue;'>numberOfWeeks</span>: to calculate number of weeks</br>
            </p>

            <p>
                <span style='color: green;'>parameter2</span> and <span style='color: green;'>parameter3</span> should be replaced with any datetime string in the following accepted formats:
            </p>

            <p>
                Y-m-d <br/>
                Y-m-d H:i:s <br/>
                Y-m-d H:i:s O <br/>
                Y-m-d H:i:sO <br/>
                Y-m-d H:i:s P <br/>
                Y-m-d H:i:sP<br/>
                Y-m-d H:i:s T<br/>
                Y-m-d H:i:sT<br/>
                Y-m-d H:i<br/>
                Y-m-d H:i O<br/>
                Y-m-d H:iO<br/>
                Y-m-d H:i P<br/>
                Y-m-d H:iP<br/>
                Y-m-d H:i T<br/>
                Y-m-d H:iT<br/>
                Y-m-d H<br/>
                Y-m-d H O<br/>
                Y-m-d HO<br/>
                Y-m-d H P<br/>
                Y-m-d HP<br/>
                Y-m-d H T<br/>
                Y-m-d HT<br/>
                d-m-Y<br/>
                d-m-Y H:i:s<br/>
                d-m-Y H:i:s O<br/>
                d-m-Y H:i:sO<br/>
                d-m-Y H:i:s P<br/>
                d-m-Y H:i:sP<br/>
                d-m-Y H:i:s T<br/>
                d-m-Y H:i:sT<br/>
                d-m-Y H:i<br/>
                d-m-Y H:i O<br/>
                d-m-Y H:iO<br/>
                d-m-Y H:i P<br/>
                d-m-Y H:iP<br/>
                d-m-Y H:i T<br/>
                d-m-Y H:iT<br/>
                d-m-Y H<br/>
                d-m-Y H O<br/>
                d-m-Y HO<br/>
                d-m-Y H P<br/>
                d-m-Y HP<br/>
                d-m-Y H T<br/>
                d-m-Y HT<br/>
            </p>

            <p>
                <span style='color: red;'>parameter4</span> is optional and can be included or ignored. <span style='color: red;'>parameter4</span> if included can have any of the following values:
            </p>

            <p>
                <span style='color: red;'>second</span>: will calculate the difference in seconds<br/>
                <span style='color: red;'>minute</span>: will calculate the difference in minutes<br/>
                <span style='color: red;'>hour</span>: will calculate the difference in hours<br/>
                <span style='color: red;'>year</span>: will calculate the difference in years<br/>
            </p>

            <p>
                I hope you enjoy using my little API.
            </p>
        </div>";

        return response($output);
    }
}