<?php

namespace App\Http\Controllers;

use App\Models\TelegraphText;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TextController extends Controller
{

    public function listTexts() : Response
    {

        $texts = TelegraphText::all();
        $view = view('telegraph')->with(['messages' => $texts]);
        return new Response($view);

    }

    public function storeText(Request $request)
    {

        $title = $request->get('title');
        $message = $request->get('text');
        $author = $request->get('author');
        $published = date('Y-m-d H:i:s');
        $id = $request->get('id');
        $isEdit = $request->get('edit');
        $isDelete = $request->get('delete');

        if (isset($id)) {

            if (isset($isEdit)) {

                $text = TelegraphText::where('id', '=', $id)->first();
                $text->title = $title;
                $text->text = $message;
                $text->author = $author;
                $text->published = $published;

                $text->save();

            } elseif (isset($isDelete)) {

                TelegraphText::where('id', '=', $id)->delete();

            }

        } else {

            if (isset($author) && isset($message)) {

                $text = new TelegraphText();
                $text->title = $title;
                $text->text = $message;
                $text->author = $author;
                $text->published = $published;

                $text->save();

            }

        }

        return redirect('/texts');

    }

    public function loadText($id) : Response
    {

        $text = TelegraphText::where('id', '=', $id)->first();
        $view = view('text')->with(['message' => $text]);
        return new Response($view);

    }

    public function editText(Request $request) : void
    {

        $title = $request->get('title');
        $message = $request->get('text');
        $author = $request->get('author');
        $published = $request->get('published');
        $id = $request->get('id');

        $text = TelegraphText::where('id', '=', $id)->first();
        $text->title = $title;
        $text->text = $message;
        $text->author = $author;
        $text->published = $published;

        $text->save();

    }

    public function deleteText($id) : void
    {

        TelegraphText::where('id', '=', $id)->delete();

    }

}
