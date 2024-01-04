<style>
    .demo
{
	padding: 50px 0;
}
.heading-title
{
	margin-bottom: 50px;
}

.pricingTable{
    border: 2px solid #e3e3e3;
    text-align: center;
    position: relative;
    padding-bottom: 40px;
    transform: translateZ(0px); background-color:#fff;
}

.pricingTable:before,
.pricingTable:after{
    content: "";
    position: absolute;
    top: -2px;
    left: -2px;
    bottom: -2px;
    right: -2px;
    z-index: -1;
    transition: all 0.5s ease 0s;
}

.pricingTable:before{
    border-right: 2px solid #fd4f04;
    border-left: 2px solid #fd4f04;
    transform: scaleY(0);
    transform-origin: 100% 0 0;
}

.pricingTable:after{
    border-bottom: 2px solid #fd4f04;
    border-top: 2px solid #fd4f04;
    transform: scaleX(0);
    transform-origin: 0 100% 0;
}

.pricingTable:hover:before{
    transform: scaleY(1);
}

.pricingTable:hover:after{
    transform: scaleX(1);
}

.pricingTable .pricingTable-header{

    position:relative;
        margin: 0px 0px 0px;
    padding: 15px 0;
}

.pricingTable .heading{
    font-size: 18px;
    font-weight: 600;
    margin: 0 0 5px 0;
    display: inline-block;
    padding: 8px 25px;
    background: #ffffff47;
    border-radius: 30px;
    letter-spacing: 0.8px;
    text-transform: uppercase;
}

.pricingTable .subtitle{
    font-size: 14px;
    display: block;
}

.pricingTable .price-value{
    font-size: 40px;
    font-weight: 600;
    margin-top: 0px;
    position: relative;
    display: inline-block;
}

.pricingTable .currency{
    font-size: 36px;
    font-weight: normal;
    position: absolute;
    top: 2px;
    left: -30px;
}

.pricingTable .month{
    font-size: 16px;
    position: absolute;
    bottom: 17px;
    right: -40px;
}

.pricingTable .pricing-content{
    list-style: none;
    padding: 0;
    margin-bottom: 30px;
}

.pricingTable .pricing-content li{
    font-size: 15px;
    color: #222;
    line-height: 23px;font-weight:500;
      padding: 5px 16px;text-align: left; position:relative;padding-left:30px;
}
.pricingTable .pricing-content li:before{content:"";font-family:'FontAwesome'; width:15px; height:15px; background-size:cover; float: left;color: #08345a;background-image:url('front_assets/assets/img/checkicon.png'); position: absolute;top: 7px; left: 10px;}

.pricingTable button[type=submit]{background-color: #ffffff !important;
    padding: 8px 20px !important;
    color: #1b91fe;
    border: 2px solid #1b91fe;    font-weight: 700;}

.pricingTable .pricing-content li:nth-child(odd) {
    background: #fff;
}
.pricingTable .read{
    display: inline-block;
    border: 2px solid #7a7e82;
    border-right: none;
    font-size: 14px;
    font-weight: 700;
    color: #7a7e82;
    padding: 9px 30px;
    position: relative;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
}

.pricingTable .read:hover{
    border-color: #08c6aa;
    color: #08c6aa;
}

.pricingTable .read i{
    font-size: 19px;
    margin-top: -10px;
    position: absolute;
    top: 50%;
    right: 15px;
    transition: all 0.3s ease 0s;
}

.pricingTable .read:hover i{
    right: 5px;
}

.pricingTable .read:before,
.pricingTable .read:after{
    content: "";
    display: block;
    height: 30px;
    border-left: 2px solid #7a7e82;
    position: absolute;
    right: -11px;
    transition: all 0.3s ease 0s;
}

.pricingTable .read:before{
    bottom: -6px;
    transform: rotate(45deg);
}

.pricingTable .read:after{
    top: -6px;
    transform: rotate(-45deg);
}

.pricingTable .read:hover:before,
.pricingTable .read:hover:after{
    border-left-color: #08c6aa;
}
.btn.btn-success{
    background-color:#23b574 !important;
}
#priceingtable{position:relative;}
#priceingtable:before{position:absolute; content:''; background-image:url('front_assets/assets/img/pricebanner.png'); background-size:cover; width:100%; height:760px; top: 0; left: 0;}
#priceingtable .main-title {    position: relative;}
#priceingtable .main-title h4{font-size: 45px;color: #212a32;}
.packageimage img {width: 180px;margin: auto;}




@media screen and (max-width: 990px){
    .pricingTable{ margin-bottom: 25px; }
}

</style>
<div class="demo" id="priceingtable">
        <div class="container">
            <div class="row text-center">
                <div class="main-title">
                <h4>Subscription Plans</h4>
                </div>
            </div>
            
            
            <div class="row">
            @foreach($subscription as $plan)
            @if($plan->parent_id ==NULL)
            @if($plan->status==1)




                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="pricingTable">
                        <div class="pricingTable-header">
                            <h3 class="heading">{{$plan->s_name}}</h3>
                            <div class="packageimage"><img src="{{asset('/subscription_image/'.$plan->	subscription_image)}}"></div>
                            <span class="subtitle"></span>
                            <div class="price-value">{{$plan->price}}
                                <span class="currency">$</span>
                                <span class="month">/mo</span>
                            </div>
                        </div>
                        <!-- <ul class="pricing-content"> -->
                            {!! $plan->description !!}
                            <!-- <li>50 Email Accounts</li>
                            <li>50GB Monthly Bandwidth</li>
                            <li>10 Subdomains</li>
                            <li>15 Domains</li>
                        </ul> -->
                        <form action="{{route('subscription.select-plan')}}" method="POST">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{$plan->sid}}">
                            <button type="submit" class="btn btn-plan">Select Plan</button>
                        </form>
                        
                    </div>
                </div>
                @endif
                @endif
                @endforeach
            </div>
        </div>
    </div>