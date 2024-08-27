
<x-mail::message>
# Hello, {{ $employeeName }}

We have exciting news! A new job posting that matches your preferences has just been listed.

## Job Title: {{ $jobTitle }}
## Company: {{ $companyName }}
## Location: {{ $jobLocation }}

We believe you might be interested in this opportunity. Take a look and apply if it suits you.
<x-mail::button :url="$jobPostingUrl">
View Job Posting
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
