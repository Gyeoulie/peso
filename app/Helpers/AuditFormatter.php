<?php

namespace App\Helpers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\PESO;
use OwenIt\Auditing\Models\Audit;

class AuditFormatter
{
    protected static function getUserName($userId, $userType)
    {
        if ($userId === 0) {
            return 'System'; // Handle system case
        }

        if ($userType === 4) { // Employee
            $employee = Employee::where('user_id', $userId)->first();
            return $employee ? "{$employee->fname} {$employee->lname}" : 'Unknown User';
        } elseif ($userType === 5) { // Company
            $company = Company::where('user_id', $userId)->first();
            return $company ? $company->business_Name : 'Unknown User';
        } elseif ($userType === 8 || $userType === 9 || $userType === 10) { // PESO
            $peso = PESO::where('user_id', $userId)->first();
            return $peso ? "{$peso->peso_Fname} {$peso->peso_Lname}" : 'Unknown User';
        } else {
            return 'Unknown User';
        }
    }

    protected static function getUserTypeLabel($userType)
    {
        if ($userType === 0) {
            return 'System'; // Handle system case
        } elseif ($userType === 4) {
            return 'Jobseeker';
        } elseif ($userType === 5) {
            return 'Company';
        } elseif ($userType === 8 || $userType === 9 || $userType === 10) {
            return 'PESO Admin';
        } else {
            return 'User';
        }
    }

    protected static function getRecordValues($data)
    {
        $values = [];
        foreach ($data as $field => $value) {
            $values[] = sprintf('%s: "%s"', ucfirst($field), $value);
        }
        return $values;
    }

    public static function format(Audit $audit)
    {
        $userId = $audit->user_id;
        $userType = $userId ? $audit->user->usertype : 0; // Handle case when user is null
        $userName = self::getUserName($userId, $userType);
        $userTypeLabel = self::getUserTypeLabel($userType);
        $action = $audit->event;

        $model = class_basename($audit->auditable_type);
        $changes = [];

        $oldValues = $audit->old_values; // Use values directly
        $newValues = $audit->new_values; // Use values directly

        switch ($action) {
            case 'created':
                $recordValues = self::getRecordValues($newValues);
                $changes[] = sprintf("A new record in %s has been created by %s (%s):", $model, $userName, $userTypeLabel);
                $changes = array_merge($changes, $recordValues);
                break;

            case 'deleted':
                $recordValues = self::getRecordValues($oldValues);
                $changes[] = sprintf("A record in %s has been deleted by %s (%s):", $model, $userName, $userTypeLabel);
                $changes = array_merge($changes, $recordValues);
                break;

            case 'restored':
                $recordValues = self::getRecordValues($newValues);
                $changes[] = sprintf("A record in %s has been restored by %s (%s):", $model, $userName, $userTypeLabel);
                $changes = array_merge($changes, $recordValues);
                break;

            case 'updated':
                $modelInstance = app($audit->auditable_type);
                $fieldMappings = method_exists($modelInstance, 'fieldMappings')
                ? $modelInstance->fieldMappings()
                : [];

                $changes[] = sprintf("A record in %s has been updated by %s (%s):", $model, $userName, $userTypeLabel);

                foreach ($oldValues as $field => $oldValue) {
                    $formattedField = $fieldMappings[$field] ?? ucfirst($field);
                    $newValue = $newValues[$field] ?? 'N/A';
                    $changes[] = sprintf(
                        '%s has been changed from "%s" to "%s"',
                        $formattedField,
                        $oldValue,
                        $newValue
                    );
                }
                break;

            default:
                $changes[] = sprintf('An unknown action was performed on %s.', $model);
                break;
        }

        return [
            'changes' => $changes,
            'changed_by' => $userName,
            'user_id' => $userId,
            'user_type' => $userTypeLabel,
            'date' => $audit->created_at->format('Y-m-d H:i:s'),
            'ipaddress' => $audit->ip_address,
        ];
    }
}
