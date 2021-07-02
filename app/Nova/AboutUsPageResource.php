<?php

namespace App\Nova;

use App\Models\MemberModel;
use App\Models\Pages\AboutUsPageModel;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class AboutUsPageResource extends Resource
{

    use TabsOnEdit;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = AboutUsPageModel::class;

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

    public static $priority = 2;

    public static $group = 'Pages';

    public static function label()
    {
        return 'About us ';
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

            Tabs::make('Страница О нас', [

                Tab::make('Главный блок', [
                    MediaLibrary::make('Главное изображение', 'main_picture')->hideFromIndex(),
                    MediaLibrary::make('Превью видео', 'preview_video')->hideFromIndex(),
                    MediaLibrary::make('Главное видео', 'main_video')->hideFromIndex(),

                    Flexible::make('Левый блок с текстом', 'hero_left_text')
                        ->addLayout('Строка', 'text_line', [
                            Text::make('Текст', 'text'),
                        ])->button('Добавить строку'),

                    Flexible::make('Правый блок с текстом', 'hero_right_text')
                        ->addLayout('Строка', 'text_line', [
                            Text::make('Текст', 'text'),
                        ])->button('Добавить строку'),

                    Trix::make('Первый анимированный текст', 'first_animated_text')->alwaysShow(),
                ]),

                Tab::make('Команда', [
                    Flexible::make('Команда проекта', 'team_members')
                        ->addLayout('Сотрудник', 'member', [
                            Select::make('Сотрудник', 'member')->options(
                                MemberModel::all()->pluck('full_name', 'id')
                            ),
                        ])
                        ->button('Добавить сотрудника'),

                    Flexible::make('Заголовок в центре', 'team_text')
                        ->addLayout('Жирный текст', 'bold_text', [
                            Text::make('Текст', 'text'),
                        ])
                        ->addLayout('Тонкий текст', 'thin_text', [
                            Text::make('Текст', 'text'),
                        ])
                        ->button('Добавить строку'),

                    Text::make('Часть текста ссылки (с анимацией)', 'team_link_text_animated')->hideFromIndex(),
                    Text::make('Часть текста ссылки (без анимации)', 'team_link_text')->hideFromIndex(),
                    Text::make('Ссылка', 'team_link')->hideFromIndex(),

                    Trix::make('Второй анимированный текст', 'second_animated_text')->alwaysShow(),
                ]),

                Tab::make('Слайдер', [
                    Flexible::make('Текст над слайдером', 'slider_text')
                        ->addLayout('Строка', 'text_line', [
                            Text::make('Текст', 'text'),
                        ])->button('Добавить строку'),

                    Flexible::make('Изображения слайдера', 'slider_pictures')
                        ->addLayout('Изображение', 'picture', [
                            MediaLibrary::make('Изображение', 'picture')
                        ])
                        ->button('Добавить изображение'),
                ]),

                Tab::make('Нижний блок', [
                    MediaLibrary::make('Изображение', 'bottom_block_picture')->hideFromIndex(),

                    Text::make('Стандартный текст', 'bottom_block_text')->hideFromIndex(),
                    Text::make('Текст при наведении', 'bottom_block_hover_text')->hideFromIndex(),
                    Text::make('Ссылка', 'bottom_block_link')->hideFromIndex(),
                ]),

            ])->withToolbar(),

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
