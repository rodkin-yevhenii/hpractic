<?php

$sections = get_field('sections', get_the_ID());

if (!is_array($sections)) {
    return;
}

foreach ($sections as $section) {
    if (empty($section)) {
        continue;
    }

    switch ($section['section_type']) {
        case 'hero':
            $group = $section['hero'] ?? null;

            get_template_part(
                'template-parts/sections/hero',
                null,
                [
                    'fields' => $group,
                ]
            );
            break;
        case 'catalog':
            $group = $section['catalog'] ?? null;

            get_template_part(
                'template-parts/sections/catalog',
                null,
                [
                    'fields' => $group,
                ]
            );
            break;
        case 'about':
            $group = $section['about'] ?? null;

            get_template_part(
                'template-parts/sections/about',
                null,
                [
                    'fields' => $group,
                ]
            );
            break;
        case 'services':
            $group = $section['services'] ?? null;

            get_template_part(
                'template-parts/sections/services',
                null,
                [
                    'fields' => $group,
                ]
            );
            break;
        case 'steps':
            $group = $section['steps'] ?? null;

            get_template_part(
                'template-parts/sections/steps',
                null,
                [
                    'fields' => $group,
                ]
            );
            break;
        case 'callback':
            get_template_part(
                'template-parts/sections/callback'
            );
            break;
        case 'advantages':
            $group = $section['advantages'] ?? null;

            get_template_part(
                'template-parts/sections/advantages',
                null,
                [
                    'fields' => $group,
                ]
            );
            break;
        case 'bestsellers':
            $group = $section['bestsellers'] ?? null;

            get_template_part(
                'template-parts/sections/bestsellers',
                null,
                [
                    'fields' => $group,
                ]
            );
            break;
    }
}
