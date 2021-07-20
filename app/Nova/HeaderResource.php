<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class HeaderResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Parts\HeaderModel::class;

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

    public static $group = 'Pages parts';

    public static function label()
    {
        return 'Header';
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
            MediaLibrary::make('Логотип', 'logo'),
            Flexible::make('Навигация', 'navigation')
                ->addLayout('Проекты', 'navigation_item', [
                    Text::make('Название пункта', 'name'),
                    Text::make('Ссылка', 'link')->default('/projects')->readonly()

                ])
                ->addLayout('О нас', 'navigation_item', [
                    Text::make('Название пункта', 'name'),
                    Text::make('Ссылка', 'link')->default('/about-us')->readonly()

                ])
                ->addLayout('Медиа', 'navigation_item', [
                    Text::make('Название пункта', 'name'),
                    Text::make('Ссылка', 'link')->default('/media')->readonly()

                ])
                ->addLayout('Контакты', 'navigation_item', [
                    Text::make('Название пункта', 'name'),
                    Text::make('Ссылка', 'link')->default('/contact')->readonly()

                ])
                        ->button('Добавить пункт'),
            Text::make('Надпись на кнопке', 'btn_text'),
            Text::make('Ссылка на кнопке', 'btn_link'),
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
