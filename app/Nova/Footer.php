<?php

namespace App\Nova;

use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class Footer extends Resource
{

    use TabsOnEdit;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Parts\Footer::class;

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
        return 'Footer';
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

            Tabs::make('Блоки', [
                Tab::make('Левый столбец', [

                    Text::make('Заголовок', 'left_title')->hideFromIndex(),
                    Text::make('Город, страна', 'left_city')->hideFromIndex(),
                    Text::make('Адрес', 'left_address')->hideFromIndex(),
                    Text::make('Ссылка на google map', 'left_google_map_link')->hideFromIndex(),

                    Flexible::make('E-mails', 'left_emails')
                        ->addLayout('E-mail', 'E-mails', [
                            Text::make('E-mail', 'E-mail'),
                        ])->button('Добавить e-mail'),

                    Flexible::make('Телефоны', 'left_tels')
                        ->addLayout('Телефон', 'tel_info', [
                            Text::make('Имя, фамилия', 'person'),
                            Text::make('Телефон', 'tel'),
                        ])->button('Добавить телефон'),


                ]),
                Tab::make('Центральный столбец', [
                    Text::make('Заголовок', 'center_title')->hideFromIndex(),

                    Flexible::make('E-mails', 'center_emails')
                        ->addLayout('E-mail', 'tel_info', [
                            Text::make('Заголовок', 'title'),
                            Text::make('E-mail', 'e-mail'),
                        ])->button('Добавить e-mail'),
                ]),
                Tab::make('Правый столбец', [
                    Text::make('Заголовок', 'right_title')->hideFromIndex(),
                    Text::make('Большой текст', 'right_big_text')->hideFromIndex(),
                    Text::make('Текст ссылки', 'right_big_link_text')->hideFromIndex(),
                    Text::make('Ссылка', 'right_big_link')->hideFromIndex(),

                    Flexible::make('Медиа-ссылки', 'right_links')
                        ->addLayout('Медиа-ссылка', 'media_link', [
                            Text::make('Текст ссылки', 'link_text'),

                            Flexible::make('Контент ссылки', 'link_content')
                                ->addLayout('Файл', 'file', [
                                    MediaLibrary::make('Файл', 'file'),
                                ])
                                ->addLayout('Ссылка', 'link', [
                                    Text::make('Ссылка', 'link'),
                                ])
                                ->limit(1)
                                ->button('Добавить контент ссылки'),

                        ])->button('Добавить медиа-ссылку'),

                ]),

                Tab::make('Нижняя часть футера', [
                    Text::make('Текст ссылки на политику', 'politic_label')->hideFromIndex(),
                    Text::make('Ссылка на политику', 'politic_link')->hideFromIndex(),

                    Flexible::make('Социальные сети', 'social_links')
                        ->addLayout('Социальная сеть', 'social_item', [
                            Text::make('Название соцсети', 'social_name'),
                            Text::make('Ссылка соцсети', 'social_link'),
                        ])->button('Добавить соцсеть'),

                    Text::make('Ярлык для разработчика', 'developed_label')->hideFromIndex(),
                    Text::make('Название разработчика', 'developed_by_label')->hideFromIndex(),
                    Text::make('Ссылка на разработчика', 'developed_by_link')->hideFromIndex(),

                ]),
                Tab::make('Блок с куки', [
                    Text::make('Текст блока с куки', 'cookie_text')->hideFromIndex(),
                    Text::make('Текст кнопки', 'cookie_btn_text')->hideFromIndex(),
                ])


            ])->withToolbar()

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



