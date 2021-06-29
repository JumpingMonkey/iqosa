<?php

namespace App\Nova;

use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class ProjectPageResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Pages\ProjectPageModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
        return 'Project';
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

            Text::make('Текст для даты проекта', 'date_label')->hideFromIndex(),
            Text::make('Текст для команды проекта', 'team_label')->hideFromIndex(),
            Text::make('Текст для площади проекта', 'area_label')->hideFromIndex(),
            Text::make('Эдиницы измерения площади', 'area_unit')->hideFromIndex(),
            Text::make('Заголовок блока "Поделиться"', 'share_title')->hideFromIndex(),

            Text::make('Текст для facebook', 'share_facebook')->hideFromIndex(),
            Text::make('Текст для twitter', 'share_twitter')->hideFromIndex(),
            Text::make('Текст для linkedin', 'share_linkedin')->hideFromIndex(),

            Text::make('Заголовок для ссылки', 'link_block_title')->hideFromIndex(),
            Text::make('Текст ссылки', 'link_block_text')->hideFromIndex(),
            Text::make('Ссылка', 'link_block_link')->hideFromIndex(),
            Text::make('Текст для ссылки на следующий проект', 'next_project_text')->hideFromIndex(),

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
