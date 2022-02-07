@extends('common.master')

@section('main')
    <div class="content-start">

        <div class="article-detail">
            <div class="image">
                @foreach($randomPicture as $picture)
                    <img src="data:image/jpeg;base64,{{base64_encode($picture->picture)}}" alt="">
                @endforeach
            </div>


            <div class="description">

                <h3>Niečo o nás</h3>

                <p>Náš portál ponúka návštevníkom tie najlepšie tipy kam na výlet na Slovensku.
                    Aj pomocou vás, našich návštevníkov, neustále vylepšujeme a rozširujeme našu databázu výletov a
                    podporujeme
                    tak slovenský cestovný ruch.</p>

                <h3>Zaregistrujte sa</h3>

                <p>Pre úplnú funkcionalitu našej stránky je potrebné mať vytvorený účet a byť prihlásený. Následne môžte
                pridávať a komentovať články či túry.</p>

                <h3>Kontakt</h3>

                <address>
                    Vytvoril <a href="mailto:webmaster@example.com">Miroslav Gajda</a>.<br>
                    Example.com<br>
                    Box 564, Disneyland<br>
                    USA
                </address>
            </div>



@endsection
