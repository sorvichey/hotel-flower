@extends('layouts.front')
@section('content')
@if(count($promotions) > 0)
<section class="pb_section_con bg-light" id="section-events">
    <div class="container">
            <div class="row">
            @foreach($promotions as $p)
                <div class="col-lg-12">
                    <h4 class="text-center text-success">{{$p->title}}</h4>
                    <p>{!!$p->description!!}</p>
                </div>  
                @endforeach
            </div>
          
        </div>
</section>
@else 
<section class="pb_section2 bg-light" id="section-events">
    <div class="container">
            <div class="row">
         
                <div class="col-lg-12">  <br><br>
                    <h4 class="text-center text-success">Flower Garden Cabin យើងមិនមានផ្តល់ជូននូវការផ្តល់ជូននូវប្រូម៉ូសិនពិសេសទេអីលូវ​ ។</h4><br>
                    <h4 class="text-center text-success">សូមអរគុណសម្រាប់ការគាំទ្ររបស់អ្នក</h4><br>
                </div>  
        </div>
    </div>
</section>
@endif
@endsection