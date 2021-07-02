<?php

namespace App\Nova;

use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class ProjectsPageResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Pages\ProjectsPageModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public static $priority = 3;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    public static $group = 'Pages';

    public static function label()
    {
        return 'Projects ';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Multilingual::make('Language'),
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('SEO-заголовок', 'seo_title')->hideFromIndex(),
            Text::make('Мета-описание', 'meta_description')->hideFromIndex(),

            Flexible::make('Заголовок', 'projects_title')
                ->addLayout('Тонкий текст', 'thin_text', [
                    Text::make('Текст', 'text'),
                ])
                ->addLayout('Толстый текст', 'bold_text', [
                    Text::make('Текст', 'text'),
                ])
                ->button('Добавить линию заголовка'),

            Flexible::make('Подзаголовок', 'projects_subtitle')
                ->addLayout('Линия подзаголовка', 'subtitle_line', [
                    Text::make('Текст', 'text'),
                ])
                ->button('Добавить линию подзаголовка'),

            Text::make('Текст кнопки "Блоки"', 'projects_block_text')->hideFromIndex(),
            Text::make('Текст кнопки "Список"', 'projects_list_text')->hideFromIndex(),
            Text::make('Текст для даты проекта', 'date_label')->hideFromIndex(),
            Text::make('Текст для площади проекта', 'area_label')->hideFromIndex(),
            Text::make('Эдиницы измерения площади', 'area_unit')->hideFromIndex(),


        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
