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

Route::get('flat',function(){

    $book = file_get_contents(public_path().'/book.json');

    $book = json_decode($book);

    $pages = array();

    $current = 0;

    $index = 0;

    //$pages[] = 'cover';
    //$pages[] = 'toc';

    foreach($book->contents as $c){
        $n = str_replace('.html', '', $c);

        $pages[] = $n;

        $index++;

    }

    for($i = 0; $i < count($pages);$i++){

        $page = $pages[$i];

        $current = $i;

        if($current == 0){
            $prev = $pages[$current];
            $next = $pages[$current + 1];
        }else if($current == count($pages) - 1){
            $prev = $pages[$current - 1];
            $next = $pages[$current];
        }else{
            $prev = $pages[$current - 1];
            $next = $pages[$current + 1];
        }


        if( $page == 'toc' ){
            return View::make('toc' )
                ->with('pages',$pages)
                ->with('current',$current)
                ->with('prev',$prev.'.html')
                ->with('next',$next.'.html')
                ->with('meta', $book->metadata)
                ;

        }elseif( $page == 'cover'){
           $firstchapter = 'preface.html';

           $fpage = View::make('cover')->with('firstchapter',$firstchapter);

        }else{
            $fpage = View::make('chapters.page' )
                ->with('pages',$pages)
                ->with('current',$current)
                ->with('prev',$prev.'.html')
                ->with('next',$next.'.html')
                ->with('meta', $book->metadata);
        }

        $fpage = str_replace('/toc', '/toc.html', $fpage);
        $fpage = str_replace('/cover', '/cover.html', $fpage);
        $fpage = str_replace(URL::to('/').'/', '', $fpage);

        file_put_contents(public_path().'/book/'.$pages[$i].'.html', $fpage);

    }


    $fpage = View::make('toc' )
            ->with('flat',true)
            ->with('pages',$pages)
            ->with('current',0)
            ->with('prev','toc')
            ->with('next','preface.html')
            ->with('meta', $book->metadata);

    $fpage = str_replace('/toc', '/toc.html', $fpage);
    $fpage = str_replace('/cover', '/cover.html', $fpage);
    $fpage = str_replace(URL::to('/').'/', '', $fpage);

    file_put_contents(public_path().'/book/toc.html', $fpage);



    $firstchapter = 'preface.html';
    $fpage = View::make('cover')->with('firstchapter',$firstchapter);

    $fpage = str_replace('/toc', '/toc.html', $fpage);
    $fpage = str_replace('/cover', '/cover.html', $fpage);
    $fpage = str_replace(URL::to('/').'/', '', $fpage);

    file_put_contents(public_path().'/book/cover.html', $fpage);


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

    $firstchapter = 'preface';

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
        ->with('flat',false)
        ->with('pages',$pages)
        ->with('current',$current)
        ->with('prev',$prev)
        ->with('next',$next)
        ->with('meta', $book->metadata)
        ;
});


