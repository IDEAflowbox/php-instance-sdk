import React from 'react';
import {
    BarChartOutlined,
    AimOutlined,
    TagsOutlined,
    NodeIndexOutlined,
    ContactsOutlined,
    DollarCircleOutlined,
    SettingOutlined
} from "@ant-design/icons";

const menu = [
    {
        path: '/playground',
        name: 'Aktywności',
        icon: <BarChartOutlined />,
        // children: [
        //     {
        //         path: '/welcome',
        //         name: 'one',
        //         icon: <SmileOutlined />,
        //         children: [
        //             {
        //                 path: '/welcome/welcome',
        //                 name: 'two',
        //                 icon: <SmileOutlined />,
        //             },
        //         ],
        //     },
        // ],
    },
    {
        path: '/x',
        name: 'Rekomendacje',
        icon: <AimOutlined />,
        children: [
            {
                path: '/x1',
                name: 'Ranking produktów'
            },
            {
                path: '/x2',
                name: 'Ramki rekomendacji'
            },
        ],
    },
    {
        path: '/xx',
        name: 'Feed',
        icon: <TagsOutlined />,
    },
    {
        path: '/xxx',
        name: 'Mapowanie danych',
        icon: <NodeIndexOutlined />,
        children: [
            {
                path: '/xxx1',
                name: 'Atrybuty'
            },
            {
                path: '/xxx2',
                name: 'Kategorie'
            },
        ],
    },
    {
        path: '/xxxx',
        name: 'CRM',
        icon: <ContactsOutlined />,
        children: [
            {
                path: '/xxxx1',
                name: 'Grupa wskaźników 1'
            },
            {
                path: '/xxxx2',
                name: 'Grupa wskaźników 2'
            },
            {
                path: '/xxxx3',
                name: 'Lista klientów'
            },
        ],
    },
    {
        path: '/xxxxx',
        name: 'Rozliczenia',
        icon: <DollarCircleOutlined />,
        children: [
            {
                path: '/xxxxx1',
                name: 'Faktury'
            },
            {
                path: '/xxxxx2',
                name: 'Płatności'
            },
        ],
    },
    {
        path: '/settings',
        name: 'Ustawienia',
        icon: <SettingOutlined />,
        children: [
            {
                path: '/settings/account',
                name: 'Dane konta'
            },
            {
                path: '/settings/notifications',
                name: 'Dane rozliczeniowe'
            },
            // {
            //     path: '/settings/password',
            //     name: 'Password'
            // },
            // {
            //     path: '/settings/integrations',
            //     name: 'Integrations'
            // },
            // {
            //     path: '/settings/subscription',
            //     name: 'Subscription',
            //     children: [
            //         {
            //             path: '/settings/subscription/plans',
            //             name: 'Plans',
            //             hideInMenu: true
            //         }
            //     ]
            // },
        ],
    },
];

export default menu;