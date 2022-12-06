<?php

namespace Jcharcosset\Battle\Utils;

trait useHighArrayElements
{
    public function getHighArrayElement(array $elements): array
    {
        $duplicate_elements = array_count_values($elements);
        $highest = max($elements);

        $results = [];
        if ($duplicate_elements[$highest] > 1) {
            foreach ($elements as $key => $item) {
                if ($item === $highest) {
                    $results[] = $key;
                }
            }
        } else {
            $results = [array_search($highest, $elements)];
        }

        return $results;
    }
}
