@extends('site.app')
@section('title')  @endsection
@section('content')

<section class="inner_banner questionBanner">
    <div class="container">
        <div class="questionBanner_text">
            <h1>
                We have trades ready to help you with your job.
            </h1>
            <div class="searchCard">
                <form action="">
                    <label>What do you need help with?</label>
                    <div class="searchCard_form">
                        <input class="form-control" type="text" name="search_category" placeholder="e.g. Decoration">
                        <button type="button" class="searchCard_formBtn btn">Get Quotes</button>
                        <div id="cat-result" class="dropdown-menu"></div>
                    </div>
                </form>
            </div>
            <div class="questionBanner_text_bottom">
                <h3>How can you best protect yourself while getting a job done?</h3>
                <p>We understand that these are uncertain times, and the safety of our consumers and tradies is of greatest importance. Before your job starts, ensure you and your tradie are both agreed on the recommended safety measures you will both take. And if you or anyone in your household is feeling unwell, consider posting the job at a later date.</p>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModal" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="questionModalLabel"></h5>
                <button type="button" class="close openAlertModal" data-toggle="modal" data-target="#questionAlertModal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('get-quotes.submit') }}" method="POST">
                    @php
                        $trade_questions = \Illuminate\Support\Facades\DB::table('local_trade_questions')->orderBy('position', 'asc')->get();
                    @endphp

                    @foreach ($trade_questions as $questionKey => $questionValue)
                    <div class="questionSetItem">
                        <div class="questionSetItem_box">
                            <h4>{{$questionValue->question}}</h4>
                            @switch($questionValue->type)
                                @case('text')
                                    <input type="text" placeholder="" name="{{$questionValue->name}}">
                                    @break
                                @case('select')
                                    <select class="form-control" name="{{$questionValue->name}}">
                                        @php
                                            $valArr = explode(', ', $questionValue->answer);
                                        @endphp
                                        @foreach ($valArr as $item)
                                        <option value="{{$item}}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                    @break
                                @case('textarea')
                                    <textarea placeholder="Enter Text" class="form-control" name="{{$questionValue->name}}"></textarea>
                                    @break
                                @case('radio')
                                    <div class="questionSetItem_box questionSetItem_box_options">
                                        @php
                                            $valArr = explode(', ', $questionValue->answer);
                                        @endphp
                                        @foreach ($valArr as $itemKey => $itemVal)
                                        <div class="questionSetItem_box_options_radio">
                                            <input class="form-check-input" type="radio" name="{{$questionValue->name}}" value="{{$itemVal}}" id="flexRadioDefault{{$itemKey}}" {{ ($itemKey == 0) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexRadioDefault{{$itemKey}}">
                                                {{$itemVal}}
                                            </label>
                                        </div>
                                        @endforeach
                                        {{-- <div class="questionSetItem_box_options_radio">
                                            <input class="form-check-input" type="radio" name="budget" value="Less than $500" id="flexRadioDefault1" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                < $500
                                            </label>
                                        </div>
                                        <div class="questionSetItem_box_options_radio">
                                            <input class="form-check-input" type="radio" name="budget" value="$501 - $1,000" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                $501 - $1,000
                                            </label>
                                        </div>
                                        <div class="questionSetItem_box_options_radio">
                                            <input class="form-check-input" type="radio" name="budget" value="$1,001 - $2,500" id="flexRadioDefault3">
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                $1,001 - $2,500
                                            </label>
                                        </div>
                                        <div class="questionSetItem_box_options_radio">
                                            <input class="form-check-input" type="radio" name="budget" value="$2,501 - $5,000" id="flexRadioDefault4">
                                            <label class="form-check-label" for="flexRadioDefault4">
                                                $2,501 - $5,000
                                            </label>
                                        </div>
                                        <div class="questionSetItem_box_options_radio">
                                            <input class="form-check-input" type="radio" name="budget" value="$5,001 - $10,000" id="flexRadioDefault5">
                                            <label class="form-check-label" for="flexRadioDefault5">
                                                $5,001 - $10,000
                                            </label>
                                        </div>
                                        <div class="questionSetItem_box_options_radio">
                                            <input class="form-check-input" type="radio" name="budget" value="$10,000+" id="flexRadioDefault6">
                                            <label class="form-check-label" for="flexRadioDefault6">
                                                $10,000+
                                            </label>
                                        </div> --}}
                                    </div>
                                    @break
                                @default

                            @endswitch
                        </div>
                        <div class="d-flex {{($questionKey == 0) ? 'justify-content-end' : 'justify-content-between'}}">
                            @if ($questionKey == 0)
                                <button type="button" class="questionSetItemButton">Next</button>
                            @elseif ($questionKey + 1 == count($trade_questions))
                                <button type="button" class="questionSetItemButtonPrev">Prev</button>
                                <input type="hidden" name="category" value="">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="questionSetItemButtonSubmit">Submit</button>
                            @else
                                <button type="button" class="questionSetItemButtonPrev">Prev</button>
                                <button type="button" class="questionSetItemButton">Next</button>
                            @endif
                        </div>
                    </div>
                    @endforeach

                    {{-- <div class="questionSetItem">
                        <div class="questionSetItem_box">
                            <h4>What is your postcode?</h4>
                            <input type="text" placeholder="" name="postcode">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="questionSetItemButton">Next</button>
                        </div>
                    </div>

                    <div class="questionSetItem">
                        <div class="questionSetItem_box">
                            <h4>What are your timeframes for the job?</h4>
                            <select class="form-control" name="time_frame">
                                <option value="Today">Today</option>
                                <option value="Tomorrow">Tomorrow</option>
                                <option value="2-7 days">2-7 days</option>
                                <option value="8-14 days">8-14 days</option>
                                <option value="15-30 days">15-30 days</option>
                                <option value="1-2 months">1-2 months</option>
                                <option value="2 months+</">2 months+</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="questionSetItemButtonPrev">Prev</button>
                            <button type="button" class="questionSetItemButton">Next</button>
                        </div>
                    </div>

                    <div class="questionSetItem">
                        <div class="questionSetItem_box">
                            <h4>Provide more details for your job</h4>
                            <textarea placeholder="Enter Text" class="form-control" name="job_details"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="questionSetItemButtonPrev">Prev</button>
                            <button type="button" class="questionSetItemButton">Next</button>
                        </div>
                    </div>

                    <div class="questionSetItem">
                        <div class="questionSetItem_box">
                            <h4>What is your budget?</h4>
                            <div class="questionSetItem_box questionSetItem_box_options">
                                <div class="questionSetItem_box_options_radio">
                                    <input class="form-check-input" type="radio" name="budget" value="Less than $500" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        < $500
                                    </label>
                                </div>
                                <div class="questionSetItem_box_options_radio">
                                    <input class="form-check-input" type="radio" name="budget" value="$501 - $1,000" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        $501 - $1,000
                                    </label>
                                </div>
                                <div class="questionSetItem_box_options_radio">
                                    <input class="form-check-input" type="radio" name="budget" value="$1,001 - $2,500" id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        $1,001 - $2,500
                                    </label>
                                </div>
                                <div class="questionSetItem_box_options_radio">
                                    <input class="form-check-input" type="radio" name="budget" value="$2,501 - $5,000" id="flexRadioDefault4">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        $2,501 - $5,000
                                    </label>
                                </div>
                                <div class="questionSetItem_box_options_radio">
                                    <input class="form-check-input" type="radio" name="budget" value="$5,001 - $10,000" id="flexRadioDefault5">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        $5,001 - $10,000
                                    </label>
                                </div>
                                <div class="questionSetItem_box_options_radio">
                                    <input class="form-check-input" type="radio" name="budget" value="$10,000+" id="flexRadioDefault6">
                                    <label class="form-check-label" for="flexRadioDefault6">
                                        $10,000+
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="questionSetItemButtonPrev">Prev</button>
                            <input type="hidden" name="category" value="">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="questionSetItemButtonSubmit">Submit</button>
                        </div>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="questionAlertModal" tabindex="-1" aria-labelledby="questionAlertModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-4 text-center">
                    <h4>Are you sure you want to leave?</h4>
                    <p>Closing this form will erase all the answers you’ve provided.</p>
                </div>
                <div class="d-flex justify-content-between questionAlertModalButton">
                    <button type="button" class="btn leaveBtn" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Leave</button>
                    <button type="button" class="btn stayBtn" data-dismiss="modal">Stay and Post Your Job</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // category search
            $('input[name="search_category"]').on('keyup', function() {
                $.ajax({
                    url: '{{route("get-quotes.category")}}',
                    type: 'POST',
                    data: {_token: "{{csrf_token()}}", data: $(this).val()},
                    success: function(result) {
                        var successContent = '';
                        if (result.type == "success") {
                            $.each(result.data, (key, value) => {
                                successContent += `<a class="dropdown-item" href="javascript: void(0)">${value.title}</a>`;
                            });
                            $('#cat-result').html(successContent).addClass('show');
                        } else {
                            successContent += `<h6 class="dropdown-header">Please try again!</h6>`;
                            $('#cat-result').html(successContent).addClass('show');
                        }
                    }
                });
            });

            // show cat result on input type
            $(document).on('click', '#cat-result .dropdown-item', function() {
                var data = $(this).text();
                $('input[name="search_category"]').val(data);
                $('#cat-result').removeClass('show');

                $('.searchCard_formBtn').on('click', function() {
                    var cat = $('input[name="search_category"]').val();
                    if (cat.length > 0) {
                        $('input[name="category"]').val(cat);
                        $('#questionModal').modal('show');
                    }
                });
            });

            $('#questionModal').on('shown.bs.modal', function (e) {
                $('input[name="postcode"]').focus();
            })
        });
    </script>
@endpush
