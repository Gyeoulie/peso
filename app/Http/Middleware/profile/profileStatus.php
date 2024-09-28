<?php

namespace App\Http\Middleware\profile;

use App\Models\Employee;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $profileId = $request->route('id');
        $user = Auth::user();

        if ($user->usertype <= 6) {

            // Find the jobseeker based on the id
            $profileOwner = Employee::find($profileId);

            if (!$profileOwner) {
                // If the profile owner or employee doesn't exist, abort with a 404
                return abort(404, 'Profile not found');
            }

            $profileUserStatus = $profileOwner->empprofile;

            if ($profileUserStatus == 1) {
                // If profile is private, only the owner can view
                if ($user->id !== $profileOwner->user_id) {
                    return abort(404, 'Profile not found');
                }
            } elseif ($profileUserStatus == 2 || $user->employee->employee_id !== $profileOwner->employee_id) {
                // If profile is visible only to users with `userstatus` > 7
                if ($user->userstatus <= 7) {
                    return abort(404, 'Profile not found');
                }
            }
            // If profileUserStatus == 3, anyone can view, so no need to block.
        }
        return $next($request);
    }
}
