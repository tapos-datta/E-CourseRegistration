<?php
//'batchInfo','userInfo','processInfo','registeredCourseList'

    $semesterName=null;
    $dept_name=null;
    $sYear=null;
    $sSemester=null;

    $currentTheory=$DropAdTheory=$minorTheory=$dropAdList=array();
    $currentLab=$DropAdLab=$minorLab=$mainCourses=array();
    $currentTheoryCredit=$currentLabCredit=$minorTheoryCredit=0.0;
    $minorLabCredit=$DropAdTheoryCredit=$DropAdLabCredit=0.0;


    $admitSession=$batchInfo['ADMIT_SESSION'];

    foreach ($deptNameShort as $dept){
        $dept_name= $dept->DEPT_NAME_SHORT;
    }


    foreach ($registeredCourseList as $list){

        if($list->SEMESTER_NAME==$processInfo->SEMESTER_NAME && $list->TYPE=='THEORY' && $list->CATEGORY=='MAJOR'){
            array_push($currentTheory,$list->COURSE_CODE);
            array_push($currentTheory,$list->COURSE_CREDIT);
            array_push($mainCourses,$list->COURSE_CODE);
            array_push($mainCourses,$list->COURSE_CREDIT);
            $currentTheoryCredit+=$list->COURSE_CREDIT;
        }

        else if($list->SEMESTER_NAME==$processInfo->SEMESTER_NAME && $list->TYPE=='LAB' && $list->CATEGORY=='MAJOR'){
            array_push($currentLab,$list->COURSE_CODE);
            array_push($currentLab,$list->COURSE_CREDIT);
            array_push($mainCourses,$list->COURSE_CODE);
            array_push($mainCourses,$list->COURSE_CREDIT);
            $currentLabCredit+=$list->COURSE_CREDIT;
        }
        if($list->SEMESTER_NAME==$processInfo->SEMESTER_NAME && $list->TYPE=='THEORY' && $list->CATEGORY=='NON-MAJOR'){
            array_push($minorTheory,$list->COURSE_CODE);
            array_push($minorTheory,$list->COURSE_CREDIT);
            array_push($mainCourses,$list->COURSE_CODE);
            array_push($mainCourses,$list->COURSE_CREDIT);
            $minorTheoryCredit+=$list->COURSE_CREDIT;
        }

        else if($list->SEMESTER_NAME==$processInfo->SEMESTER_NAME && $list->TYPE=='LAB' && $list->CATEGORY=='NON-MAJOR'){
            array_push($minorLab,$list->COURSE_CODE);
            array_push($minorLab,$list->COURSE_CREDIT);
            array_push($mainCourses,$list->COURSE_CODE);
            array_push($mainCourses,$list->COURSE_CREDIT);
            $minorLabCredit+=$list->COURSE_CREDIT;
        }
        else if($list->SEMESTER_NAME != $processInfo->SEMESTER_NAME && $list->TYPE=='THEORY'){
            array_push($DropAdTheory,$list->COURSE_CODE);
            array_push($DropAdTheory,$list->COURSE_CREDIT);
            array_push($dropAdList,$list->COURSE_CODE);
            array_push($dropAdList,$list->COURSE_CREDIT);
            $DropAdTheoryCredit+=$list->COURSE_CREDIT;

        }
        else if($list->SEMESTER_NAME != $processInfo->SEMESTER_NAME && $list->TYPE=='LAB'){
            array_push($DropAdLab,$list->COURSE_CODE);
            array_push($DropAdLab,$list->COURSE_CREDIT);
            array_push($dropAdList,$list->COURSE_CODE);
            array_push($dropAdList,$list->COURSE_CREDIT);
            $DropAdLabCredit+=$list->COURSE_CREDIT;

        }
    }

    if($processInfo->SEMESTER_NAME==1){
        $semesterName='1/1';
        $sYear='1st';
        $sSemester='1st';
    }
    if($processInfo->SEMESTER_NAME==2){
        $semesterName='1/2';
        $sYear='1st';
        $sSemester='2nd';
    }
    if($processInfo->SEMESTER_NAME==3){
        $semesterName='2/1';
        $sYear='2nd';
        $sSemester='1st';
    }
    if($processInfo->SEMESTER_NAME==4){
        $semesterName='2/2';
        $sYear='2nd';
        $sSemester='2nd';
    }
    if($processInfo->SEMESTER_NAME==5){
        $semesterName='3/1';
        $sYear='3rd';
        $sSemester='1st';
    }
    if($processInfo->SEMESTER_NAME==6){
        $semesterName='3/2';
        $sYear='3rd';
        $sSemester='2nd';
    }
    if($processInfo->SEMESTER_NAME==7){
        $semesterName='4/1';
        $sYear='4th';
        $sSemester='1st';
    }if($processInfo->SEMESTER_NAME==8){
        $semesterName='4/2';
        $sYear='4th';
        $sSemester='2nd';
    }


