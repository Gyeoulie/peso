<x-mail::message>
# Hello {{ $employerName }},

We would like to inform you that all available slots for the job position of **{{ $jobTitle }}** have been filled.

**Status:** Job Posting Completed

At this point, you have 3 weeks to review all job applications received for this position. During this period, please ensure that you thoroughly review each application and make any necessary decisions. 

After 3 weeks, the job posting will be automatically marked as completed if no further action is taken. If you need additional time or have any questions regarding the review process, please let us know.

Thank you for using the PESO platform to manage your job postings. We appreciate your prompt attention to this matter and wish you a smooth review process.

Best regards,<br>
{{ config('app.name') }} {{ $PESO }}
</x-mail::message>
