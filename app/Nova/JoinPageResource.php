<?php

namespace App\Nova;

use Digitalcloud\MultilingualNova\Multilingual;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;

class JoinPageResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Pages\JoinPageModel::class;

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
        return 'Join';
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

            Flexible::make('Малый заголовок', 'title_small')
                ->addLayout('Строка', 'text_line', [
                    Text::make('Текст', 'text'),
                ])->button('Добавить строку'),

            Text::make('Большой заголовок (жирный)', 'title_big_bold')->hideFromIndex(),
            Text::make('Большой заголовок (тонкий)', 'title_big_thin')->hideFromIndex(),

            Text::make('Текст ссылки на прерыдущую страницу', 'prev_page_label')->hideFromIndex(),
            Text::make('Якорь ссылки на прерыдущую страницу', 'prev_page_link')->hideFromIndex(),

            Text::make('Текст ссылки на следующую страницу', 'next_page_label')->hideFromIndex(),
            Text::make('Якорь ссылки на следующую страницу', 'next_page_link')->hideFromIndex(),

            Trix::make('Текст перед полем для ввода (имя, фамилия)', 'text_before_name')->alwaysShow(),
            Text::make('Надпись на поле для ввода (имя, фамилия)', 'name_input_placeholder')->hideFromIndex(),

            Trix::make('Текст перед полем для ввода (список вакансий)', 'text_before_vacancy')->alwaysShow(),
            Text::make('Надпись на поле для ввода (список вакансий)', 'vacancy_input_placeholder')->hideFromIndex(),

            Trix::make('Текст перед полем для ввода (резюме)', 'text_before_file')->alwaysShow(),
            Text::make('Надпись на поле для ввода (резюме)', 'file_input_placeholder')->hideFromIndex(),

            Trix::make('Текст перед полем для ввода (ссылка на портфолио)', 'text_before_portfolio')->alwaysShow(),
            Text::make('Надпись на поле для ввода (ссылка на портфолио)', 'portfolio_input_placeholder')->hideFromIndex(),

            Trix::make('Текст перед полем для ввода (email)', 'text_before_email')->alwaysShow(),
            Text::make('Надпись на поле для ввода (email)', 'email_input_placeholder')->hideFromIndex(),

            Text::make('Часть текста кнопки отправки формы (без анимации)', 'submit_text')->hideFromIndex(),
            Text::make('Часть текста кнопки отправки формы (с анимацией)', 'submit_text_animated')->hideFromIndex(),

            Text::make('Заголовок успешной отправки формы (жирный)', 'thanks_title_bold')->hideFromIndex(),
            Text::make('Заголовок успешной отправки формы (тонкий)', 'thanks_title_thin')->hideFromIndex(),
            Text::make('Часть текста ссылки успешной отправки формы (без анимации)', 'thanks_link_text')->hideFromIndex(),
            Text::make('Часть текста ссылки успешной отправки формы (с анимацией)', 'thanks_link_text_animated')->hideFromIndex(),

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
