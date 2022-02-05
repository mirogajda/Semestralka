@extends('common.master')

@section('main')
    <h3>Niečo o nás</h3>
    <p>Náš portál ponúka návštevníkom tie najlepšie tipy kam na výlet na Slovensku.
        Aj pomocou vás, našich návštevníkov, neustále vylepšujeme a rozširujeme našu databázu výletov a podporujeme
        tak slovenský cestovný ruch.</p>
    <h3>Kontakt</h3>
    <div class="mapa">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3315.008402642062!2d-117.92116288505957!3d33.812096237794975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80dcd7d12b3b5e6b%3A0x2ef62f8418225cfa!2sDisneyland%20Park!5e0!3m2!1sen!2ssk!4v1634672958754!5m2!1sen!2ssk"
            width="600" height="450" style="border:0;" allowfullscreen></iframe>
    </div>
    <address>
        Vytvoril <a href="mailto:webmaster@example.com">Miroslav Gajda</a>.<br>
        Example.com<br>
        Box 564, Disneyland<br>
        USA
    </address>
@endsection
