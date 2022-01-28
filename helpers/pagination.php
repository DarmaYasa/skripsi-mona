<?php

function generate_pagination($total_page, $current_page)
{
    // print_r($total_page);
    $links = [];
    if ($total_page > 13) {
        $first_links = [
            ['label' => 1, 'active' => ($current_page == 1)],
            ['label' => 2, 'active' => ($current_page == 2)],
            ['label' => '...', 'active' => false],
        ];
        $last_links = [
            ['label' => '...', 'active' => false],
            ['label' => $total_page - 1, 'active' => ($current_page == $total_page - 1)],
            ['label' => $total_page, 'active' => ($current_page == $total_page)],
        ];

        if ($current_page <= 7) {
            for ($i = 1; $i <= 10; $i++) {
                $links[] = ['label' => $i, 'active' => $current_page == $i];
            }
            array_push($links, $last_links);
        } else if ($current_page >= $total_page - 7) {
            for ($i = 0; $i <= 9; $i++) {
                array_unshift($links, ['label' => $total_page - $i, 'active' => $current_page == $total_page - $i]);
            }
        } else {
            $links[] = ['label' => $current_page, 'active' => true];
            for ($i = 1; $i <= 3; $i++) {
                $links[] = ['label' => $current_page + $i, 'active' => false];
                array_unshift($links, ['label' => $current_page - $i, 'active' => false]);
            }
            array_push($links, $last_links);
            array_unshift($links, $first_links);
        }
    } else if ($total_page > 0) {
        for ($i = 1; $i <= $total_page; $i++) {
            $links[] = ['label' => $i, 'active' => $i == $current_page];
        }
    } else {
        $links[] = ['label' => 1, 'active' => true];
    }

    return $links;
}
