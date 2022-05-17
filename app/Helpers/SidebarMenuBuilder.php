<?php

namespace App\Helpers;


class SidebarMenuBuilder
{
    /**
     *  Return menu items array
     *
     * @return array
     */
    public static function getMenu(): array
    {
        return (new self())->loadMenuItem();
    }

    /**
     * Load menu items array
     *
     */
    protected function loadMenuItem() : array
    {
        $menuItems = config('sidebar-menu');
        $render = [];
        foreach ($menuItems as $item) {
           // dd($menuItems , $item);
            $subItems = $this->getSubMenu($item['child']);
            if (count($subItems)) {
                $render[] = [
                    'name' => $item['name'],
                    'sub_menu' => $subItems,
                    'icon' => $item['icon'],
                    'class' => in_array(request()->route()->getName(), $item['activeWhen']) .' ' . $item['class'],
                ];
            }
        }

        return $render;
    }

    /**
     * Get submenu
     *
     * @param $childItems
     * @return array
     */
    protected function  getSubMenu(array $childItems): array
    {
        $accessibleItems = [];
        $counter = 0;

        foreach ($childItems as $childItem) {
        
            $permissions = $childItem['permissions'];
            if (auth()->check() && auth()->user()->can($permissions)) {
                $accessibleItems[] = $childItem;
            }else{
                //dd($permissions);

            }
            $counter ++;
        }

        return $accessibleItems;
    }

}
