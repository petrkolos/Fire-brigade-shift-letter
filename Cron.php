<?php
/*
Letter of fire-brigade shift in Czech Republic for zivyobraz.eu API
Recommended CRON launch is at midnight.



MIT License
Copyright (c) 2024 3Dpetr_kolos

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/


//Import url WIth key - like = http://in.zivyobraz.eu/?import_key=SeCrEtApIkEy
$importURL = 'http://in.zivyobraz.eu/?import_key=SeCrEtApIkEy';

$today = new DateTime();
$shift = get_letter($today->format('d.m.Y'));

if(!empty($shift)){
    //GET zivyobraz API with parameters
    file_get_contents($importURL.'&fireBrigadeShift='.$shift);
    }


function get_letter($date_string) {
    $date = new DateTime($date_string);
  
    $base_date = new DateTime('2023-01-01'); //Date of shift A
    $interval = $date->diff($base_date);
    $days_diff = $interval->days;
    $index = $days_diff % 3;
  
    // Array with leters
    $letters = ['B', 'C', 'A'];
  
    return $letters[$index];
  }

?>






















?>
