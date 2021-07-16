<?php

namespace App\Nova;

use App\Models\ArticleModel;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class ArticleResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = ArticleModel::class;

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
        'id', 'title',
    ];

    public static $group = 'Objects';

    public static function label()
    {
        return 'Articles';
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [

            Multilingual::make('Language'),
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Название статьи', 'title')->sortable()->rules('required'),
            Text::make('SEO-заголовок', 'seo_title')->hideFromIndex(),
            Text::make('Мета-описание', 'meta_description')->hideFromIndex(),
            Text::make('Ссылка', 'link')
                ->hideFromIndex()
                ->rules('required')
                ->creationRules('unique:articles'),
            MediaLibrary::make('Главное изображение', 'main_picture')->hideFromIndex(),
            Flexible::make('Авторы', 'authors')
                ->addLayout('Автор', 'author', [
                    Text::make('Имя автора', 'author_name'),
                ])->button('Добавить автора'),
            Flexible::make('Темы', 'subjects')
                ->addLayout('Тема', 'subject', [
                    Text::make('Название темы', 'subject_name'),
                ])->button('Добавить тему'),


            Flexible::make('Контент', 'content')
                ->addLayout('Блок с текстом', 'text_block', [
                    Trix::make('Текст', 'text')->alwaysShow()
                ])
                ->addLayout('Галерея изображений', 'gallery', [

                    Flexible::make('Элементы галереи', 'gallery_items')
                        ->addLayout('Элемент', 'element', [

                            MediaLibrary::make('Изображение', 'picture'),

                            Flexible::make('Текст для изображения', 'picture_text')
                                ->addLayout('Текст надписи', 'text_layout', [
                                    Text::make('Текст', 'text'),
                                ])->button('Добавить текст')

                        ])->button('Добавить элемент')

                ])->hideFromIndex()->button('Добавить блок'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
