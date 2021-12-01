@extends("layouts.master")
@section("obsah")

<div class="hlavnyObsah">
    <h1>
        Spoznajte krásy Slovenska
    </h1>
    <p class="popis1">
        Spoznajte krásy Slovenska a podeľte sa s nimi s ostatnými. Hľadáte inšpiráciu na výlet alebo ste nejaký výlet
        absolvovali a chcete ho zdieľať s ďalšími turistami? Ak áno, ste na správnom mieste. Prešli
        sme pre vás tie najzaujímavejšie miesta na Slovensku, ktoré odporúčame navštíviť.
        Vrchy, kopce, štíty, rozhľadne, doliny, náučné chodníky, vyhliadky, plesá, chaty, cyklotrasy, hrady, zámky,
        pamiatky – to všetko objavujte.
        Naplánujte si voľný deň, alebo víkend a poďte s nami na výlet.
    </p>

    <h2>
        Najobľúbenejšie miesta
    </h2>

    <div class="oblubeneMiesta">
        <div class="oblubeneMiesto">

            <img class="obrazok" alt="Štrbské pleso"
                 src="https://www.tatry.sk/wp-content/uploads/2020/03/Silvio-Pa%C5%A1mik_%C5%A0trbsk%C3%A9-pleso-2-1024x576.jpg"
            >

            <a class="link" href="{{route("tipyNaVyletPage")}}">Štrbské pleso</a>
        </div>
        <div class="oblubeneMiesto">
            <img class="obrazok" alt="Lietavský hrad"
                 src="https://www.kamnavylety.sk/wp-content/uploads/2018/05/lietavsky-hrad.jpg">
            <a class="link" href="{{route("tipyNaVyletPage")}}">Lietavský hrad</a>
        </div>

        <div class="oblubeneMiesto">
            <img class="obrazok" alt="Lúčanský vodopád"
                 src="https://www.visitliptov.sk/wp-content/uploads/2021/05/140615_Lucky_vodopad.jpg">
            <a class="link" href="{{route("tipyNaVyletPage")}}">Lúčanský vodopád</a>
        </div>

    </div>

    <div class="oblubeneMiesta">
        <div class="oblubeneMiesto">

            <img class="obrazok" alt="Belianska jaskyňa"
                 src="https://www.lexikon.sk/wp-content/uploads/2019/07/Belianska-jasky%C5%88a4-750x375@2x.jpg"
            >

            <a class="link" href="{{route("tipyNaVyletPage")}}">Belianska jaskyňa</a>
        </div>
        <div class="oblubeneMiesto">
            <img class="obrazok" alt="Zelené pleso"
                 src="https://slovenskycestovatel.sk/images/items/1863/zelene-pleso37127488.jpg">
            <a class="link" href="{{route("tipyNaVyletPage")}}">Zelené pleso</a>
        </div>

        <div class="oblubeneMiesto">
            <img class="obrazok" alt="Rysy"
                 src="https://www.tatryportal.sk/wp-content/uploads/2019/07/2019-06-29-12.48.21.jpg">
            <a class="link" href="{{route("tipyNaVyletPage")}}">Rysy</a>
        </div>

    </div>
</div>


@endsection