?>
        <!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('CSS/Stylesheet.css') }}" media="print">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('CSS/registrationScreen.css') }}" media="screen">
    <link href="{{URL::to('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

</head>
<body>
<div class="row displayOff">

    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div  class="logo" style="margin-top: 3.5%">

            <img src="{{ URL::to('images/sust.png') }}" alt="" style="width:2.5em;height:2.5em">
        </div>
        <div align="center" class="heading" style="float: left; margin-left: -3%;">
            <h2 style="font-size: 1.625em"> শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়, সিলেট </h2>

            <table align="center" cellspacing="0" style="" >
                <tbody>
                <tr>

                    <td style="width:7.813em">রেজিস্ট্রেশন নম্বর</td>
                    <td style="width:1.563em;">  {{$processInfo->REG_NO}}</td>

                </tr>
                </tbody>
            </table>
            <p align="center" style="white-space: pre"> {{$admitSession}} - {{$admitSession+1}}  শিক্ষাবর্ষ  {{$semesterName}} সেমিস্টার পরীক্ষা- {{$processInfo->EXAM_YEAR}} </p>
            <p  align="center" style="white-space: pre;line-height: 20%">      কোর্স ও পরীক্ষা রেজিস্ট্রেশনের আবেদন</p>

        </div>
        <div class="photoBox" style="float: left; margin-left: 2.5%; margin-top: 3.5%;">
            <div style="width: 7em; height: 7em; border: 1px solid black;">

            </div>
        </div>

    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>


<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div style="float: left">
            <p>বরাবর</p>
            <p>পরীক্ষা নিয়ন্ত্রক</p>
            <p>শাবিপ্রবি, সিলেট ।</p>
        </div>
        <div  class="col-sm-4" style="width: 50%;line-height: 50%;float: left;margin-top: 1%;margin-left: 33%">
            <div  class="table_bank">

            </div>
        </div>

    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>

</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <p style="clear: both;padding: 0em .10em 0em 0em; ">জনাব <br>আমি  {{$processInfo->NAME}}  বিভাগ {{$dept_name}} শিক্ষাবর্ষ {{$admitSession}} - {{$admitSession+1}}  বর্ষ  ({{$sYear}})   সেমিস্টার ( {{$sSemester}} ) @if($processInfo->EXAM_NAME==0) স্নাতক @elseif($processInfo->EXAM_NAME==1) স্নাতকোত্তর @endif পরীক্ষায় অংশ গ্রহণের জন্য আপনার
            কাছে আবেদন করছি। এই আবেদনপত্রে দেয়া তথ্য যদি অসত্য প্রমাণিত হয়; বা যদি দেখা যায় যে আমি পরীক্ষা সংক্রান্ত আইন কানুনের পরিপন্থী কোন কাজ করেছি , তবে আমার এই আবেদন বাতিল হয়ে যাবে।  আমি আরও অঙ্গীকার করছি যে, আমার এই পরীক্ষায় অংশগ্রহণে বৈধতা নিয়ে ভবিষ্যতে যদি কোন প্রশ্ন
            ওঠে তবে বিশ্ববিদ্যালয়ের যে কোনো কর্তৃপক্ষ বা সিন্ডিকেট দ্বারা  ক্ষমতা দেয়া যে কোন কর্মকর্তার সিদ্ধান্ত চূড়ান্ত বলে মেনে নেব।   </p>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
    <div class="col-sm-10 Col-sm-8" >
        <div class="col-sm-7 Col-sm-7">
            <p>তারিখ :............../................/............... </p>
        </div>
        <div class="col-sm-6">
            <p>স্বাক্ষর: </p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
    </div>
