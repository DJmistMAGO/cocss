<?php

namespace App\Services;

class Constant
{
    public static function getRoles()
    {
        return [
            'admin',
            'user',
        ];
    }

    public static function getPermissions()
    {
        $nurse_features = [
            [
                'name' => 'can-access-approval-page',
                'label' => 'The user can access approval menu.',
            ],
            [
                'name' => 'can-access-appointment-page',
                'label' => 'The user can access appointment menu.',
            ],
            [
                'name' => 'can-access-appointment-history',
                'label' => 'The user can access appointment history.',
            ],
            [
                'name' => 'can-access-patients-page',
                'label' => 'The user can access patients menu.',
            ],
            [
                'name' => 'can-access-patients-log-page',
                'label' => 'The user can access patients log menu.',
            ],
        ];

        $dashboard_features = [
            [
                'name' => 'can-access-dashboard-page',
                'label' => 'The user can access dashboard menu.',
            ],
        ];

        $user_features = [
            [
                'name' => 'can-access-profile-page',
                'label' => 'The user can access profile menu.',
            ],
            [
                'name' => 'can-access-book-appointment-page',
                'label' => 'The user can access book-appointment menu.',
            ],
            [
                'name' => 'can-access-health-records-page',
                'label' => 'The user can access health records.',
            ],

        ];

        return [
            'permissions' => [
                'nurse' => array_column($nurse_features, 'name'),
                'dashboard' => array_column($dashboard_features, 'name'),
                'user' => array_column($user_features, 'name'),
            ],
            'assignments' =>
            [
                'admin' => [
                    ...array_column($nurse_features, 'name'),
                    ...array_column($dashboard_features, 'name'),
                ],
                'user' => [
                    ...array_column($user_features, 'name'),
                    ...array_column($dashboard_features, 'name'),
                ],
            ]
        ];
    }
}
