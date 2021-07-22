<?php

namespace App\Nova;

use App\Models\MemberModel;
use App\Models\ProjectModel;
use ClassicO\NovaMediaLibrary\MediaLibrary;
use Digitalcloud\MultilingualNova\Multilingual;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\TabsOnEdit;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class MainPageResource extends Resource
{

    use TabsOnEdit;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Pages\MainPageModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public static $priority = 1;

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
        return 'Main';
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


            Tabs::make('Блоки главной страницы', [
                Tab::make('Главный блок', [
                    Flexible::make('Заголовок', 'hero_title')
                        ->addLayout('Линия текста', 'text_line', [
                            Text::make('Текст', 'text'),
                        ])
                        ->button('Добавить линию'),

                    Flexible::make('Текст', 'hero_text')
                        ->addLayout('Линия текста', 'text_line', [
                            Text::make('Текст', 'text'),
                        ])
                        ->button('Добавить линию'),

                    Text::make('Часть текста ссылки (без анимации)', 'hero_link_text')->hideFromIndex(),
                    Text::make('Часть текста ссылки (с анимацией)', 'hero_link_text_animated')->hideFromIndex(),
                    Text::make('Ссылка', 'hero_link')->hideFromIndex(),
                    MediaLibrary::make('Главное видео', 'main_video')->hideFromIndex(),


                ]),
                Tab::make('Проекты', [

                    Flexible::make('Проекты', 'projects')
                        ->addLayout('Проект', 'project', [
                            Select::make('Проект', 'project')->options(
                                ProjectModel::pluck('link', 'id' )
                            ),
                        ])
                        ->button('Добавить проект'),



                    Text::make('Часть заголовка (без анимации)', 'projects_title')->hideFromIndex(),
                    Text::make('Часть заголовка (с анимацией)', 'projects_title_animated')->hideFromIndex(),
                    Text::make('Ссылка', 'projects_title_link')->hideFromIndex(),
                    Text::make('Текст ссылки текущего проекта (с анимацией)', 'projects_current_text_animated')->hideFromIndex(),
                    Text::make('Текст ссылки текущего проекта (без анимации)', 'projects_current_text')->hideFromIndex(),

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
                        ->button('Добавить строку')
                    ->limit(2),

                    Text::make('Часть текста ссылки (с анимацией)', 'team_link_text_animated')->hideFromIndex(),
                    Text::make('Часть текста ссылки (без анимации)', 'team_link_text')->hideFromIndex(),
                    Text::make('Ссылка', 'team_link')->hideFromIndex(),


                ])
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
