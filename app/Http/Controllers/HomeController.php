<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\WordGeneration;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Главня страница, форма
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * Сохранение в бд
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $data['url']  = (new Url())->parse_url_if_valid($data['url']);

        $word = new WordGeneration();
        $abbreviated_url = $word->generator(5);

        while (Url::where('abbreviated_url',$abbreviated_url)->exists()){
            $abbreviated_url = (new WordGeneration())->generator(5);
        }

        Url::create([
            'url' => $data['url'],
            'abbreviated_url' => $abbreviated_url,
        ]);

        $dataJson = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .
            $_SERVER['HTTP_HOST'] .
            '/'.
            $abbreviated_url;
        return response()->json($dataJson);
    }


    /**
     * Переадресация url
     * @param $abbreviated_url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function url($abbreviated_url){

        $data = Url::where('abbreviated_url', $abbreviated_url)->firstOrFail();

        return redirect()->away($data->url);
    }
}