</div>

<div class="row displayOff" style="clear:both;">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div align="center" class="col-sm-10 Col-sm-8" >
        <p> যে সকল বিষয়ে রেজিস্ট্রেশন করে পরীক্ষা দেবে তার কোর্সনম্বর ও ক্রেডিট :</p>
    </div>
    <div class="col-sm-1 Col-sm-2" >

    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-4 Col-sm-4">

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 16.1em; height: 1.5em; text-align: center">মেজর কোর্স</td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 7.9em; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 7.95em ; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody align="center">
                @for($i=1,$j=0,$k=0;$i<10;$i++,$j+=2,$k+=2)
                    <tr>
                        <td align="center" style="width: 4.45em; height: 1.5em;">@if($j<sizeof($currentTheory)){{$currentTheory[$j]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">@if($j+1<sizeof($currentTheory)){{$currentTheory[$j+1]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 4.43em; height: 1.5em;">@if($k<sizeof($currentLab)){{$currentLab[$k]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">@if($k+1<sizeof($currentLab)){{$currentLab[$k+1]}}@else &nbsp; @endif</td>
                    </tr>
                </tbody>
                @endfor
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: left"> মোট =    {{$currentTheoryCredit}} </td>
                    <td style="text-align: left;width: 7.9em; height: 1.5em;">মোট =    {{$currentLabCredit}}</td>
                </tr>
                </tbody>
            </table>


        </div>
        <div class="col-sm-4 Col-sm-4">
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 16.1em; height: 1.5em; text-align: center">নন মেজর কোর্স</td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 7.9em; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                @for($i=1,$j=0,$k=0;$i<10;$i++,$j+=2,$k+=2)
                    <tr>
                        <td align="center" style="width: 4.45em; height: 1.5em;">@if($j<sizeof($minorTheory)){{$minorTheory[$j]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">@if($j+1<sizeof($minorTheory)){{$minorTheory[$j+1]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 4.43em; height: 1.5em;">@if($k<sizeof($minorLab)){{$minorLab[$k]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">&nbsp;@if($k+1<sizeof($minorLab)){{$minorLab[$k+1]}}@else &nbsp; @endif</td>
                    </tr>
                </tbody>
                @endfor
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: left">মোট =   {{$minorTheoryCredit}}</td>
                    <td style="text-align: left;width: 7.9em; height: 1.5em;">মোট =   {{$minorLabCredit}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-4 Col-sm-4">
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 16.1em; height: 1.5em; text-align: center">ড্রপ কোর্স / আডভান্স কোর্স </td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 7.9em; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                @for($i=1,$j=0,$k=0;$i<10;$i++,$j+=2,$k+=2)
                    <tr>
                        <td align="center" style="width: 4.45em; height: 1.5em;">@if($j<sizeof($DropAdTheory)){{$DropAdTheory[$j]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">&nbsp;@if($j+1<sizeof($DropAdTheory)){{$DropAdTheory[$j+1]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 4.43em; height: 1.5em;">@if($k<sizeof($DropAdLab)){{$DropAdLab[$k]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">@if($k+1<sizeof($DropAdLab)){{$DropAdLab[$k+1]}}@else &nbsp; @endif</td>
                    </tr>
                </tbody>
                @endfor
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: left">মোট =  {{$DropAdTheoryCredit}}</td>
                    <td style="text-align: left;width: 7.9em; height: 1.5em;">মোট =  {{$DropAdLabCredit}}</td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
</div>

<div  class="row displayOff" style="clear: both;">
    <div class="col-sm-1 Col-sm-2" >
        <p></p>
    </div>
    <div  class="col-sm-10 Col-sm-8" >
        <div align="center" >
            <p>সর্বমোট ক্রেডিট  = {{$currentLabCredit + $currentTheoryCredit + $minorLabCredit + $minorTheoryCredit + $DropAdTheoryCredit + $DropAdLabCredit}} </p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>

</div>


<div class="row displayOff">
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <p> ( প্রয়োজনীয় ফি সহ এ আবেদনপত্র শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়ের পরীক্ষা নিয়ন্ত্রকের কার্যালয়ে
            নির্দিষ্ট তারিখের ভিতরে পৌঁছাতে হবে।  এ আবেদনপত্র যদি যথাযথভাবে পূরণ করা না হয় , পরীক্ষার্থীদের দ্বারা
            স্বাক্ষরিত না হয় সংশ্লিষ্ট বিভাগীয় প্রধান এবং যেখানে প্রযোজ্য সেখানে হল প্রাধ্যক্ষের দ্বারা সুপারিশকৃত না হয়
            তবে আবেদনপত্রটি সরাসরি বাতিল হয়ে যাবে)
        </p>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>
<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8" >

        <div class="col-sm-6 Col-sm-6">

        </div>

    </div>
    <div class="col-sm-1 Col-sm-2" >
        <p></p>
    </div>
</div>


<div class="row displayOff" style="clear: both;">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-5 Col-sm-5">
            <p>যে সকল বিষয়ে রেজিস্ট্রেশন করে পরীক্ষা দেবে তার কোর্স নম্বর ও ক্রেডিট : </p>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 10em; height: 1.5em; text-align: center">মূল কোর্স</td>
                    <td style="text-align: center;width: 10em; height: 1.5em;">ড্রপ / এডভান্স</td>
                </tr>
                </tbody>
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                @for($i=1,$j=0,$k=0;$i<=11;$i++,$j+=2,$k+=2)
                    <tr>
                        <td align="center" style="width: 6.7em; height: 1.5em;">@if($j<sizeof($mainCourses)){{$mainCourses[$j]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.1em; height: 1.5em;">@if($j+1<sizeof($mainCourses)){{$mainCourses[$j+1]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 6.6em; height: 1.5em;">@if($k<sizeof($dropAdList)){{$dropAdList[$k]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.1em; height: 1.5em">@if($k+1<sizeof($dropAdList)){{$dropAdList[$k+1]}}@else &nbsp; @endif</td>
                    </tr>
                @endfor
                <tr>
                    <td style="width: 6.7em; height: 1.5em;">মোট ক্রেডিট</td>
                    <td style="width: 3.1em; height: 1.5em;">  {{ $currentLabCredit + $currentTheoryCredit + $minorLabCredit + $minorTheoryCredit}} </td>
                    <td style="width: 6.6em; height: 1.5em;">মোট ক্রেডিট</td>
                    <td style="width: 3.1em; height: 1.5em"> {{ $DropAdTheoryCredit + $DropAdLabCredit}}</td>
                </tr>
                </tbody>
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 10em; height: 1.5em; text-align: center">সর্বমোট ক্রেডিট</td>
                    <td style="text-align: center;width: 10em; height: 1.5em;">{{ $currentLabCredit + $currentTheoryCredit + $minorLabCredit + $minorTheoryCredit + $DropAdTheoryCredit + $DropAdLabCredit}}</td>
                </tr>
                </tbody>
            </table>


        </div>
        <div class="col-sm-6 Col-sm-6" style="margin-left: 4.8%">
            <div class="col-sm-4 Col-sm-4">
                <br/>
                <br/>
               <p>স্নাতক  </p>
                <p>স্নাতকোত্তর</p>
                <p>অন্যান্য</p>
                <br/>
                <p> শিক্ষাবর্ষ : {{ $admitSession }}-{{ $admitSession+1 }}&nbsp;</p>
                <p> বর্ষ : {{ $sYear }}&nbsp;</p>
                <p> সেমিস্টার :&nbsp;{{ $sSemester }}</p>
                <p> বিভাগ : {{ $dept_name}}</p>
            </div>
            <div class="col-sm-4 Col-sm-4">
                <p></p>
            </div>
            <div class="col-sm-4 Col-sm-4">
                <div  style="width: 10em; height: 10em; border: 1px solid black ; margin-top: 25%;">

                </div>
            </div>

            <table cellspacing="0" style=" clear:both;" >
                <tbody>
                <tr>

                    <td>রেজিস্ট্রেশন নম্বর :</td>
                    <td>{{$processInfo->REG_NO}}</td>
                </tr>
                </tbody>
            </table>
            <br>
            <p>নাম : {{  strtoupper($processInfo->NAME)}}
                </p>

        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
</div>
<div class="row displayOff" style="clear:both">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-7 Col-sm-7">
            <p style="margin-left: 10%;margin-top: 5%">পরীক্ষার্থীর স্বাক্ষর :</p>
        </div>
        <div class="col-sm-5 Col-sm-5">
            <p>পরীক্ষা নিয়ন্ত্রকের স্বাক্ষর :</p>
            <p>তারিখ</p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" style="clear:both">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <p>বি.দ্র.</p>
        <p>সেমিস্টার অর্ডিন্যান্স মোতাবেক ১০০ লেভেলের কোর্স অসমাপ্ত রেখে ৩০০ লেভেলের কোর্স নিতে পারবে না বা ২০০ লেভেলের কোর্স অসমাপ্ত রেখে ৪০০ লেভেলের কোর্স নিতে পারবে না</p>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>
<br>
<div class="row displayOff" style="clear:both">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <h3 align="center"><u>বিভাগের কপি</u></h3>

    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>
<div class="row displayOff" style="clear:both">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-6 Col-sm-6" >
            <table cellspacing="0" style="margin-top: 5%">
                <tbody>
                <tr>

                    <td >রেজিস্ট্রেশন নম্বর</td>
                    <td>{{ $processInfo->REG_NO}}</td>

                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-2 Col-sm-2">
            <p></p>
        </div>
        <div class="col-sm-3 Col-sm-3">
            <p> বর্ষ / সেমিস্টার : {{ $semesterName }}</p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>
<div class="row displayOff" style="clear:both">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-6 Col-sm-6" >
            <p>নাম (ইংরেজি বড় বর্ণে) : {{ strtoupper($processInfo->NAME) }}</p>
        </div>
        <div class="col-sm-2 Col-sm-2">
            <p></p>
        </div>
        <div class="col-sm-3 Col-sm-3">
            <p> বিভাগ : {{  $dept_name}}</p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" style="clear:both;">
    <div class="col-sm-1 Col-sm-2" >
        <p></p>
    </div>
    <div align="center" class="col-sm-10 Col-sm-8" >
        <p> যে সকল বিষয়ে রেজিস্ট্রেশন করে পরীক্ষা দেবে তার কোর্সনম্বর ও ক্রেডিট :</p>
    </div>
    <div class="col-sm-1 Col-sm-2" >

    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-4 Col-sm-4">

            {{--<div class="rTable col-sm-12">--}}
                {{--<div class="rTableBody col-sm-12">--}}
                    {{--<div class="rTableRow col-sm-12">--}}
                        {{--<div align="center" class="rTableHead">--}}
                            {{--<strong>মেজর কোর্স</strong>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="rTableRow col-sm-12">--}}
                        {{--<div align="center" class="rTableHead col-sm-6" >--}}
                            {{--<strong>মেজর কোর্স</strong>--}}
                        {{--</div>--}}
                        {{--<div align="center" class="rTableHead col-sm-6" >--}}
                            {{--<strong>মেজর কোর্স</strong>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 16.1em; height: 1.5em; text-align: center">মেজর কোর্স</td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 7.9em; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 7.95em ; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody align="center">
                @for($i=1,$j=0,$k=0;$i<10;$i++,$j+=2,$k+=2)
                    <tr >
                        <td align="center" style="width: 4.45em; height: 1.5em;">@if($j<sizeof($currentTheory)){{$currentTheory[$j]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">@if($j+1<sizeof($currentTheory)){{$currentTheory[$j+1]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 4.43em; height: 1.5em;">@if($k<sizeof($currentLab)){{$currentLab[$k]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">@if($k+1<sizeof($currentLab)){{$currentLab[$k+1]}}@else &nbsp; @endif</td>
                    </tr>
                </tbody>
                @endfor
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: left"> মোট =    {{$currentTheoryCredit}} </td>
                    <td style="text-align: left;width: 7.9em; height: 1.5em;">মোট =    {{$currentLabCredit}}</td>
                </tr>
                </tbody>
            </table>


        </div>
        <div class="col-sm-4 Col-sm-4 ">
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 16.1em; height: 1.5em; text-align: center">নন মেজর কোর্স</td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 7.9em; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                @for($i=1,$j=0,$k=0;$i<10;$i++,$j+=2,$k+=2)
                    <tr>
                        <td align="center" style="width: 4.45em; height: 1.5em;">@if($j<sizeof($minorTheory)){{$minorTheory[$j]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">@if($j+1<sizeof($minorTheory)){{$minorTheory[$j+1]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 4.43em; height: 1.5em;">@if($k<sizeof($minorLab)){{$minorLab[$k]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">&nbsp;@if($k+1<sizeof($minorLab)){{$minorLab[$k+1]}}@else &nbsp; @endif</td>
                    </tr>
                </tbody>
                @endfor
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: left">মোট =   {{$minorTheoryCredit}}</td>
                    <td style="text-align: left;width: 7.9em; height: 1.5em;">মোট =   {{$minorLabCredit}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-4 Col-sm-4">
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 16.1em; height: 1.5em; text-align: center">ড্রপ কোর্স / আডভান্স কোর্স </td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 7.9em; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                @for($i=1,$j=0,$k=0;$i<10;$i++,$j+=2,$k+=2)
                    <tr>
                        <td align="center" style="width: 4.45em; height: 1.5em;">@if($j<sizeof($DropAdTheory)){{$DropAdTheory[$j]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">&nbsp;@if($j+1<sizeof($DropAdTheory)){{$DropAdTheory[$j+1]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 4.43em; height: 1.5em;">@if($k<sizeof($DropAdLab)){{$DropAdLab[$k]}}@else &nbsp; @endif</td>
                        <td align="center" style="width: 3.3em; height: 1.5em;">@if($k+1<sizeof($DropAdLab)){{$DropAdLab[$k+1]}}@else &nbsp; @endif</td>
                    </tr>
                </tbody>
                @endfor
            </table>
            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 8em; height: 1.5em; text-align: left">মোট =  {{$DropAdTheoryCredit}}</td>
                    <td style="text-align: left;width: 7.9em; height: 1.5em;">মোট =  {{$DropAdLabCredit}}</td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
</div>


<div  class="row displayOff" style="clear: both;">
    <div class="col-sm-1 Col-sm-2" >
        <p></p>
    </div>
    <div  class="col-sm-10 Col-sm-8" >
        <div align="center" >
            <p>সর্বমোট ক্রেডিট  = {{$currentLabCredit + $currentTheoryCredit + $minorLabCredit + $minorTheoryCredit + $DropAdTheoryCredit + $DropAdLabCredit}} </p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>

</div>

<div class="row displayOff" style="clear:both">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-7 Col-sm-7">
            <p >পরীক্ষার্থীর স্বাক্ষর :</p>
            <p>তারিখ</p>
        </div>
        <div class="col-sm-5 Col-sm-5">
            <p>পরীক্ষা নিয়ন্ত্রকের স্বাক্ষর :</p>
            <p>তারিখ</p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" style="page-break-before: always;">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8" style="margin-top: 5%">
        {{--<p> পরীক্ষার্থীর নাম  (বাংলায়) : </p>--}}
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>
<div class="row displayOff" style="page-break-before: always;">
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <table cellspacing="0" style="margin-top: 1%">
            <tbody>
            <tr>

                <td style="width:7.813em;">  পরীক্ষার্থীর নাম :</td>
                <td > {{ strtoupper($processInfo->NAME)}}</td>

            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <table cellspacing="0" style="margin-top: 1.5%">
            <tbody>
            <tr>
                <td> পিতার নাম :   </td>
                <td >   {{    strtoupper($userInfo->FATHER_NAME)}}</td>

            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <table cellspacing="0" style="margin-top: 1.5%">
            <tbody>
            <tr>
                <td >মাতার নাম :   </td>
                <td>{{  strtoupper($userInfo->MOTHER_NAME)}}</td>

            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <p> জন্ম তারিখ :  {{  date("d-m-Y", strtotime($userInfo->DOB)) }} </p>
    </div>
    <div class="col-sm-1">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-9 Col-sm-8">
            <p>বর্তমান যোগাযোগের ঠিকানা : {{  $userInfo->ADDRESS }}</p>
        </div>
        <div class="col-sm-3 Col-sm-4">
            <p>মোবাইল নম্বর :   {{  $userInfo->PHONE_NUM }}</p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>
<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <p>স্থায়ী ঠিকানা :</p>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <p>আবাসিক পরীক্ষার্থীর ক্ষেত্রে হলের নাম :</p>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <p>আমি নিশ্চয়তা প্রদান করছি যে উল্লেখিত পরীক্ষার্থী হলের সকল নিয়ম কানুনের প্রতি শ্রদ্ধাশীল একজন
            নিয়মিত আবাসিক ছাত্র/ছাত্রী। তার কাছে কোনো পাওনা নেই।
            তাকে পরীক্ষা দেয়ার  অনুমতি দেয়ার জন্য সুপারিশ করছি। </p>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>


<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-8 Col-sm-8">
            <div style="width: 15em; height:6em; margin-left: 15%; border: 1px solid black;">
                <p align="center" style="margin-top: 17%">সিল </p>
            </div>
        </div>
        <div class="col-sm-4 Col-sm-4">
            <p>স্বাক্ষর :</p>
            <p style="margin-left: 25%">প্রাধ্যক্ষ </p>
            <p>তারিখ:</p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <p>আমি নিশ্চয়তা প্রদান করছি যে, উপরে উল্লেখিত ছাত্র/ছাত্রী সংশ্লিষ্ট
            সেমিস্টার পরীক্ষার জন্য বিশ্ববিদ্যালয় থেকে অনুমোদিত পাঠ্যক্রম
            এই প্রতিষ্ঠানে শেষ করেছে।  তার আচরণ এবং  নৈতিক চরিত্র ভালো
            , আমি তাকে পরীক্ষায় অংশগ্রহণের অনুমতি দেয়ার জন্য সুপারিশ করছি।</p>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-8 Col-sm-8">
            <div style="width: 15em; height:6em; margin-left: 15%; border: 1px solid black;">
                <p align="center" style="margin-top: 17%">সিল </p>
            </div>
        </div>
        <div class="col-sm-4 Col-sm-4">
            <p>স্বাক্ষর  :</p>
            <p style="margin-left: 25%">বিভাগীয় প্রধান </p>
            <p>তারিখ:</p>
        </div>
    </div>
    <div class="col-sm-1 Col-sm-2">
        <p> </p>
    </div>
</div>

<div class="row displayOff" >
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="col-sm-1 Col-sm-2">
        <p></p>
    </div>
    <div class="col-sm-10 Col-sm-8">
        <div class="col-sm-6 Col-sm-6" id="rules">
            <h6 align="center" >পরীক্ষা চলাকালীন নিচের কাজগুলো পরীক্ষা </h6>
            <h5 align="center" > সংক্রান্ত শাস্তিযোগ্য অপরাধ বলে বিবেচিত হবে </h5>
            <ol></ol>
            <p style="font-size: 70%">১ । পরীক্ষাকক্ষে ধূমপান করা। </p>
            <p style="font-size: 70%">২ । অন্যের উত্তরপত্র দেখে লিখা বা অন্যকে উত্তরপত্র দেখতে চেষ্টা করা বা অন্য পরীক্ষার্থীর সাথে কথা বলা বা কাউকে প্রশ্নের উত্তর সম্পর্কে ধারণা দেয়া। </p>
            <p style="font-size: 70%">৩ । উত্তরপত্রে আপত্তিকর কোন কিছু লিখা।</p>
            <p style="font-size: 70%">৪ । প্রবেশপত্র ব্যতিত যে কোন ধরণের লিখিত বা ছাপাকৃত কাগজপত্র বা বই (কোর্সটির সাথে সংশ্লিষ্ট দোষণীয় কাগজপত্র) সঙ্গে রাখা।</p>
            <p style="font-size: 70%">৫। অনুমতি বিহীন যন্ত্রপাতি( ক্যালকুলেটর ,মোবাইলে ,যে কোন ধরনের ডিজিটাল ক্যামেরা, ডিজিটাল ডায়েরি,ল্যাপটপ অর্থাৎ যা দ্বারা তথ্য সংগ্রহ করা সম্ভব এসব দোষণীয় যন্ত্রপাতি ) সঙ্গে রাখা  </p>
            <p style="font-size: 70%">৬। অন্যের দেখে লিখা বা অন্যকে দেখে লিখতে সাহায্য করা।  </p>
            <p style="font-size: 70%">৭। প্রবেশপত্রে  বা স্কেলে বা ক্যালকুলেটরের কভার বা শরীরের কোন অঙ্গে বা পরিধেয় বস্ত্রে লিখে  এনে তা থেকে বা ডেস্কে লিখা,দেয়ালে লিখা,কলমে লিপিবদ্ধ লিখা থেকে নকলের চেষ্টা করা  </p>
            <p style="font-size: 70%">৮। পরীক্ষা হলে  দায়িত্বপ্রাপ্ত পরিদর্শক,প্রধান পরিদর্শক,কর্মকর্তা,কর্মচারী কারো সাথে অসদাচরণ যেমন, পরিদর্শক,প্রধান পরিদর্শকের আদেশ ,উপদেশ অমান্য করা বা অযথা তর্কে লিপ্ত হওয়া,
                কর্মকর্তা/কমকারীদের সাথে দুর্ব্যবহার করা বা পরীক্ষা হলে যে কোন ধরণের গোলযোগ সৃষ্টি করা  </p>
            <p style="font-size: 70%">৯। ডেস্কে/দেয়ালে পূর্বে লিখা থাকলে পরিদর্শককে আগে অবহিত করতে হবে।    </p>
            <p style="font-size: 70%"> ১০। নকল  করা অবস্থায় ধরা পড়ার পর পরীক্ষার্থী পরিদর্শক বা প্রধান পরিদর্শককের সাথে বাক বিতণ্ডায় লিপ্ত হলে কিংবা পরিদর্শক
                বা প্রধান পরিদর্শককে হুমকি দিলে কিংবা পরিদর্শক বা প্রধান পরিদর্শককে লাঞ্চিত করতে উদ্যত হলে।  </p>
            <p style="font-size: 70%">১১। পরীক্ষাকক্ষে উত্তরপত্র বা আংশিক উত্তরপত্র নকলের জন্য হস্তান্তর করা।  </p>
            <p style="font-size: 70%">১২। পরীক্ষাকক্ষে উত্তরপত্র বা আংশিক উত্তরপত্র নকলের জন্য হস্তান্তর পূর্বক নকলে সহায়তা করা।   </p>
            <p style="font-size: 70%">১৩।  পরিদর্শক বা প্রধান পরিদর্শককে শারীরিকভাবে  লাঞ্চিত করা বা অস্ত্র বহন করা বা অস্ত্র ব্যবহার করে ভীতি দেখানো।</p>
            <p style="font-size: 70%"> ১৪। বাহিরে থেকে উত্তরপত্রে লিখে  আনা, পরীক্ষা কক্ষে ব্যবহৃত বা অব্যবহৃত উত্তরপত্র জমা না দিয়ে বাহিরে নিয়ে যাওয়া বা নিয়ে যাওয়ার চেষ্টা করা। </p>
            <p style="font-size: 70%"> ১৫।  বাথরুম,টয়লেটে পরীক্ষার কোর্স সংশ্লিষ্ট দোষণীয় কাগজপত্র রাখা।  </p>

        </div>
        <div class="col-sm-6 Col-sm-6">
            <h4 align="center" style="margin-top: 25%;margin-left: 10%">শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়,সিলেট</h4>
            <p><br><br><br><br></p>

            <img src="{{ URL::to('images/sust.png') }}" alt="" style="width:5.5em;height:5.5em;margin-left: 40%">

            <p><br><br><br></p>
            <h2 align="center">প্রবেশপত্র </h2>

        </div>
        <div class="col-sm-1 Col-sm-2">
            <p> </p>
        </div>
    </div>
</div>
<div class="row displayOff">
    <br/>
    <p></p>
</div>


<div align="center" class="row print_button position">
    <button class="fa fa-file-pdf-o button_design" onclick="myFunction()">  print form</button>
    <div>
        N:B: Before print file you must save this file as a pdf using <b>save</b> <b>as</b> <b>pdf</b> and margin <b>none</b>.For simplicity use <b>Google Chrome</b>
        browser.
    </div>
    <br/>
    <br/>
</div>

</body>
<Script>
    function myFunction(){
        window.print();
    }
</Script>
</html>

