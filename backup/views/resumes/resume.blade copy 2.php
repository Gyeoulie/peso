<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PESO') }}</title>


</head>

<body>
    <style>
        body,
        main {
            font-family: Jost, sans-serif;
            hyphens: manual;
        }

        .section-container {
            padding: 3rem;
            /* margin: auto; */
            max-width: 48rem;
            background-color: #f3f4f6;
            border-radius: 1rem;
            border: 4px solid #374151;
        }

        .header-section,
        .contact-section,
        .summary-section,
        .education-section,
        .skills-section,
        .experience-section,
        .trainings-section,
        .certifications-section {
            margin-bottom: 1rem;
            border-bottom: 4px solid #d1d5db;
        }

        .header-section {
            padding-bottom: 0.5rem;
            display: inline-flex;
            justify-content: space-between;
            align-items: top;
        }

        .header-section img {
            width: 220px;
            height: 150px;
            border-radius: 1rem;
        }

        .header-section h1 {
            /* margin-top: 0.75rem; */
            /* margin-bottom: 0; */
            font-size: 3rem;
            font-weight: bold;
            color: #374151;
        }

        .header-section h3 {
            /* margin: 0.5rem 0 0 0.5rem; */
            font-size: 1.25rem;
            font-weight: 600;
            color: #6b7280;
            line-height: 1.5;
        }

        .section-title {
            /* margin-bottom: 0.5rem; */
            font-size: 1.25rem;
            font-weight: bold;
            letter-spacing: 0.1em;
            color: #374151;
        }

        .section-content {
            /* margin-bottom: 0.5rem; */
            font-size: 1rem;
            color: #4b5563;
            line-height: 1.5;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            padding: 0;
            list-style-type: none;
            gap: 0.5rem;
        }

        .skills-list li {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #4b5563;
            border-radius: 0.375rem;
            background-color: #d1d5db;
        }

        @media print {
            .section-container {
                border: 0;
                max-width: 8.5in;
                max-height: 11in;
                /* margin: 0; */
                background-color: #ffffff;
            }

            .header-section {
                page-break-after: avoid;
            }

            .contact-section,
            .summary-section,
            .education-section,
            .skills-section,
            .experience-section,
            .trainings-section,
            .certifications-section {
                page-break-inside: avoid;
            }

            .skills-list {
                column-count: 6;
                column-fill: balance;
            }

            .skills-list li {
                background-color: #e5e7eb;
                border: 1px solid #374151;
                color: #000000;
            }

        }
    </style>
    <main>
        <section class="section-container">
            <header class="header-section"
                style="display: flex; justify-content: space-between; align-items: center; border-bottom: 4px solid #d1d5db; padding-bottom: 0.5rem; margin-bottom: 0.5rem;">
                <section
                    style="padding: 3rem; color: white; border-radius: 1rem; background-color: black; display: inline-block;">
                    <img src="{{ public_path() . $employee->pimg }}"
                        style="width: 180px; height: 120px; border-radius: 1rem;">
                </section>
                <section
                    style="display: inline-block; flex-direction: column; width: calc(100% - 220px - 1rem); margin-left: 0.5rem;">
                    <h1 style="margin: 0.75rem 0 0; font-size: 3rem; font-weight: bold; color: #374151;">
                        {{ $employee->fname }} {{ $employee->lname }}</h1>
                    <h3 style="margin: 0.5rem 0 0 0.5rem; font-size: 1.25rem; font-weight: 600; color: #6b7280;">San
                        {{ $employee->barangay->municipality->municipality_Name }},
                        {{ $employee->barangay->municipality->province->province_Name }}</h3>
                </section>
            </header>


            <section class="contact-section">
                <ul style="padding-right: 1.75rem; list-style-type: none; padding-left: 0;">
                    <li style="margin-top: 0.25rem; line-height: 1.5;">
                        <a href="https://veilmail.io/e/J-td7W" style="text-decoration: none;">
                            <span style="font-size: 1.125rem; font-weight: 600; color: #374151;">Email:</span>
                            {{ $employee->user->email }}
                        </a>
                    </li>
                    <li style="margin-top: 0.25rem; line-height: 1.5;">
                        <a href="tel:+15109070654" style="text-decoration: none;">
                            <span style="font-size: 1.125rem; font-weight: 600; color: #374151;">Phone:</span>
                            {{ $employee->pnumber }}
                        </a>
                    </li>
                </ul>
            </section>

            <section class="summary-section">
                <h2 class="section-title">SUMMARY</h2>
                <p class="section-content">Experienced full-stack web developer with a strong track record of
                    independently addressing complex business requirements and overcoming challenges to deliver polished
                    and user-friendly web solutions.</p>
            </section>

            <section class="education-section">
                <h2 class="section-title">EDUCATION</h2>
                @foreach ($employee->education as $data)
                    <section style="border-bottom: 1px solid #d1d5db;">
                        <p style="font-size: 1.125rem; font-weight: 600; color: #6b7280;">
                            {{ $data->edu_School }}
                        </p>
                        <p style="font-size: 1rem; margin-bottom: 0;">
                            <span style="font-size: 1rem; color: #4b5563; font-weight: 400;">
                                {{ $data->edu_Level }}<br>
                                {{ $data->edu_Course }} |
                                {{ $data->edu_Started->format('F j, Y') }} &ndash;
                                {{ $data->edu_Ongoing == 1 ? 'Present' : $data->edu_Ended->format('F j, Y') }}
                            </span>
                        </p>
                    </section>
                @endforeach
            </section>

            <section class="experience-section">
                <h2 class="section-title">EXPERIENCE</h2>
                @foreach ($employee->work_exp as $data)
                    <section style="margin-bottom: 1rem; border-bottom: 1px solid #d1d5db;">
                        <h3 style="font-size: 1.5rem; font-weight: 600; color: #6b7280;">
                            {{ $data->job_positions->position_Title }}
                        </h3>
                        <p style="font-size: 1.25rem; margin-bottom: 0;">
                            {{ $data->work_Name }}
                            <span style="display: block; font-size: 1rem; font-weight: 400; color: #6b7280;">
                                {{ $data->work_Start->format('F j, Y') }} - {{ $data->work_End->format('F j, Y') }}
                            </span>
                            <span style="display: block; font-size: 1rem; font-weight: 400; color: #6b7280;">
                                {{ $data->work_Address }}
                            </span>
                        </p>
                    </section>
                @endforeach
            </section>

            <section class="trainings-section">
                <h2 class="section-title">TRAININGS</h2>
                @foreach ($employee->training as $data)
                    <section style="margin-bottom: 1rem; border-bottom: 1px solid #d1d5db;">
                        <h3 style="font-size: 1.5rem; font-weight: 600; color: #6b7280;">
                            {{ $data->training_Name }}
                        </h3>
                        <p style="font-size: 1.25rem; margin-bottom: 0;">
                            {{ $data->training_From }}
                            <span style="display: block; font-size: 1rem; font-weight: 400; color: #6b7280;">
                                J{{ $data->training_Cert }}
                            </span>
                            <span style="display: block; font-size: 1rem; font-weight: 400; color: #6b7280;">
                                {{ $data->training_Start->format('F j, Y') }} -
                                {{ $data->training_End->format('F j, Y') }}
                            </span>
                        </p>
                    </section>
                @endforeach
            </section>

            <section class="certifications-section">
                <h2 class="section-title">CERTIFICATIONS</h2>
                @foreach ($employee->certificate as $data)
                    <section style="margin-bottom: 1rem; border-bottom: 1px solid #d1d5db;">
                        <h3 style="font-size: 1.5rem; font-weight: 600; color: #6b7280;">
                            {{ $data->certificateType->cert_Name }}
                        </h3>
                        <p style="font-size: 1.25rem; margin-bottom: 0;">
                            {{ $data->cert_From }}
                            <span style="display: block; font-size: 1rem; font-weight: 400; color: #6b7280;">
                                {{ $data->cert_Date_Issued->format('F j, Y') }} | {{ $data->cert_Rating }}
                            </span>
                        </p>
                    </section>
                @endforeach
            </section>


            <section class="skills-section">
                <h2 class="section-title">SKILLS</h2>
                <ul class="skills-list">
                    @foreach ($employee->skills as $data)
                        <li>{{ $data->skill_Type }}</li>
                    @endforeach
                </ul>
            </section>

        </section>
    </main>
</body>

</html>
