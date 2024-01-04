@extends('frontend.layouts.master')

@section('title', 'Resource Skill CheckList')

@section('content')



      <div class="checklistback">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="content-part">
                            <h1>SKILLS <span>CHECKLISTS</span></h1>
                            <p>Are you interested in pursuing a career as a traveler, but don’t know what skills are necessary? Or are you a seasoned traveler and want to see if your skills align with another specialty?</p>
                             <p>The links below allow you to browse and complete as many nursing and allied skills checklists as you choose!</p>  
                            <div class="taeled-btn checklist text-center position-relative text-uppercase">
                                <a href="#">Get a Checklist Now <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>    
                    </div> 
                    <div class="col-md-6">
                        <div class="baner1">
                            <img src="{{ asset('front_assets/assets/img/skills.png')}}">
                        </div>  
                    </div>    
                </div>    
            </div>    
        </div> 



        <section class="welcome2 check2">
            <div class="container">
                <div class="row">
                      <div class="col-md-6">
                        <img src="{{ asset('front_assets/assets/img/check.png')}}">
                    </div> 
                    <div class="col-md-6">
                        <h2>The Significance Of The Travel <span>Nurse Skills Checklist</span></h2>
                        <p>Skills checklists help you and your recruiter identify your skills and experience level. They are important because ultimately, they will help your recruiter find you the perfect assignment. </p>
                        <p>When applying for a travel assignment, your recruiter will share your checklist with the hiring manager. The hiring manager uses this as a tool to make sure your experience matches the patients’ and unit’s needs. Thus, when completing the checklist, it’s in your best interest to be truthful about your skill level.</p>
                       
                    </div>
                     
                </div>    
            </div>    
        </section>


     <section class="checklist-btn">
        <div class="container">
            <div class="row">
                @foreach ($skillCat as $index => $data)
                <div class="col-md-4">
                    <div class="check-part-btn">
                    <a href="#{{$data->slug}}">{{$data->name}}</a>
                    </div>
                </div>  
            @if ($index === 0)
                @php
                    $firstChecklist = $data;
                @endphp
            @elseif ($index === 1)
                @php
                    $secondChecklist = $data;
                @endphp

            @elseif ($index === 2)
                @php
                    $thirdChecklist = $data;
                @endphp
            @endif
                @endforeach  

                
            </div>    
        </div>    
    </section> 
    <section class="cecklist-part">
        <div class="container">
            <div class="search-part">
                <input type="search" id="checklistSearch" placeholder="Nursing Checklist Skills">
             </div>   
                <div class="nusrisng" id="{{ $firstChecklist['slug'] }}">

                   <h2>Nursing Skills <span>Checklists</span></h2>
                   <p>See if your skills match our specialties by clicking the links below. We know nurses and allied professionals often have many specialties, so you may complete as many as you like!</p>
                   <div class="jetboost-list-wrapper-o1n6 nursing-skills-checklist-collection w-dyn-list">
                      <div role="list" class="nursing-skills-checklist-list checklist-item w-dyn-items">
                       

                        @foreach($firstChecklist->units as $index_1 => $fdata)
                         <div role="listitem" class="nursing-skills-checklist-list_item w-dyn-item">
                            <div class="nursing-skills-checklist_jetboost-embed w-embed"><input type="hidden" class="jetboost-list-item" value="cardiovascular-operating-room-circulate-scrub-cvor-skills-checklist"></div>
                            <a href="{{ url('checklist-item-' .$fdata->cid. '-' .($fdata->iid)) }}"
                                     target="_blank" class="nursing-skills-checklist_link w-inline-block">
                               <div>{{$fdata->unit_name}}</div>
                            </a>
                         </div>
                         @endforeach
                      </div>
                   </div>
                </div>
                <div class="Alliend" id="{{ $secondChecklist['slug'] }}">
                   <h2>Allied Health  <span>Skills Checklists</span></h2>
                   <div class="jetboost-list-wrapper-o1n6 w-dyn-list">
                      <div role="list" class="nursing-skills-checklist-list w-dyn-items">

                        @foreach($secondChecklist->units as $index_2 => $fdata)
                         <div role="listitem" class="nursing-skills-checklist-list_item w-dyn-item">
                            <div class="nursing-skills-checklist_jetboost-embed w-embed"><input type="hidden" class="jetboost-list-item" value="anesthesia-technologist-skills-checklist-3"></div>
                            <a href="#" target="_blank" class="nursing-skills-checklist_link w-inline-block">
                               <div>{{$fdata->unit_name}}</div>
                            </a>
                         </div>
                         @endforeach
                      </div>
                   </div>
                </div>
                  <div class="Alliend" id="{{ $thirdChecklist['slug'] }}">
                   <h2>Rehab Therapy <span>Skills Checklists</span></h2>
                   <div class="jetboost-list-wrapper-o1n6 w-dyn-list">
                    @foreach($thirdChecklist->units as $index_3 => $fdata)
                      <div role="list" class="nursing-skills-checklist-list w-dyn-items">
                         <div role="listitem" class="nursing-skills-checklist-list_item w-dyn-item">
                            <div class="nursing-skills-checklist_jetboost-embed w-embed"><input type="hidden" class="jetboost-list-item" value="medical-social-work-skills-checklist-7"></div>
                            <a href="h#" target="_blank" class="nursing-skills-checklist_link w-inline-block">
                               <div>{{$fdata->unit_name}}</div>
                            </a>
                         </div>
                        @endforeach
                      </div>
                   </div>
                </div> 
        </div>    
   </section>   

   <section class="bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="apply-part">
                    <h2>APPLY TO TOP <span>JOBS IN</span></h2>
                    <p>Find your dream assignment and be first in line for it today.</p>
                    <div class="taeled-btn demand text-center position-relative text-uppercase">
                        <a href="#">Get Started in On Demand<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>    
            </div>  
             <div class="col-md-6">
                <img src="{{ asset('front_assets/assets/img/register.png')}}">
            </div>    
        </div>    
    </div>    
   </section> 


 
        <section class="skiss skiss2">
            <div class="container">
                <h2>Unlock Opportunities with SkillzMatics Skills Checklists</h2>
                <p>Our skills checklists are the key to advancing your healthcare career. </p>
                <div class="taeled-btn checklist text-center position-relative text-uppercase">
                    <a href="#">See How it Works <i class="fa fa-arrow-right"></i></a>
                </div>
            </div> 
        </section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to handle search input changes
        $('#checklistSearch').on('input', function () {
            var searchText = $(this).val().toLowerCase();

            // Iterate through each checklist section
            $('.cecklist-part .nursing-skills-checklist-list').each(function () {
                // Iterate through each checklist item in the current section
                $(this).find('.nursing-skills-checklist-list_item').each(function () {
                    var itemName = $(this).text().toLowerCase();

                    // Show/hide the item based on the search text
                    if (itemName.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    });
</script>


@endsection