@include('user.header')

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <h2 style="margin-bottom: 60px;">Your Abonnement</h2>
    <div class="row">
        @foreach($abonnements as $abonnement)
        <div class="col-md-4">
            <div class="card mb-4">
                @if($abonnement->LibelleS==='yoga')
                <img src="img/yoga.jpg" class="card-img-top" alt="...">
                @endif
                @if($abonnement->LibelleS==='fitness cardio')
                <img src="img/cardio.jpg" class="card-img-top" alt="...">
                @endif
                @if($abonnement->LibelleS==='Musculation')
                <img src="img/musculation.jpg" class="card-img-top" alt="...">
                @endif
                @if($abonnement->LibelleS==='karate')
                <img src="img/karate.jpg" class="card-img-top" alt="...">
                @endif
                @if($abonnement->LibelleS==='teakwando&judo')
                <img src="img/judo.jpg" class="card-img-top" alt="...">
                @endif
                @if($abonnement->LibelleS==='stretching')
                <img src="img/stretching.jpg" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <p class="card-text"><strong style="color:#ffb801;"> Abonnement name:</strong> {{ $abonnement->libelleAbo }}</p>
                    <p class="card-text"><strong style="color:#ffb801;">Sport:</strong> {{ $abonnement->LibelleS }}</p>
                    <p class="card-text"><strong style="color:#ffb801;">Price:</strong> {{ $abonnement->TarifMois }}</p>
                    <p class="card-text"><strong style="color:#ffb801;">Start date:</strong>{{ $abonnement->DateDebut }}</p>
                    <p class="card-text"><strong style="color:#ffb801;">End date:</strong>{{ $abonnement->endDate->format('Y-m-d') }}</p>
                    <p class="card-text"><strong style="color:#ffb801;">Duration:</strong> {{ $abonnement->DureeMois }} MONTH</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Blank End -->

@include('user.footer')
