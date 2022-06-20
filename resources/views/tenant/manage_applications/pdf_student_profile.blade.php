<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<header>
    <div>
        <h1>Hridoya Bangladesh</h1>
        {{-- <img src="{{ public_path('logo.png') }}" style="width: 100px; height: 100px"> --}}
    </div>
</header>
<footer>
    <style>
        .ft {
            border-top: 1px solid;
            margin-left: 90px;
            margin-right: 90px;
        }

    </style>
    <div class="ft">

    </div>
    Copyright &copy; <?php echo date('Y'); ?> | Shikkha Britti
</footer>


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>{{ $student_data->name }}</title>


    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-image: cross-fade('/design/logo.png');
            font: 16px Helvetica, Sans-Serif;
            line-height: 24px;
            /* background: url('/design/logo.png'); */
            margin-right: 5px;
            margin-left: 5px;
            margin-bottom: 100px;
            margin-top: 120px;
        }

        .clear {
            clear: both;
        }

        .page-wrap {
            width: 800px;
            margin: 40px auto 60px;
        }

        .pic {
            float: right;
            margin: -30px 0 0 0;
        }

        /* h1 {
            margin: 0 0 16px 0;
            padding: 0 0 16px 0;
            font-size: 42px;
            font-weight: bold;
            letter-spacing: -2px;
        }
            /* border-bottom: 1px solid #999; */
         */ 
         h1 {
            font-size: 40px;
            font-weight: 600;
            background-color: conic-gradient(#30dc00, #ea0505, #30dc00);
            background-clip: text;
            -webkit-background-clip: text;
            line-height: 1.5cm;

        }

        h2 {
            font-size: 15px;
            margin: 0 0 6px 0;
            position: relative;
            text-align: center;
            text-decoration: underline;
        }

        h3 {
            font-size: 13px;
            margin: 0 0 6px 0;
            position: relative;
            text-align: center;
            text-decoration: underline;
            font-weight: normal;
        }

        h2 span {
            position: absolute;
            bottom: 0;
            right: 0;
            font-style: italic;
            font-family: Georgia, Serif;
            font-size: 16px;
            color: #999;
            font-weight: normal;
        }

        p {
            font-size: 13px;
            margin: 0 0 2px 0;
            padding: 10px 0 0 0;
        }




        ul {
            font-size: 13px;
            margin: 0 0 0 0px;

        }

        .objective {
            width: 500px;
            float: left;
        }

        .objective p {
            font-family: Georgia, Serif;
            font-style: italic;
            color: #666;
        }

        dt {
            font-style: italic;
            font-weight: bold;
            font-size: 18px;
            text-align: right;
            padding: 0 26px 0 0;
            width: 150px;
            float: left;
            height: 100px;
            border-right: 1px solid #999;
        }


        b {
            font-size: 13px;
            margin: 0 0 0 100px;
            font-weight: normal;
        }

        dd {
            width: 700px;
            float: right;
            margin-top: 15px;
        }

        dd.clear {
            float: none;
            margin: 0;
            height: 15px;
        }

        .fn {
            /* margin-left: 50px; */
            padding-left: 60px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: white;
            color: black;
            text-align: center;
            line-height: 1.5cm;
        }

        .degree {
            padding: 0 0 0 42px;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: white;
            color: black;
            text-align: center;
            line-height: 1.5cm;

        }

        .degree {
            padding: 0 0 0 42px;
        }

    </style>
</head>

<body>

    <div style="margin: 0px auto 10px; ">

        {{-- <img src="{{$user_data->photo_url != null ? url('storage' . $user_data->photo_url) : asset('/assets/img/null/avatar.jpg') }}" alt="" class="pic" /> --}}
        <div class="contact-info" class="vcard">


            <!-- Microformats! -->

            <h2>Application Form for Financial Support to Continue Education</h2>

            <dl>
                <dd class="clear"></dd>


                <dd>
                    <p><strong>1. Applicant's name:</strong> {{ $student_data->name }}</p>
                    <p><strong>2. Phone number:</strong> {{ $student_data->phone }}</p>
                    <p><strong>3. Father's name:</strong> {{ $student_data->father_name }}</p>
                    <p><strong>4. Mother's name:</strong> {{ $student_data->mother_name }}</p>
                    <p><strong>5. Permanent address:</strong></p>
                    <div class="degree">
                        @if ($addresses_present->same_as_present == 1)
                            <ul><strong>Same as Present Address</strong></ul>
                        @else
                            <ul><strong>Division:</strong> {{ $addresses_permanent->division }}</ul>
                            <ul><strong>District:</strong> {{ $addresses_permanent->district }}</ul>
                            <ul><strong>Upazila:</strong> {{ $addresses_permanent->upazila }}</ul>
                            <ul><strong>Area:</strong> {{ $addresses_permanent->area }}</ul>
                        @endif
                    </div>

                    <p><strong>6. Current address:</strong></p>
                    <div class="degree">
                        <ul><strong>Division:</strong> {{ $addresses_present->division }}</ul>
                        <ul><strong>District:</strong> {{ $addresses_present->district }}</ul>
                        <ul><strong>Upazila:</strong> {{ $addresses_present->upazila }}</ul>
                        <ul><strong>Area:</strong> {{ $addresses_present->area }}</ul>
                    </div>

                    <p><strong>7. Education:</strong></p>
                    <div class="degree">
                        <ul><b><strong> Level:</strong> {{ $academic_data->level }}:</b></ul>
                        <ul><b><strong>i. Class/Degree:</strong> {{ $academic_data->class_degree }}</b></ul>
                        <ul><b><strong>ii. Semester:</strong> {{ $academic_data->semester }}</b></ul>
                        <ul><b><strong>iii. Marks/GPA/CGPA:</strong> {{ $academic_data->marks_cgpa }}</b></ul>
                        <ul><b><strong>iv. Class Position/ID:</strong> {{ $academic_data->position }}</b></ul>
                        <ul><b><strong>v. Institution Name:</strong> {{ $academic_data->institution }}</b></ul><br>
                    </div>


                    @if ($academic_data->ssc_gpa || $academic_data->ssc_year || $academic_data->hsc_gpa || $academic_data->hsc_year || $academic_data->bachelor_year || $academic_data->bachelor_cgpa)
                        @if ($academic_data->bachelor_year || $academic_data->bachelor_cgpa)
                            <div class="degree">
                                <ul><strong> Diploma/Undergrade</strong></ul>
                                <ul><b><strong>i. Institution Name:</strong>
                                        {{ $academic_data->bachelor_institution }}</b></ul>
                                <ul><b><strong>ii. Subject:</strong> {{ $academic_data->bachelor_subject }}</b></ul>
                                <ul><b><strong>iii. Bachelors Passing Year:</strong>
                                        {{ $academic_data->bachelor_year }}</b></ul>
                                <ul><b><strong>iv. CGPA:</strong> {{ $academic_data->bachelor_cgpa }}</b></ul><br>
                            </div>
                        @endif


                        @if ($academic_data->hsc_gpa || $academic_data->hsc_year)
                            <div class="degree">
                                <ul><strong> HSC:</strong></ul>
                                <ul><b><strong>i. Year Passed:</strong>{{ $academic_data->hsc_year }}</b></ul>
                                <ul><b><strong>ii. College Name:</strong> {{ $academic_data->hsc_institution }}</b>
                                </ul>
                                <ul><b><strong>iii. GPA:</strong> {{ $academic_data->hsc_gpa }}</b></ul><br>
                            </div>
                        @endif


                        <div class="degree">
                            <ul><strong> SSC:</strong></ul>
                            <ul><b><strong>i. Year Passed:</strong>{{ $academic_data->ssc_year }}</b></ul>
                            <ul><b><strong>ii. School Name:</strong> {{ $academic_data->ssc_institution }}</b></ul>
                            <ul><b><strong>iii. GPA:</strong> {{ $academic_data->ssc_gpa }}</b></ul><br>
                        </div>
                    @endif

                    <p><strong>8. Any other significant achievements(e.g., athlete, debator, organizer, etc):</strong>
                        @forelse ($achievements as $achievement)
                            @if ($achievement->achievement != null)
                                <strong>{{ $loop->index + 1 }}.</strong> {{ $achievement->achievement }}
                    </p>
                    @endif
                @empty
                    @endforelse
                    <br>

                    <p><strong>9. Reference</strong></p>
                    <div class="degree">
                        <ul><strong>Reference Name:</strong> {{ $student_data->reference_name }}</ul>
                        <ul><strong>Reference Profession:</strong> {{ $student_data->reference_profession }}</ul>
                        <ul><strong>Reference Contact No.:</strong> {{ $student_data->reference_phone }}</ul>
                    </div>
                <dd class="clear"></dd>

                <p><strong>10. Aim in Life:</strong> {{ $student_data->aim_in_life }}</p>
                <dd class="clear"></dd>
                <p><strong>11. Mother's profession:</strong> {{ $student_data->mother_profession }}</p>
                <p><strong>12. Father's profession:</strong> {{ $student_data->father_profession }}</p>
                <dd class="clear"></dd>
                <p><strong>13. Siblings and their status:</strong> {{ $student_data->siblings }}</p>
                <dd class="clear"></dd>
                <p><strong>14. Family income (Tk. Monthly):</strong> {{ $student_data->family_income }}</p>
                <dd class="clear"></dd>
                <p><strong>15. Income source:</strong> {{ $student_data->income_source }}</p>
                <dd class="clear"></dd>
                <p><strong>16. Any other scholarship:</strong> {{ $student_data->other_scholarship }}</p>
                <dd class="clear"></dd>
                <p><strong>17. Reason for financial support(please write details):</strong>
                    {{ $student_data->reason }}</p>

                <dd class="clear"></dd>

                </dd>

                <dd class="clear"></dd>
            </dl>

        </div>



</body>

</html>
