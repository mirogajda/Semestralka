@extends("layouts.master")
@section("obsah")

    <div class="hlavnyObsah2">
        <h3>Tipy na výlet</h3>
        <p class="popis2">Prekrásne lesy, dych vyrážajúce výhľady, malebné scenérie - to všetko si budete môcť vychutnať pri
            potulkách
            slovenskými horami. Nič nie je krajšie ako ticho a pokoj, ukryté v tajomnej kráse nespútanej prírody. Aj preto
            turistika na Slovensku neláka len domácich, ale aj zahraničných návštevníkov. Máte chuť vyraziť na víkend do
            hôr?
            Chcete si vychutnať čerstvý vzduch s krásnymi túrami po slovenských pohoriach? V tom prípade sme práve pre vás
            pripravili rady a nápady na najkrajšie miesta pre turistiku na Slovensku. </p>

        <h4>Vyberte si kraj</h4>

        <table class="tabulkaKraj" style="overflow-x:auto;">
            <tr>
                <th colspan="4">Kraj</th>
            </tr>
            <tbody>
            <tr>
                <td><a class="link2" href="{{route("homePage")}}">Bratislavký</a></td>
                <td><a class="link2" href="{{route("homePage")}}">Trnavský</a></td>
                <td><a class="link2" href="{{route("homePage")}}">Trenčiansky</a></td>
                <td><a class="link2" href="{{route("homePage")}}">Nitriansky</a></td>
            </tr>
            <tr>
                <td><a class="link2" href="{{route("homePage")}}">Žilinský</a></td>
                <td><a class="link2" href="{{route("homePage")}}">Banskobystrický</a></td>
                <td><a class="link2" href="{{route("homePage")}}">Prešovský</a></td>
                <td><a class="link2" href="{{route("homePage")}}">Košický</a></td>
            </tr>
            </tbody>
        </table>

        <p class="popis3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis arcu mi. Duis malesuada augue eu ipsum
            hendrerit, in porta tellus tincidunt. Nulla iaculis, mauris sit amet maximus mattis, tellus nisi ultrices odio,
            nec eleifend purus tellus ac lectus. Maecenas sit amet vestibulum sapien, vitae accumsan elit. Pellentesque
            habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris lobortis a risus a
            vulputate. Praesent at vulputate lectus. Pellentesque bibendum consequat efficitur. Cras euismod, elit id tempus
            semper, nibh quam posuere tortor, in laoreet nulla ligula sit amet tortor. Suspendisse potenti. Donec ornare,
            odio eu hendrerit bibendum, odio nulla feugiat ipsum, in condimentum lorem leo et enim. Integer ultrices
            fringilla laoreet. Vestibulum leo mauris, maximus a velit quis, placerat feugiat nulla. Cras at nunc ligula.
            Aliquam gravida felis id eros venenatis convallis. Nulla facilisi.

            Fusce eget metus quis felis commodo auctor. Suspendisse et ex at urna sollicitudin luctus. Quisque interdum
            felis sit amet urna semper rhoncus. Curabitur interdum facilisis odio, eu imperdiet erat fringilla vitae. Mauris
            vel diam est. Mauris eget ex id velit dapibus ornare. Suspendisse non elit metus.

            Mauris in lectus ut odio aliquet tempor et et ligula. Vestibulum rhoncus pellentesque dui, at vestibulum mauris
            mattis bibendum. Nulla vitae sodales nisi, et tincidunt libero. Donec id consequat purus, nec semper ante. Etiam
            lorem ligula, gravida et turpis eget, dignissim tincidunt est. Aliquam scelerisque scelerisque dolor semper
            luctus. Suspendisse mi enim, molestie eu eros in, pretium pulvinar arcu. Curabitur ut hendrerit metus, ac
            posuere lorem. Quisque et nunc at odio cursus tincidunt. Nunc faucibus tristique nunc at malesuada. Mauris
            consequat turpis non tempor pulvinar.</p>
    </div>


@endsection



