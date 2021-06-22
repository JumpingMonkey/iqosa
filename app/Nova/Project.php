<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class Project extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Project::class;

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
        'id', 'type', 'number', 'link',
    ];

    public static $group = 'Objects';

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
            Text::make('Тип проекта', 'type')->sortable()->rules('required'),
            Text::make('Номер проекта', 'number')->sortable()->rules('required'),
            Text::make('Полное название / ссылка', 'link')
                ->sortable()
                ->rules('required')
                ->creationRules('unique:projects'),
            Text::make('Дата релиза проекта', 'release_date')->sortable(),
            Text::make('Площадь проекта', 'area')->sortable(),
            MediaLibrary::make('Главная картинка', 'main_picture')->hideFromIndex(),
            Text::make('Город', 'city')->sortable(),
            Text::make('Страна', 'country')->sortable(),

            Flexible::make('Контент', 'content')
                ->addLayout('Большое изображение', 'big_image', [
                    MediaLibrary::make('Изображение', 'image')
                ])
                ->addLayout('Галерея изображений', 'gallery', [
                    MediaLibrary::make('Первая картинка', 'first_image'),
                    Text::make('Первый текст для первой картинки', 'first_image_text1'),
                    Text::make('Второй текст для первой картинки', 'first_image_text2'),
                    MediaLibrary::make('Вторая картинка', 'second_image'),
                    Text::make('Первый текст для второй картинки', 'second_image_text1'),
                    Text::make('Второй текст для второй картинки', 'second_image_text2'),
                    MediaLibrary::make('Третья картинка', 'third_image'),
                    Text::make('Первый текст для третьей картинки', 'third_image_text1'),
                    Text::make('Второй текст для третьей картинки', 'third_image_text2'),
                    MediaLibrary::make('Четвертая картинка', 'fourth_image'),
                    Text::make('Первый текст для четвертой картинки', 'fourth_image_text1'),
                    Text::make('Второй текст для четвертой картинки', 'fourth_image_text2'),
                    Text::make('Текст в центре галереи', 'center_text'),
                ])->button('Добавить блок'),

          BelongsToMany::make('Members'),


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
