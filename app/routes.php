<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('cover');
});

Route::get('book2',function(){

    $book = file_get_contents(public_path().'/book.json');

    $book = json_decode($book);

    $pages = array();

    $index = 0;

    foreach($book->contents as $c){
        $n = str_replace('.html', '', $c);
        $pages[] = $n;
    }


    return View::make('fbook')->with('pages',$pages)
            ->with('meta', $book->metadata);
});

Route::get('cover',function(){
    $book = file_get_contents(public_path().'/book.json');
    $book = json_decode($book);

    $pages = $book->contents;

    $index = 0;
    foreach($book->contents as $c){
        $n = str_replace('.html', '', $c);

        if($n == 'cover'){
            $m = $pages[$index + 1];
            $firstchapter = str_replace('.html', '', $m);
        }

        $index++;
    }


    return View::make('cover')->with('firstchapter','chapter/'.$firstchapter);
});

Route::get('chapter/{name}',function($name = null){

    $book = file_get_contents(public_path().'/book.json');

    $book = json_decode($book);

    $pages = array();

    $current = 0;

    $index = 0;

    foreach($book->contents as $c){
        $n = str_replace('.html', '', $c);

        $pages[] = $n;

        if($n == $name){
            $current = $index;
        }

        $index++;

    }

    if($current == 0){
        $prev = 'chapter/'.$pages[$current];
        $next = 'chapter/'.$pages[$current + 1];
    }else if($current == count($pages) - 1){
        $prev = 'chapter/'.$pages[$current - 1];
        $next = 'chapter/'.$pages[$current];
    }else{
        $prev = 'chapter/'.$pages[$current - 1];
        $next = 'chapter/'.$pages[$current + 1];
    }

    if($prev == 'chapter/cover'){
        $prev = 'toc';
    }


    return View::make('chapters.page' )
        ->with('pages',$pages)
        ->with('current',$current)
        ->with('prev',$prev)
        ->with('next',$next)
        ->with('meta', $book->metadata)
        ;
});

Route::get('toc',function($name = null){

    $book = file_get_contents(public_path().'/book.json');

    $book = json_decode($book);

    $pages = array();

    $current = 0;

    $index = 0;

    foreach($book->contents as $c){
        $n = str_replace('.html', '', $c);

        $pages[] = $n;

        if($n == $name){
            $current = $index;
        }

        $index++;

    }

    if($current == 0){
        $prev = 'chapter/'.$pages[$current];
        $next = 'chapter/'.$pages[$current + 1];
    }else if($current == count($pages) - 1){
        $prev = 'chapter/'.$pages[$current - 1];
        $next = 'chapter/'.$pages[$current];
    }else{
        $prev = 'chapter/'.$pages[$current - 1];
        $next = 'chapter/'.$pages[$current + 1];
    }

    if($prev == 'chapter/cover' || $prev == 'chapter/preface'){
        $prev = 'toc';
    }

    return View::make('toc' )
        ->with('pages',$pages)
        ->with('current',$current)
        ->with('prev',$prev)
        ->with('next',$next)
        ->with('meta', $book->metadata)
        ;
});


