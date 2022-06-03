@extends('site.app')
@section('title')  @endsection
@section('content')

<section class="quotesBody">
    @if (count($resp) > 0)
        <div class="container">
            <div class="quotesBody__top">
                <a href="{{route('get-quotes')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Back to get Quotes</a>
                <h1 class="mb-0">We found something for you!</h1>
            </div>
            <div class="quotesBody__bottom">
                <!-- <p>Data matched for postcode for {{$queryRFQ->postcode}}, time frame {{$queryRFQ->time_frame}}, budget {{$queryRFQ->budget}} & category {{$queryRFQ->category}} !</p> -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row mb-4 quotes__cardWrap">
                            @foreach ($resp as $itemKey => $itemVal)
                                <div class="col-md-4 jQueryEqualHeight">
                                    <div class="quotes__card card">
                                        <div class="card-body">
                                            <!-- <img src="{{asset($itemVal->image)}}" alt="" class="w-100"> -->
                                            <div class="card-title">{{$itemVal->name}}</div>
                                            <div class="card-text">
                                                <a href="tel:">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                021255587</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="quotesService_card">
                            <div class="quotesService_top" style="background-image: url(https://hiring-assets.careerbuilder.com/media/attachments/careerbuilder-original-3580.jpg?1511294086);">
                                <div class="quotesService_top_text">
                                    <h4>{{$queryRFQ->category}}</h4>
                                    <p class="mb-0">24 May 2022, Sydney</p>
                                </div>
                            </div>
                            <div class="quotesService_middle">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Category:</strong>
                                            </td>
                                            <td align="right">{{$queryRFQ->category}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Location:</strong>
                                            </td>
                                            <td align="right">Sydney, 2000</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Start by:</strong>
                                            </td>
                                            <td align="right">Within a few days</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="quotesService_bottom">
                                <div class="quotesService_bottom_des">
                                    <h6>Description:</h6>
                                    <p>I am test</p>
                                </div>
                                <div class="quotesService_bottom_myde">
                                    <h6>My details:</h6>
                                    <p class="mb-0">Danger<br>
                                    0298765432<br>
                                    test@gmail.com</p>
                                </div>
                            </div>
                            <div class="seeMoreWrap d-flex justify-content-end">
                                <span class="seeMore">
                                    See More
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="container">
        <div class="quotesNotFound">
            <h1>We could not find anything!</h1>
            <div class="quotesNotFound_text">
                <p>No data matched for postcode for {{$queryRFQ->postcode}}, time frame {{$queryRFQ->time_frame}}, budget {{$queryRFQ->budget}} & category {{$queryRFQ->category}} !</p>
            </div>
            <div class="button-list mb-4 text-center">
                <li style="display: flex;justify-content: center;">
                    <a href="{{route('get-quotes')}}" class="">Try again</a>
                </li>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
