<?php

namespace App\Nova;

use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class PrivacyPolicyPageResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Pages\PrivacyPolicyPageModel::class;

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
        return 'Privacy Policy';
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

            Text::make('Заголовок (жирный)', 'title_bold')->hideFromIndex(),
            Text::make('Заголовк (тонкий)', 'title_thin')->hideFromIndex(),

            Flexible::make('Подзаголовок', 'subtitle')
                ->addLayout('Строка', 'text_line', [
                    Text::make('Текст', 'text'),
                ])->button('Добавить строку'),

            Flexible::make('Контент', 'content')
                ->addLayout('Абзац', 'paragraph', [
                    Trix::make('Текст', 'text')->alwaysShow(),
                ])->button('Добавить строку'),


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
