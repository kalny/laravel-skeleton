<?php

namespace App\Http\View\Composers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SidebarComposer
{
    private $sidebar = [];

    public function __construct(Request $request)
    {
        $sidebarConfig = config('sidebar');

        foreach ($sidebarConfig as $part => $items) {
            $sidebarItem = [
                'part' => $part,
            ];

            foreach ($items as $item) {
                $sidebarItem['items'][] = [
                    'title' => $item['title'],
                    'link' => route($item['route']),
                    'feather' => $item['icon'],
                    'active' => $this->checkActive($request, $item['active']),
                ];
            }

            $this->sidebar[] = $sidebarItem;
        }
    }

    private function checkActive(Request $request, array $conditions = []): bool
    {
        foreach ($conditions as $condition) {
            if ($request->is($condition)) {
                return true;
            }
        }
        return false;
    }

    public function compose(View $view)
    {
        $view->with('sidebar', $this->sidebar);
    }
}
