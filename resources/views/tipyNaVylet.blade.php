@extends("layouts.master")
@section("obsah")

    <div class="logContainer">
    <div class="hlavnyObsah2">
        <h3>Tipy na výlet</h3>
        <p class="popis2">Prekrásne lesy, dych vyrážajúce výhľady, malebné scenérie - to všetko si budete môcť vychutnať
            pri
            potulkách
            slovenskými horami. Nič nie je krajšie ako ticho a pokoj, ukryté v tajomnej kráse nespútanej prírody. Aj
            preto
            turistika na Slovensku neláka len domácich, ale aj zahraničných návštevníkov. Máte chuť vyraziť na víkend do
            hôr?
            Chcete si vychutnať čerstvý vzduch s krásnymi túrami po slovenských pohoriach? V tom prípade sme práve pre
            vás
            pripravili rady a nápady na najkrajšie miesta pre turistiku na Slovensku. </p>

        <h4>Vyberte si kraj</h4>

        <table class="tabulkaKraj" style="overflow-x:auto;">
            <tr>
                <th colspan="4">Kraj</th>
            </tr>
            <tbody>
            <tr>
                @for($i = 0; $i < 4; $i++)
                    <td>
                        <a class="link2" href="/clanky/{{$regions[$i]->tag}}">{{$regions[$i]->name}}</a>
                    </td>
                @endfor
            </tr>
            <tr>
                @for($i = 4; $i < 8; $i++)
                    <td>
                        <a class="link2" href="/clanky/{{$regions[$i]->tag}}">{{$regions[$i]->name}}</a>
                    </td>
                @endfor
            </tr>
            </tbody>
        </table>

    </div>
    </div>

@endsection



