@extends('front.layouts.master')

@section('title', "Select Plan")

@section('content')
<style>
.choose-period {
    padding: 50px 0;
}
.card-period {
    border: 2px solid #e3e3e3;
    padding: 24px;
    box-shadow: 0 0 16px rgba(0,0,0,.08);
}
.card-period {
    text-align: center;
         transition: box-shadow 0.3s;
        cursor: pointer;
}

.check span {
    font-size: 16px;
    color: #1b91fe;
    line-height: 40px;font-weight: 600;
}
.currency h2 {
    font-weight: 700;
    font-size: 42px;
    line-height: 56px;
    margin-bottom: 0px;
}
.currency {
    margin-top: 20px;
}
.choose-period h1 {
    text-align: center;
    color: #212a32; font-size:45px;font-weight:600;
    margin-bottom: 40px;
}
.currency p {
    font-size: 17px;
    color: #7a7e82;}
.bottom-detail p small {
    font-size: 14px;
    color: #222;
}    

    .card-period:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

@media only screen and (max-width: 768px){
   .card-period {
    margin-bottom: 20px;
} 
}</style>



<div class="choose-period">
    <div class="container">
        <h1>Choose a period</h1>
        <div class="box">
            <div class="row">
                <!-- {{  session('selected_plan')}} -->
                @foreach($selectedPlan as $plandata)
                    <div class="col-md-3">
                        <div class="card-period selectplanbox" onclick="selectPlan('{{$plandata->sid}}', '{{$plandata->price}}')">
                            @if(!empty($plandata->original_price) && !empty($plandata->discount))
                            <h5><del>${{$plandata->original_price}}</del></h5> SAVE {{$plandata->discount}}
                            @else
                            
                            @endif
                            <div class="currency">
                                <h2>${{round($plandata->price)}}</h2>
                                <p> / {{$plandata->s_name}} Month</p>
                            </div>
                            <div class="bottom-detail">
                                <p><small>Plan renews at ${{ round($plandata->price) }}/{{$plandata->s_name}} Month</small></p>
                            </div>
                            <div class="check">
                                <input type="radio" name="selected_plan" value="{{$plandata->sid}}" style="display: none;">
                                <span>Click to Select</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    function selectPlan(selectedPlanId, selectedPlanPrice) {
        // Send AJAX request to the server
        $.ajax({
            url: '{{route("company.check-plan-data")}}',
            method: 'POST',
            data: {
                plan_id: selectedPlanId,
                plan_price: selectedPlanPrice,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response.success);
                // Redirect to the create account page
                window.location.href = response.redirect_url;
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
</script>


@endsection